<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Correo recibido</title>
</head>
<body>
    <p>Hola {{ $nombre }},</p>

    <p>Gracias por contactarnos. Hemos recibido tu mensaje y te responderemos pronto.</p>

    <p><strong>Tu mensaje:</strong></p>
    <blockquote>{{ $mensaje }}</blockquote>

    <p>Atentamente,<br>El equipo de Crear System</p>
</body>
</html>
