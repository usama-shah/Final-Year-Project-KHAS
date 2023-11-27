<?php

namespace App\Mail;

use App\Models\Admin;
use App\Models\Inspection;
use App\Models\Phone;
use App\Models\PurchasedPhones;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PhoneAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $inspection;
    public $user;
    public $type;
    public $admin;
    public $phone;
    public $purchase;

    /**
     * Create a new message instance.
     *
     * @param Inspection $inspection
     * @param User $user
     * @param Admin $admin
     * @param Phone $phone
     * @param PurchasedPhones $purchase
     */
    public function __construct(Inspection $inspection, User $user, Admin $admin, Phone $phone, PurchasedPhones $purchase, $type)
    {
        $this->inspection = $inspection;
        $this->user = $user;
        $this->type = $type;
        $this->admin = $admin;
        $this->purchase = $purchase;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->type == "customer") {

            return $this->subject('Inspection Passed')
                ->markdown('emails.phone_accepted');
        }
        if ($this->type == "seller") {

            return $this->subject('Inspection Passed')
                ->markdown('emails.phone_accepted_seller');
        }
    }
}
