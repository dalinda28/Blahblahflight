<?php

namespace App\Http\Controllers;

use Faker\Generator;
use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    public function new()
    {
        $airports = Airport::orderBy('country', 'asc')->orderBy('city', 'asc')->get();

        return view('flight.new', [
            'airports' => $airports
        ]);
    }

    public function index()
    {
        $airports = Airport::orderBy('country', 'asc')->orderBy('city', 'asc')->get();

        $flights = Flight::paginate(10);
        return view('admin.flight', ['airports' => $airports,
            'flights' => $flights]);
    }

    public function create()
    {
        return view('admin.createFlight');
    }

    public function createFlight(Request $request)
    {
        $flight = new Flight;
        $flight->flightNumber = $request-> flightNumber;
        $flight->capacity = $request->capacity;
        $flight->price = $request->price;

        $flight-> save();

        return redirect()->route('admin.flight');

    }
    public function store(Request $request)
    {
        $faker = Container::getInstance()->make(Generator::class);


        $datas = array_merge($request->all(), [
            'id_pilot' => Auth::id(),
            'flightNumber' => $faker->unique()->randomNumber(7),
        ]);

        $flight = new Flight($datas);
        $flight->save();

        return redirect('flight.new');
    }

    public function list(Request $request)
    {
        $incoming = $request->get('incoming', 1);


        return view('flight.list', ['incoming' => $incoming]);
    }

    public function updateFlight($id)
    {
        $flight = Flight::findOrFail($id);

        return view('admin.updateFlight', ['flight' => $flight]);
    }
    public function saveFlight(Request $request)
    {
        $flight = Flight::findOrFail($request->id);

        $flight->flightNumber = $request->flightNumber;
        $flight->capacity = $request->capacity;
        $flight->price = $request->price;

        $flight->save();
        return redirect()->route('admin.flight');
    }
}
