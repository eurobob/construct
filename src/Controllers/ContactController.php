<?php

namespace Eurobob\Construct\Controllers;

use Eurobob\Construct\Controllers\AppController;
use Eurobob\Construct\Requests\ContactMeRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends AppController
{
    /**
     * Show the form
     *
     * @return View
     */

    public function showForm()
    {
        return view('construct::pages.contact.index');
    }

    /**
     * Email the contact request
     *
     * @param ContactMeRequest $request
     * @return Redirect
     */
    public function sendContactInfo(ContactMeRequest $request)
    {
        $data = $request->only('name', 'email', 'phone');
        $data['messageLines'] = explode("\n", $request->get('message'));

        Mail::send('construct::includes.emails.contact', $data, function($message) use ($data) {
            $message->subject('Blog Contact Form: '.$data['name'])
                    ->to(config('site.contact_email'))
                    ->replyTo($data['email']);
        });

        return back()
            ->withSuccess("Thank you for your message. It has been sent.");
    }
}
