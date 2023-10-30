<?php

namespace App\Listeners;

use Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;


class SendAutoResponder implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $message = $event->message;
        if (Auth::check()) {
            $message->email = Auth::user()->email;
        }

        Mail::send('emails.contact', ['msg' => $message], function ($email) use ($message) {
            $email->to($message->email, $message->name)->subject('Your message was received.');
        });
    }
}
