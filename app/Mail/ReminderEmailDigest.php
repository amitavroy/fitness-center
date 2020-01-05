<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmailDigest extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $reminders;

    public function __construct($reminders)
    {
        $this->reminders = $reminders;
    }

    public function build()
    {
        return $this->markdown('emails.reminder-digest')
            ->with('reminders', $this->reminders);
    }
}
