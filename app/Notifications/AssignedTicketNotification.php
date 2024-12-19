<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignedTicketNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $ticket; // Deklarasikan properti ticket

    /**
     * Create a new notification instance.
     *
     * @param  mixed  $ticket
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
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
                    ->subject('You have been assigned a new ticket')
                    ->greeting('Hi, ' . $notifiable->name) // Menyapa pengguna dengan nama
                    ->line('You have been assigned a new ticket: ' . $this->ticket->title)
                    ->action('View ticket', route('admin.tickets.show', $this->ticket->id))
                    ->line('Thank you for your attention.')
                    ->line(config('app.name') . ' Team')
                    ->salutation('Best regards,'); // Menambahkan salam penutup yang lebih baik
    }
}