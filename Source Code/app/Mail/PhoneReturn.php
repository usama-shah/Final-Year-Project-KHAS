<?php

namespace App\Mail;

use App\Models\Returns;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PhoneReturn extends Mailable
{
    use Queueable, SerializesModels;

    public $return;

    /**
     * Create a new message instance.
     *
     * @param Returns $returns
     */
    public function __construct(Returns $returns)
    {
        $this->return = $returns;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->return->status=="Rejected"){

            return $this->subject('Return Application Rejected')
                ->markdown('emails.return.rejected');
        }
        else{
            return $this->subject('Return Application Accepted')
                ->markdown('emails.return.accepted');
        }
    }
}
