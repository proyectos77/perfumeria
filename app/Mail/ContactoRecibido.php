<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoRecibido extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $mensaje;

    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $mensaje)
    {
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;
    }

   public function build()
    {
        return $this->subject('Hemos recibido tu mensaje - Crear System')
                    ->view('emails.contacto_recibido');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hemos recibido tu mensaje - Crear System',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

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
