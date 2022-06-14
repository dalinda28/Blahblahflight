<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\User;
use Illuminate\Http\Request;

class AirportsController extends Controller
{
    public function index()
    {
        $airports = Airport::paginate(10);
        return view('admin.airport', ['airports' => $airports]);
    }

    public function create()
    {
        return view('admin.createAirport');
    }

    public function createAirport(Request $request)
    {
        $airport = new Airport();

        $airport->country = $request->country;
        $airport->city = $request->city;

        $airport->save();


        return redirect()->route('admin.airport');

    }

    public function deleteAirport($id)
    {
        $airport = Airport::findOrFail($id);

        $airport->delete();

        return redirect()->route('admin.airport');
    }

}
