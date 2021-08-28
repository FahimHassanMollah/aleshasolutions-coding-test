<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $customer)
    {
        $this->order    = $order;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.new-order-placed')->with(['customer' => $this->customer, 'order' => $this->order]);
    }
}
