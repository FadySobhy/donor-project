<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    use Queueable;

    public $request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Dear '.$notifiable->fullname.', ')
                    ->line('Kindly know that your '.config('app.name').' account is ready now, you can use the following credentials to log into the application:')
                    ->line('Your email address is: '. $this->request->email .' <br> Your temporary password is: '. $this->request->password)
                    ->line('Click the button below to visit the login page, once you logged in you will be invoked to change your password to have your own one')
                    ->action('Login to change password', route('login'))
                    ->line('Thank you for using our application!')
                    ->salutation('Regards, <br> '.config('app.name').' team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
