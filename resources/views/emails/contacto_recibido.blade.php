<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion de mensaje recibido</title>
</head>
<body style="margin:0; padding:0; background:#f4f7fb; font-family:Arial, Helvetica, sans-serif; color:#122033;">
    <div style="max-width:640px; margin:0 auto; padding:32px 16px;">
        <div style="background:linear-gradient(135deg,#001f4d,#26c6da); border-radius:24px 24px 0 0; padding:32px; color:#ffffff;">
            <p style="margin:0 0 10px; font-size:13px; letter-spacing:0.08em; text-transform:uppercase; opacity:0.85;">Crear System</p>
            <h1 style="margin:0; font-size:28px; line-height:1.2;">Hemos recibido tu mensaje</h1>
        </div>

        <div style="background:#ffffff; border-radius:0 0 24px 24px; padding:32px; box-shadow:0 18px 45px rgba(0,31,77,0.08);">
            <p style="margin-top:0; margin-bottom:16px;">Hola {{ $nombre }},</p>

            <p style="margin-top:0; margin-bottom:18px; color:#5b6677; line-height:1.8;">
                Gracias por comunicarte con <strong>Crear System</strong>. Ya recibimos tu mensaje y nuestro equipo lo revisara para responderte con la mayor claridad posible.
            </p>

            <div style="background:#f8fafc; border:1px solid #e6edf5; border-radius:18px; padding:20px; margin-bottom:24px;">
                <p style="margin:0 0 10px; font-weight:700;">Resumen de tu mensaje</p>
                <p style="margin:0; color:#374151; line-height:1.8;">{{ $mensaje }}</p>
            </div>

            <p style="margin-top:0; margin-bottom:12px; color:#5b6677; line-height:1.8;">
                Si tu solicitud incluye una idea de proyecto, una mejora para tu sitio o una necesidad de soporte, te responderemos por este mismo canal.
            </p>

            <p style="margin:0; color:#122033;">
                Atentamente,<br>
                <strong>Equipo Crear System</strong>
            </p>
        </div>
    </div>
</body>
</html>
