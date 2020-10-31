<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $view;
    public $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $title, $view)
    {
        $this->details = $details;
        $this->title = $title;
        $this->view = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)->view($this->view);
    }
}
