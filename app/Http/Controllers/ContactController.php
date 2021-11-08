<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Mail;
use Spatie\Honeypot\SpamResponder\SpamResponder;

class ContactController extends Controller implements SpamResponder
{
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

        // Mail::to($request->email, $request->name)->send($mail);

        Mail::to('info@eivissadecoracio.com', $request->name)->bcc($request->email)->send($mail);

        return redirect()->to('/')->with('form', 'Mensaje enviado');
    }
	
	public function respond(Request $request, Closure $next)
	{
		return redirect()->back();
	}
}
