<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Pedido recibido</title>
</head>
<body style="margin:0; padding:0; background:#f8f0e9; color:#211b18; font-family:Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center" style="padding:32px 16px;">
                <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="max-width:680px; background:#fffaf5; border:1px solid #e4caa9;">
                    <tr>
                        <td style="padding:28px;">
                            <p style="margin:0 0 8px; color:#9c7142; font-size:12px; font-weight:700; text-transform:uppercase;">PERFUMERY J &amp; P</p>
                            <h1 style="margin:0 0 12px; font-size:28px;">Recibimos tu pedido #{{ $pedido->id }}</h1>
                            <p style="margin:0 0 18px; color:#75655b;">Hola {{ $pedido->nombreCompleto() }}, estos son los datos registrados para tu pedido.</p>

                            <table width="100%" cellpadding="8" cellspacing="0" role="presentation" style="border-collapse:collapse;">
                                @foreach($pedido->detalles as $detalle)
                                    <tr>
                                        <td style="border-bottom:1px solid #ead8c2;">{{ $detalle->producto->nombre }} x {{ $detalle->cantidad }}</td>
                                        <td align="right" style="border-bottom:1px solid #ead8c2;">{{ number_format($detalle->precio * $detalle->cantidad, 0, ',', '.') }} COP</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td align="right">Subtotal</td>
                                    <td align="right">{{ number_format($pedido->subtotal, 0, ',', '.') }} COP</td>
                                </tr>
                                <tr>
                                    <td align="right">Envio</td>
                                    <td align="right">{{ number_format($pedido->costo_envio, 0, ',', '.') }} COP</td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-weight:700;">Total</td>
                                    <td align="right" style="font-weight:700;">{{ number_format($pedido->total, 0, ',', '.') }} COP</td>
                                </tr>
                            </table>

                            <p style="margin:20px 0 8px;"><strong>Entrega:</strong> {{ $pedido->tipoEntregaLabel() }}</p>
                            @if($pedido->direccion)
                                <p style="margin:0 0 8px;"><strong>Direccion:</strong> {{ $pedido->direccion }}</p>
                            @endif
                            <p style="margin:0 0 20px;"><strong>Contacto:</strong> {{ $pedido->telefono }} · {{ $pedido->correo }}</p>

                            <p style="margin:0 0 20px; color:#75655b;">Si necesitas corregir algun dato, puedes escribirnos al WhatsApp o al correo de atencion de PERFUMERY J &amp; P.</p>

                            <a href="{{ route('pedidos.seguimiento', $pedido->token_seguimiento) }}" style="display:inline-block; padding:12px 18px; background:#211b18; color:#fff; text-decoration:none; font-weight:700;">Ver estado del pedido</a>

                            <p style="margin:22px 0 0; color:#75655b; font-size:13px;">La pasarela de pago se integrara en una siguiente fase. Por ahora tu pedido queda registrado para seguimiento del vendedor.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
