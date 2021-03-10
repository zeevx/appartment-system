<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification
{
    use Queueable;
    private $details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
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
            ->subject($this->details['subject'])
            ->greeting($this->details['greeting'])
            ->line($this->details['body'])
            ->line($this->details['moreBody'])
            ->action($this->details['actionText'], $this->details['actionURL'])
            ->line($this->details['thanks']);
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


//How to use:
//$details = [
//    'subject' => 'Instant Debit Notification 🔊',
//    'greeting' => 'Hello 👋🏾! '. $name ,
//    'body' => 'An instant debit was initiated for you for "'. $debit->description .'" on Capicollect by ' . auth()->user()->profile->business_name,
//    'moreBody' => 'Debit Reference: ' . $debit->reference . ', Debit Amount: ' . $debit->amount,
//    'thanks' => 'The #1 collections platform!',
//    'actionText' => 'Download Invoice Now',
//    'actionURL' => url('home')
//];
//Notification::route('mail',$email)->notify(new EmailNotification($details));
