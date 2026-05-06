@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<!-- Hero Section -->
<section class="perfume-hero" style="padding: 6rem 0 4rem; background: linear-gradient(120deg, rgba(33, 27, 24, 0.88), rgba(87, 62, 48, 0.76)), #2a201c; color: #fff;">
    <div class="container">
        <span class="perfume-eyebrow">INFORMACIÓN LEGAL</span>
        <h1 style="font-size: clamp(2.25rem, 4vw, 4rem); font-weight: 900; max-width: 760px;">Política de Privacidad</h1>
        <p style="max-width: 620px; color: rgba(255, 255, 255, 0.82); font-size: 1.05rem; margin-top: 1rem;">
            Conoce cómo protegemos tus datos personales
        </p>
    </div>
</section>

<!-- Content -->
<section style="padding: 5rem 0; background: #fbf8f4;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div style="background: #fff; padding: 3rem; border: 1px solid rgba(199, 154, 91, 0.14); border-radius: 12px; box-shadow: 0 16px 40px rgba(33, 27, 24, 0.08);">
                    
                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2);">
                        1. Información que Recopilamos
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Recopilamos información que nos proporcionas directamente, como tu nombre, correo electrónico, número de teléfono y dirección de envío cuando realizas un pedido.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        2. Cómo Utilizamos tu Información
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 1rem;">
                        Utilizamos tu información para:
                    </p>
                    <ul style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem; padding-left: 2rem;">
                        <li>Procesar tus pedidos y envíos</li>
                        <li>Enviarte confirmaciones y actualizaciones sobre tu compra</li>
                        <li>Responder a tus consultas y solicitudes</li>
                        <li>Mejorar nuestros servicios y experiencia del usuario</li>
                        <li>Enviar información sobre nuevos productos y promociones (si lo deseas)</li>
                    </ul>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        3. Protección de Datos
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Implementamos medidas de seguridad para proteger tu información personal contra acceso no autorizado, alteración, divulgación o destrucción.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        4. Cookies
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Nuestro sitio utiliza cookies para mejorar tu experiencia de navegación. Puedes configurar tu navegador para rechazar cookies si lo prefieres.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        5. Enlaces a Terceros
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Nuestro sitio puede contener enlaces a sitios web de terceros. No somos responsables de las prácticas de privacidad de esos sitios.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        6. Derechos del Usuario
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Tienes derecho a acceder, corregir o eliminar tu información personal. Contacta con nosotros para ejercer estos derechos.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        7. Cambios a esta Política
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Nos reservamos el derecho de actualizar esta política de privacidad. Los cambios entrarán en vigor cuando se publiquen en el sitio.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        8. Contacto
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 0;">
                        Si tienes preguntas sobre esta política de privacidad, contáctanos:
                    </p>
                    <p style="color: #211b18; font-size: 1rem; font-weight: 600; margin-top: 1rem; margin-bottom: 0;">
                        <i class="bi bi-whatsapp" style="color: #25d366;"></i> 
                        <a href="https://wa.me/573538002817" target="_blank" class="text-decoration-none" style="color: #c79a5b;">
                            WhatsApp: +57 353 8002817
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .perfume-eyebrow {
        display: inline-flex;
        margin-bottom: 0.8rem;
        color: #b8865b;
        font-size: 0.78rem;
        font-weight: 900;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }
</style>
@endsection
