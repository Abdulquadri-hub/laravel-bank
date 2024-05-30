<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class welcomeNewCustomer extends Notification
{
    use Queueable;

    protected $user;
    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
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
                    ->subject("Welcome to Purple Miicrofinance Bank")
                    ->greeting("Hi ". $this->user->firstname . " " . $this->user->lastname . "," )
                    ->line("Thank you for joining our bank. You are on your way to enjoying a seamless experience in banking management. provide a platform for you to manage your money.")
                    ->line("To deposit, withdraw, transfer and many more, please complete your KYC and account creation.")
                    ->line("In the meantime, please dive into our FAQs. If you need some help or have anything to say to us, send a quick message to info@purplebank.com.")
                    ->line('')
                    ->line("We're really happy to have you!");
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
