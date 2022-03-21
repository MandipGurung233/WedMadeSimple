<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class booking extends Notification
{
    use Queueable;
    public $user;
    public $value;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $value)
    {
        $this->user = $user;
        $this->value = $value;
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
            'id'=>$this->user['id'],
            'email'=>$this->user['email'],
            'venEmail'=>$this->value['venEmail']
            
        ];
    }
}
