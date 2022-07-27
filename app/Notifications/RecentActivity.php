<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Person;
use App\Models\User;


class RecentActivity extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Person $person, User $user, string $type)
    {
        $this->person = $person;
        $this->user = $user;
        $this->type = $type;
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        
        if($this->type == 'candidate.edit'){

            $target = $this->person->firstname . ' ' . $this->person->surname;
            return [
            'msg' => __('notifications.raCandidateEdit', ['user' => $this->user->firstname]),
            'target' => $target,
            'color' => 'text-info',
            'icon' => 'icon-user-check',
            'url' => route('candidates.edit', $this->person->id)
            ];

        }
        else if($this->type == 'candidate.create'){

            $target = $this->person->firstname . ' ' . $this->person->surname;
            return [
            'msg' => __('notifications.raCandidateCreate', ['user' => $this->user->firstname]),
            'target' => $target,
            'color' => 'text-success',
            'icon' => 'icon-user-plus',
            'url' => route('candidates.edit', $this->person->id)
            ];

        }


    }
}
