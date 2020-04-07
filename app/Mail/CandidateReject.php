<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidateReject extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $election;
    public $date;

    public function __construct($data)
    {
        $this->name = $data['name'] ;
        $this->election = $data['election'] ;
        $this->date = $data['date'] ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.CandidateReject');
    }
}
