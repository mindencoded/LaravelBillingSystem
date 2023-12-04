<?php

namespace App\Listeners;

use App\Mail\MessageReceivedToOwner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToTheOwner implements ShouldQueue
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
            $message->name = Auth::user()->name;
        }

        Mail::to('test@mail.test', 'test')->send(new MessageReceivedToOwner($message));

        /*Mail::send('emails.message-received-to-owner', ['msg' => $message], function ($mail) use ($message) {
            $mail->from($message->email, $message->name)->to('test@mail.test', 'test')->subject('Your message was received.');
        });*/
    }
}
