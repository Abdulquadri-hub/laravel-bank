<?php

namespace App\Notifications;

use App\libs\Purple;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyNewUser extends Notification
{
    use Queueable;
    protected $user;
    protected $isadmin = false;
    protected $linkType;

    /**
     * Create a new notification instance.
     */
    public function __construct($user, $linkType, $isadmin = false)
    {
        //
        $this->user = $user;
        $this->isadmin = $isadmin;
        $this->linkType = $linkType;
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
        $url = Purple::emailVerificationClientLink($this->user, $this->linkType);
        return (new MailMessage)
                    ->subject('Verify Your Purple Account!')
                    ->greeting("Hi ". $this->user->firstname . " " . $this->user->lastname . "," )
                    ->line('Welcome to Purple!')
                    ->line("We need you to verify your email which helps us keep you safe.")
                    ->action('Verify my account', $url)
                    ->line('')
                    ->line('Thank you!');
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
