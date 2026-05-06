<?php

namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoRecibido extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Pedido $pedido)
    {
    }

    public function build(): self
    {
        return $this
            ->subject('Recibimos tu pedido #' . $this->pedido->id . ' - PERFUMERY J & P')
            ->view('emails.pedido-recibido');
    }
}
