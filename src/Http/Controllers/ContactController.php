<?php

namespace Castion2293\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Castion2293\Contact\Mail\ContactMailable;
use Castion2293\Contact\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }

    public function send()
    {
        Mail::to(config('contact.send_email_to'))->send(new ContactMailable(request()->message, request()->name));

        Contact::create(request()->all());

        return redirect(route('contact'));
    }
}
