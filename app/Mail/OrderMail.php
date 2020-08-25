<?php

namespace App\Mail;

use App\Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    private $order;
    private $orderData;
    private $tetelek;
    private $etelek;

    /*
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderData, Order $order, $tetelek, $etelek)
    {
        $this->order = $order;
        $this->orderData = $orderData;
        $this->tetelek = $tetelek;
        $this->etelek = $etelek;
    }

    /*
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order')->with(['order'=>$this->order, 'orderData'=>$this->orderData, 'tetelek'=>$this->tetelek, 'etelek'=>$this->etelek]);
    }
}
