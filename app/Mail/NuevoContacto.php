<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevoContacto extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $correo;
    public $mensaje;

    public function __construct($nombre, $correo, $mensaje)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->mensaje = $mensaje;
    }

    public function build()
    {
        return $this->subject('Nuevo lead desde el sitio web - Crear System')
                    ->view('emails.nuevo-contacto');
    }
}
