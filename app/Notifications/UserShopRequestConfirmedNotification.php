<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserShopRequestConfirmedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $data;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Notification: ' . 'UserShopRequestConfirmedNotification')
                    ->line('You have a new notification regarding your request/submission.')
                    ->action('View Details', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'UserShopRequestConfirmedNotification',
            'data' => $this->data,
        ];
    }
}