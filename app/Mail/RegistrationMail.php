<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;

    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    public function build()
    {
        return $this->view('emails.registration')
                    ->with([
                        'name' => $this->registration->name,
                        'email' => $this->registration->email,
                    ]);
    }
}
