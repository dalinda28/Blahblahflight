<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Book;
use App\Models\User;
use App\Models\Flight;
use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Stripe\Exception\CardException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MainController extends Controller
{

    public function mainpage(Request $request)
    {
        $airports = Airport::orderBy('country', 'asc')->orderBy('city', 'asc')->get();


        $available_search_filter = ['outbound', 'inbound', 'startDateTime', 'endDateTime'];
        $search_filters = $request->all();
        $pagination = $request->get('pagination', 9);
        $filters = [];
        $filtersDate = [];
        $flights = [];

        foreach ($available_search_filter as $available_filter) {
            if (isset($search_filters[$available_filter])) {
                if ($available_filter == 'startDateTime' || $available_filter == 'endDateTime') {
                    $filtersDate[$available_filter] = $search_filters[$available_filter];
                } else {
                    $filters[$available_filter] = $search_filters[$available_filter];
                }
            }
        }

        $orderBy = $request->get('orderBy', 'startDateTime.ASC');
        $orderBy = explode('.',$orderBy);
        $flightsQb = Flight::where($filters)
        ->where('id_pilot', '!=', NULL)
        ->where('capacity', '>', 0)
        ->orderBy($orderBy[0], $orderBy[1]);
        if(count($filtersDate)){
            foreach($filtersDate as $filter => $date){
                $flightsQb->whereDate($filter, '=' , $date);
            }
        }
        if($pagination != '-1'){
            $flights = $flightsQb->paginate($pagination);
        }
        $flights->appends($request->all());

        if(!$flights || count($flights) == 0){
            $flights = [];
        }

        // dd($destinations[$flight['outbound']]);


        return view('home', [
            'airports' => $airports,
            'flights' => $flights,
        ]);
    }

    public function singleflight(Request $request, $id)
    {
        $flight = Flight::findOr($id, fn () => redirect()->route('home'));
        $flight->id = $id;
        $destination = Airport::where('id', $flight['outbound'])->value('country');
        $departure = Airport::where('id', $flight['inbound'])->value('country');
        $pilot = User::where('id', $flight['id_pilot'])->value('name');
        return view('singleflight', [
            'flight' => $flight,
            'destination' => $destination,
            'departure' => $departure,
            'pilot' => $pilot
        ]);
    }

    public function bookflight(Request $request, $id)
    {
        $flight = Flight::findOr($id, fn () => redirect()->route('home'));
        return view('bookflight', [
            'flight' => $flight,
            'intent' => Auth::user()->createSetupIntent()
        ]);
    }

    public function confirmBooking( Request $request, $flightId, $passengerId )
    {
        $flight = Flight::findOrFail($flightId);

        $qty = $request->get('passengers');
        $amount = $qty * $flight->price * 100;

        $user = Auth::user();
        $stripeCustomer = $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($request->payment_method);


        try {
            $user->charge($amount, $request->payment_method);
        } catch(Exception  $exception){
            throw ValidationException::withMessages(['stripe' => $exception->getMessage()]);
        }

        $capacity = $flight['capacity'];

        $request->validate([
            'passengers' => "required|numeric|max:$capacity"
        ]);


        $data = [
            'id_flight' => $flightId,
            'id_booker' => $passengerId,
            'date' => Carbon::now(),
            'isPaid' => true,
            'comment' => $request->comment,
            'passengers' => $request->passengers
        ];

        $booking = new Book($data);
        $booking->save();

        return redirect()->route('list');
    }
}
