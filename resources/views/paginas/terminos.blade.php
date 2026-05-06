@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<!-- Hero Section -->
<section class="perfume-hero" style="padding: 6rem 0 4rem; background: linear-gradient(120deg, rgba(33, 27, 24, 0.88), rgba(87, 62, 48, 0.76)), #2a201c; color: #fff;">
    <div class="container">
        <span class="perfume-eyebrow">INFORMACIÓN LEGAL</span>
        <h1 style="font-size: clamp(2.25rem, 4vw, 4rem); font-weight: 900; max-width: 760px;">Términos y Condiciones</h1>
        <p style="max-width: 620px; color: rgba(255, 255, 255, 0.82); font-size: 1.05rem; margin-top: 1rem;">
            Lee atentamente los términos de uso de nuestro sitio web
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
                        1. Aceptación de Términos
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Al acceder y utilizar este sitio web, aceptas estar sujeto a estos términos y condiciones. Si no estás de acuerdo con alguna parte de estos términos, no debes acceder a nuestro sitio.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        2. Licencia de Uso
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Se te otorga una licencia limitada, no exclusiva y revocable para acceder y utilizar nuestro sitio web con fines personales y no comerciales.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        3. Limitación de Responsabilidad
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        PERFUMERY J & P no será responsable por daños indirectos, incidentales, especiales o consecuentes que resulten del uso o la incapacidad de usar el contenido o los servicios.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        4. Política de Precios
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Los precios mostrados en nuestro sitio son válidos en el momento de su publicación. Nos reservamos el derecho de cambiar los precios sin previo aviso.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        5. Política de Devoluciones
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Los productos pueden ser devueltos dentro de 7 días de la compra si están en condiciones originales y sin abrir. Contacta con nosotros para iniciar una devolución.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        6. Cambios a los Términos
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Nos reservamos el derecho de actualizar estos términos en cualquier momento. Tu uso continuado del sitio constituye tu aceptación de los cambios.
                    </p>

                    <h2 style="color: #211b18; font-family: 'Playfair Display', Georgia, serif; font-size: 1.8rem; font-weight: 800; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 2px solid rgba(199, 154, 91, 0.2); margin-top: 2rem;">
                        7. Contacto
                    </h2>
                    <p style="color: #75655b; font-size: 1rem; line-height: 1.8; margin-bottom: 0;">
                        Si tienes preguntas sobre estos términos, por favor contáctanos a través de:
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
