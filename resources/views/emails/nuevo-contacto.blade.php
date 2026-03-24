<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo lead recibido</title>
</head>
<body style="margin:0; padding:0; background:#f4f7fb; font-family:Arial, Helvetica, sans-serif; color:#122033;">
    <div style="max-width:640px; margin:0 auto; padding:32px 16px;">
        <div style="background:linear-gradient(135deg,#001f4d,#26c6da); border-radius:24px 24px 0 0; padding:32px; color:#ffffff;">
            <p style="margin:0 0 10px; font-size:13px; letter-spacing:0.08em; text-transform:uppercase; opacity:0.85;">Nuevo contacto</p>
            <h1 style="margin:0; font-size:28px; line-height:1.2;">Se ha recibido un nuevo mensaje desde el sitio web</h1>
        </div>

        <div style="background:#ffffff; border-radius:0 0 24px 24px; padding:32px; box-shadow:0 18px 45px rgba(0,31,77,0.08);">
            <p style="margin-top:0; margin-bottom:24px; color:#5b6677; line-height:1.7;">
                A continuacion encontraras la informacion enviada por el visitante. Este mensaje fue generado automaticamente desde el formulario de contacto del sitio.
            </p>

            <div style="background:#f8fafc; border:1px solid #e6edf5; border-radius:18px; padding:20px; margin-bottom:20px;">
                <p style="margin:0 0 10px;"><strong>Nombre:</strong> {{ $nombre }}</p>
                <p style="margin:0 0 10px;"><strong>Correo:</strong> {{ $correo }}</p>
                <p style="margin:0;"><strong>Canal:</strong> Formulario web</p>
            </div>

            <div style="background:#ffffff; border-left:4px solid #26c6da; border-radius:12px; padding:18px 20px; margin-bottom:24px; box-shadow:0 10px 24px rgba(0,31,77,0.05);">
                <p style="margin:0 0 10px; font-weight:700;">Mensaje recibido</p>
                <p style="margin:0; color:#374151; line-height:1.8;">{{ $mensaje }}</p>
            </div>

            <p style="margin:0; color:#5b6677; line-height:1.7;">
                Revisa el panel interno para hacer seguimiento y responder al cliente con oportunidad.
            </p>
        </div>
    </div>
</body>
</html>
