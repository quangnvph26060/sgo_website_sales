<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderActivated extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $active;
    public $reason;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $active, $reason)
    {
        $this->order = $order;
        $this->active = $active;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Trạng thái đơn hàng')
                    ->view('admin.order.email');
    }
}
