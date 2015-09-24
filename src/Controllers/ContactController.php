<?php

namespace Livit\Build\Controllers;

use App\Http\Controllers\Controller;
use Livit\Build\Requests\ContactMeRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the form
     *
     * @return View
     */

    public function showForm()
    {
        return view('build::blog.contact');
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

        Mail::send('build::emails.contact', $data, function($message) use ($data) {
            $message->subject('Blog Contact Form: '.$data['name'])
                    ->to(config('blog.contact_email'))
                    ->replyTo($data['email']);
        });

        return back()
            ->withSuccess("Thank you for your message. It has been sent.");
    }
}
