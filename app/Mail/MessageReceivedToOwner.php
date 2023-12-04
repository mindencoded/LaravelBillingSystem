<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\SentMessage;

class MessageReceivedToOwner extends Mailable
{
    use Queueable, SerializesModels;

    public Message $message;
    /**
     * Create a new message instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Message Received To Owner',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): self
    {
        /*return new Content(
            view: 'emails.message-received-to-owner',
        );*/
        return $this->view('mails.message-received-to-owner')
        ->from($this->message->email, $this->message->name);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
