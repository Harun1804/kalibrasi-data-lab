<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyKalibration extends Mailable
{
    use Queueable, SerializesModels;
    public $tanggal;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("perusahaan@mail.com")
        ->markdown('emails.NotifyKalibration',["tanggal"=>$this->tanggal]);
    }
}
