<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission.
     *
     * @param  ContactRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(ContactRequest $request)
    {
        Mail::to(config('mail.from.address'))->send(new ContactMail($request));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}