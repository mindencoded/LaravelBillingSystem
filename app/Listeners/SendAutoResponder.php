<?php

namespace App\Listeners;

use App\Events\MessageWasReceived;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

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
    public function handle(MessageWasReceived $event): void
    {
        $message = $event->message();

        if (Auth::check()) {
            $message->email = Auth::user()->email;
            $message->name = Auth::user()->name;
        }

        Mail::send('emails.contact', ['msg' => $message->message], function ($email) use ($message) {
            $email->to($message->email, $message->name)->subject('Your message was received.');
        });
    }
}
