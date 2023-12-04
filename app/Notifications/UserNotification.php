<?php

namespace App\Notifications;

use App\Models\Notify;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserNotification extends Notification
{
    use Queueable;

    protected Notify $notify;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
    }

    public function setNotify(Notify $notify): void
    {
        $this->notify = $notify;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        /*return (new MailMessage)
            ->greeting($notifiable->name . ', ')
            ->subject('Message received from ' . env('APP_NAME'))
            ->line('You have received a Notify.')
            ->action('Click here to see the message.', route('notifications.show', $this->notify->id))
            ->line('Thank you for using our application!');*/

        return (new MailMessage())->view('emails.notification-message',
        [
            'notify' => $this->notify,
            'user' => $notifiable
        ])->subject('Thank you for using our application ');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->notify->id,
            'link' => route('notifications.show', $this->notify->id),
            'text' => 'You have received a message from <b>' . User::find($this->notify->sender_id)->name . '</b>'
        ];
    }
}
