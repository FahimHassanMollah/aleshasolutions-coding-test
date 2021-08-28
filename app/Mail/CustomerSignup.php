<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerSignup extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $plainPassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer, $plainPassword)
    {
        $this->customer = $customer;
        $this->plainPassword = $plainPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.customer-signup')->with(['customer' => $this->customer, 'plainPassword' => $this->plainPassword]);
    }
}
