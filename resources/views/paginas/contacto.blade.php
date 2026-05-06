@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<!-- Hero Section -->
<section class="perfume-hero" style="padding: 6rem 0 4rem; background: linear-gradient(120deg, rgba(33, 27, 24, 0.88), rgba(87, 62, 48, 0.76)), #2a201c; color: #fff;">
    <div class="container">
        <span class="perfume-eyebrow">PONTE EN CONTACTO</span>
        <h1 style="font-size: clamp(2.25rem, 4vw, 4rem); font-weight: 900; max-width: 760px;">Contáctanos</h1>
        <p style="max-width: 620px; color: rgba(255, 255, 255, 0.82); font-size: 1.05rem; margin-top: 1rem;">
            Estamos aquí para resolver tus dudas y recomendaciones
        </p>
    </div>
</section>

<!-- Contact Information -->
<section style="padding: 5rem 0; background: #fbf8f4;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <span style="display: inline-flex; margin-bottom: 0.8rem; color: #9c7142; font-size: 0.78rem; font-weight: 900; letter-spacing: 0.14em; text-transform: uppercase;" class="perfume-eyebrow">FORMAS DE CONTACTO</span>
            <h2 style="color: #3a2a23; font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; font-family: 'Playfair Display', Georgia, serif; margin: 0;">
                Múltiples Formas de Comunicarte
            </h2>
        </div>

        <div class="row g-4 mb-5">
            <!-- WhatsApp -->
            <div class="col-md-6 col-lg-4">
                <div style="padding: 2.5rem; background: linear-gradient(135deg, rgba(37, 211, 102, 0.08), rgba(37, 211, 102, 0.02)); border: 2px solid rgba(37, 211, 102, 0.25); border-radius: 12px; text-align: center; transition: all 0.3s ease;">
                    <div style="width: 60px; height: 60px; background: #25d366; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                        <i class="bi bi-whatsapp" style="font-size: 2rem; color: #fff;"></i>
                    </div>
                    <h3 style="color: #211b18; font-size: 1.3rem; font-weight: 700; margin-bottom: 0.5rem;">
                        WhatsApp
                    </h3>
                    <p style="color: #75655b; font-size: 0.9rem; margin-bottom: 1.5rem;">
                        Respuesta rápida a tus mensajes
                    </p>
                    <p style="color: #211b18; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem;">
                        +57 353 8002817
                    </p>
                    <a href="https://wa.me/573538002817?text=Hola%20PERFUMERY%20J%20%26%20P,%20me%20gustaría%20hacer%20una%20consulta" 
                       target="_blank" 
                       class="btn" 
                       style="background: #25d366; color: #fff; border: none; font-weight: 800; width: 100%;">
                        <i class="bi bi-send me-2"></i>Enviar Mensaje
                    </a>
                </div>
            </div>

            <!-- Teléfono -->
            <div class="col-md-6 col-lg-4">
                <div style="padding: 2.5rem; background: linear-gradient(135deg, rgba(199, 154, 91, 0.08), rgba(244, 231, 223, 0.4)); border: 2px solid rgba(199, 154, 91, 0.25); border-radius: 12px; text-align: center; transition: all 0.3s ease;">
                    <div style="width: 60px; height: 60px; background: #c79a5b; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                        <i class="bi bi-telephone-fill" style="font-size: 2rem; color: #fff;"></i>
                    </div>
                    <h3 style="color: #211b18; font-size: 1.3rem; font-weight: 700; margin-bottom: 0.5rem;">
                        Teléfono
                    </h3>
                    <p style="color: #75655b; font-size: 0.9rem; margin-bottom: 1.5rem;">
                        Llamadas de lunes a sábado
                    </p>
                    <p style="color: #211b18; font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem;">
                        +57 353 8002817
                    </p>
                    <a href="tel:+573538002817" 
                       class="btn" 
                       style="background: #c79a5b; color: #211b18; border: none; font-weight: 800; width: 100%;">
                        <i class="bi bi-telephone me-2"></i>Llamar Ahora
                    </a>
                </div>
            </div>

            <!-- Horario -->
            <div class="col-md-6 col-lg-4">
                <div style="padding: 2.5rem; background: linear-gradient(135deg, rgba(100, 116, 139, 0.08), rgba(226, 232, 240, 0.3)); border: 2px solid rgba(100, 116, 139, 0.2); border-radius: 12px; text-align: center; transition: all 0.3s ease;">
                    <div style="width: 60px; height: 60px; background: #64748b; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                        <i class="bi bi-clock-history" style="font-size: 2rem; color: #fff;"></i>
                    </div>
                    <h3 style="color: #211b18; font-size: 1.3rem; font-weight: 700; margin-bottom: 1rem;">
                        Horario de Atención
                    </h3>
                    <div style="text-align: left; display: inline-block;">
                        <p style="color: #75655b; font-size: 0.95rem; margin: 0.5rem 0;">
                            <strong style="color: #211b18;">Lunes a Viernes:</strong> 9:00 AM - 6:00 PM
                        </p>
                        <p style="color: #75655b; font-size: 0.95rem; margin: 0.5rem 0;">
                            <strong style="color: #211b18;">Sábados:</strong> 10:00 AM - 4:00 PM
                        </p>
                        <p style="color: #75655b; font-size: 0.95rem; margin: 0.5rem 0;">
                            <strong style="color: #211b18;">Domingos:</strong> Cerrado
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <hr style="border-color: rgba(199, 154, 91, 0.2); margin: 4rem 0;">

        <!-- Redes Sociales -->
        <div style="margin-top: 4rem;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <span style="display: inline-flex; margin-bottom: 0.8rem; color: #9c7142; font-size: 0.78rem; font-weight: 900; letter-spacing: 0.14em; text-transform: uppercase;" class="perfume-eyebrow">SÍGUENOS</span>
                <h2 style="color: #3a2a23; font-size: clamp(1.8rem, 3.5vw, 2.5rem); font-weight: 800; font-family: 'Playfair Display', Georgia, serif; margin: 0;">
                    Redes Sociales
                </h2>
                <p style="color: #75655b; font-size: 1rem; margin-top: 1rem;">
                    Síguenos para conocer nuestras últimas colecciones, promociones y contenido exclusivo
                </p>
            </div>

            <div style="display: flex; justify-content: center; gap: 1.5rem; flex-wrap: wrap; margin: 2rem 0;">
                <a href="https://instagram.com" target="_blank" rel="noopener" class="btn" style="background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); color: #fff; border: none; font-weight: 800; padding: 0.75rem 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="bi bi-instagram"></i> Instagram
                </a>
                <a href="https://facebook.com" target="_blank" rel="noopener" class="btn" style="background: #1877f2; color: #fff; border: none; font-weight: 800; padding: 0.75rem 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="bi bi-facebook"></i> Facebook
                </a>
                <a href="https://tiktok.com" target="_blank" rel="noopener" class="btn" style="background: #000; color: #fff; border: none; font-weight: 800; padding: 0.75rem 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="bi bi-tiktok"></i> TikTok
                </a>
                <a href="https://twitter.com" target="_blank" rel="noopener" class="btn" style="background: #1da1f2; color: #fff; border: none; font-weight: 800; padding: 0.75rem 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="bi bi-twitter"></i> Twitter
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="padding: 4rem 0; background: linear-gradient(120deg, rgba(33, 27, 24, 0.92), rgba(58, 42, 35, 0.88)); color: #fff; border-top: 1px solid rgba(199, 154, 91, 0.2);">
    <div class="container">
        <div style="text-align: center; max-width: 700px; margin: 0 auto;">
            <h2 style="font-size: clamp(1.8rem, 3.5vw, 2.5rem); font-weight: 800; margin-bottom: 1rem; font-family: 'Playfair Display', Georgia, serif;">
                ¿Necesitas Ayuda con un Pedido?
            </h2>
            <p style="color: rgba(255, 255, 255, 0.8); font-size: 1.05rem; margin-bottom: 2rem;">
                Nuestro equipo está disponible para resolver cualquier pregunta sobre nuestros productos y servicios.
            </p>
            <a href="{{ route('catalogo.index') }}" class="btn" style="background: #c79a5b; color: #211b18; border: none; font-weight: 800; padding: 0.75rem 2rem; display: inline-block;">
                <i class="bi bi-bag-heart me-2"></i>Explorar Catálogo
            </a>
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
