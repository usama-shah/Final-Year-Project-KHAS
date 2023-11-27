<?php

namespace App\Mail;

use App\Models\Purchase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $purchase;
    public $phone;
    public $seller;

    /**
     * Create a new message instance.
     *
     * @param Purchase $Purchase
     */
    public function __construct(Purchase $purchase,$phone,$seller)
    {
        $this->purchase = $purchase;
        $this->phone = $phone;
        $this->seller = $seller;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Phone  Sold')
            ->markdown('emails.order.newOrder');
    }
}
