<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
class ContactFormController extends Controller
{
    public function post(Request $request)
    {
        $data = $request->Contact;
        $data['subject'] = "Adver.az Contact";
        Mail::to(env("MAIL_TO_ADDRESS"))->send(new ContactForm($data));
    }
}
