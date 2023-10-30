<?php

namespace App\Listeners;

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
        Mail::send('emails.contact', ['msg' => $message], function ($mail) use ($message) {
            $mail->from($message->email, $message->name)->to('test@mail.test', 'test')->subject('Your message was received.');
        });
    }
}
