<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // public function index() {
    //     return view('home');
    // }

    public function send(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $contact = new ContactRequest();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        $mail = new ContactMailable($request->all());

        Mail::to($request->email, $request->name)->send($mail);

        // Mail::to($request->email, $request->name)->bcc('ameppema@hotmail.com', 'Paul Marquez')->send($mail);

        // return redirect()->route('contact.index')->with('form', 'Mensaje enviado');

        // return response()->json([
        //     'title'   => 'Mensaje enviado!',
        //     'message' => 'Gracias por su mensaje. Nos pondremos en contacto lo más pronto posible.'
        // ]);

        // return view('home');
        return redirect()->to('/');
    }
}
