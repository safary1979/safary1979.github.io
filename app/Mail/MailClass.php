<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $msg;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $msg)
    {
        $this->name = $name;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

//        return $this->view('greeting');
        return $this->from('safary@example.com')
            ->view('greeting')
            ->with(['msg' => $this->msg])
            ->subject($this->name)
            ;

    }
}
