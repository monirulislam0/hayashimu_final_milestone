<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderSubmitNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */


    public array $orders;
    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->cc(config('settings.default_email_address'))
                    ->line('Your order has been successfully submitted')
                    ->line('Your order number is: ')
                    ->action($this->orders['order_number'], url('/'))
                    ->line('Thank you for using Nutrimart!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
