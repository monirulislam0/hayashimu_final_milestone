<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderSubmitMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $user_name;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->user_name = $data['user_name'];
        $this->order = Order::with(['shipping'=>function($q){
                $q->select('id','name','mobile_no','email','address','apartment');
        }])
            ->with(['order_details'=>function($q){
                $q->with('products:id,name');
            }])
            ->where('id',$data['order_id'])
            ->first()?->toArray();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Submit Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order-submit',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
