<?php

namespace App\Mail;

use App\Models\OrderItem;
use Barryvdh\DomPDF\PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPOPDF extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $pdfContent;
    public function __construct($pdfContent)
    {
        $this->pdfContent = $pdfContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.poPdf')
            ->subject('Purchase Order PDF')
            ->attachData($this->pdfContent, 'po_attachment.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
