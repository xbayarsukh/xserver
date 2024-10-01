<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\TimeOffRequestRecord;


class TimeOffRequestHumanResourcedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

     public $timeOffRequest;
    public function __construct(TimeOffRequestRecord $timeOffRequest)
    {
        $this->timeOffRequest=$timeOffRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
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
    public function toArray($notifiable): array
    {
        return [
            'message' => 'New time off request assigned to HR',
            'user_name' => $this->timeOffRequest->user->name,
            'date' => $this->timeOffRequest->date,
            'type' => $this->timeOffRequest->attendanceTypeRecord->name,
            'reason' => $this->timeOffRequest->reason,
        ];
    }
}
