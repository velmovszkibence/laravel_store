<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class OrderUnderProcess extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = Carbon::now()->toDateTimeString();

        return $this->markdown('emails.order-under-process',[
                        'user' => $this->user,
                        'cart' => $this->cart,
                        'date' => $date,
                    ]);
    }
}
