<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\TimeOffRequestRecord;
use Illuminate\Notifications\Notification;

class TimeOffRequestCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

     public $timeOffRequest;
    public function __construct(TimeOffRequestRecord $timeOffRequest)
    {
        $this->timeOffRequest=$timeOffRequest->load('user');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via( $notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'user_name'=>$this->timeOffRequest->user->name,

            'reason'=>$this->timeOffRequest->reason,


        ];
    }
}
