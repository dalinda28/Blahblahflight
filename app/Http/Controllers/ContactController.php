<?php

namespace App\Http\Controllers;

use Mail;
use Config;
use App\Models\Contact;
use App\Services\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index(){
        $messages = Contact::paginate(10);
        return view('admin.message', ['messages' => $messages]);
    }
    public function contactform()
    {
        return view('contact');
    }


    public function sendcontactform(Request $request)
    {
        $response = Recaptcha::check($request->get('g-recaptcha-response'));

        if (!$response) {
            throw ValidationException::withMessages(['captcha' => 'You are a robot!']);
        }

            $validation = $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ]);

            $contact = new Contact;

            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->created_at = Carbon::now();
            $contact->updated_at = Carbon::now();

            $contact->save();

            \Mail::send(
                'contact_email',
                array(
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'user_message' => $request->get('message'),
                ),
                function ($message) {
                    $message->from(\Config::get('app.adminmail'));
                    $message->to('fanny@mailles.fr', 'Admin')->subject("Contact form");
                }
            );
            $messagevalidation = "Thank you for contacting us!";


        return view('contact', ['messagevalidation' => $messagevalidation]);
    }
}
