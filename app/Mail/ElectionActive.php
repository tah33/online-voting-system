<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ElectionActive extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $date;
    public $start;
    public $end;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->date = $data['election_date'];
        $this->start = $data['start_date'];
        $this->end = $data['end_date'];
        $this->email = $data['email'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.ElectionActive');
    }
}
