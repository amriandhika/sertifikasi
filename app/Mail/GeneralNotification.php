<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GeneralNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $body;
    public $button_text;
    public $button_url;
    public $mail_from;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$body,$button_text,$button_url,$mail_from)
    {
        $this->title = $title;
        $this->body = $body;
        $this->button_text = $button_text;
        $this->button_url = $button_url;
        $this->mail_from = $mail_from;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mail_from)
            ->subject($this->title)
            ->markdown('emails.notifications.general',[
            'title' => $this->title,
            'body' => $this->body,
            'button_text' => $this->button_text,
            'button_url' => $this->button_url,
        ]);
    }
}
