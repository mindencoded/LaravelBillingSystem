<?php

namespace App\Listeners;

use App\Events\MessageWasReceived;
use App\Mail\MessageReceived;
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

        Mail::to($message->email)->send(new MessageReceived($message));
    }
}
