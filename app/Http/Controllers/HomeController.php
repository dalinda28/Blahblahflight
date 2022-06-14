<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Book;
use App\Models\Contact;
use App\Models\Flight;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function redirect(){

        if(Auth::id()){
            if(Auth::user()->role == 'pilot' || Auth::user()->role == 'passager'){
                return view('dashboard');
            }
            else{
                $userCount = User::count();
                $airportCount = Airport::count();
                $bookCount = Book::count();
                $flightCount = Flight::count();
                $messageCount = Contact::count();
                return view('admin.admin', compact('userCount', 'airportCount', 'bookCount', 'flightCount', 'messageCount' ));
            }
        }else{
            return redirect()->back();
        }
    }


}
