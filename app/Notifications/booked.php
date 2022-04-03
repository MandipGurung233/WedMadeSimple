<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class booked extends Notification
{
    use Queueable;
    public $user;
    public $emails;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vendor, $customerMail)
    {
        //
        $this->vendor = $vendor;
        $this->customerMail = $customerMail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            //
            'id'=>$this->vendor['id'],
            'email'=>$this->vendor['email'],
            'customerMail'=>$this->customerMail
        ];
    }
}
