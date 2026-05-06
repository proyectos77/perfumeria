@extends('layouts.app')

@section('body_class', 'perfume-body')

@section('content')
<!-- Hero Section -->
<section class="perfume-hero" style="padding: 6rem 0 4rem; background: linear-gradient(120deg, rgba(33, 27, 24, 0.88), rgba(87, 62, 48, 0.76)), #2a201c; color: #fff;">
    <div class="container">
        <span class="perfume-eyebrow">CONOCE NUESTRA HISTORIA</span>
        <h1 style="font-size: clamp(2.25rem, 4vw, 4rem); font-weight: 900; max-width: 760px;">Quiénes Somos</h1>
        <p style="max-width: 620px; color: rgba(255, 255, 255, 0.82); font-size: 1.05rem; margin-top: 1rem;">
            Descubre la pasión y dedicación detrás de PERFUMERY J & P
        </p>
    </div>
</section>

<!-- Main Content -->
<section style="padding: 5rem 0; background: #fbf8f4;">
    <div class="container">
        <!-- Introducción -->
        <div class="row align-items-center g-5 mb-5">
            {{-- <div class="col-lg-6">
                <div style="padding: 2rem; background: rgba(199, 154, 91, 0.06); border: 1px solid rgba(199, 154, 91, 0.2); border-radius: 12px; text-align: center;">
                    <p style="font-size: clamp(3rem, 8vw, 4.2rem); font-weight: 900; color: #c79a5b; margin: 0; font-family: 'Playfair Display', Georgia, serif;">
                         +5 Años -
                    </p>
                    <p style="color: #3a2a23; font-size: 1rem; margin-top: 0.5rem; font-weight: 600;">
                        De experiencia en fragancias
                    </p>
                </div>
            </div> --}}
            <div class="col-lg-6">
                <p style="color: #211b18; font-size: 1.1rem; line-height: 1.8; margin-bottom: 1.5rem;">
                    <strong style="color: #c79a5b;">PERFUMERY J & P</strong> nace de la pasión por las fragancias de calidad y el deseo de compartir experiencias olfativas únicas con nuestros clientes.
                </p>
                <p style="color: #75655b; font-size: 1rem; line-height: 1.8;">
                    Comenzamos como un pequeño emprendimiento familiar y hoy nos enorgullece ofrecer una cuidada selección de perfumes auténticos que transforman momentos ordinarios en experiencias extraordinarias.
                </p>
            </div>
        </div>

        <hr style="border-color: rgba(199, 154, 91, 0.2); margin: 4rem 0;">

        <!-- Misión y Valores -->
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div style="padding: 2.5rem; background: #fff; border: 1px solid rgba(199, 154, 91, 0.14); border-radius: 12px; box-shadow: 0 16px 40px rgba(33, 27, 24, 0.08); transition: all 0.3s ease;" class="h-100">
                    <div style="width: 50px; height: 50px; background: rgba(199, 154, 91, 0.15); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                        <i class="bi bi-heart" style="font-size: 1.8rem; color: #c79a5b;"></i>
                    </div>
                    <h3 style="color: #211b18; font-size: 1.5rem; font-weight: 700; font-family: 'Playfair Display', Georgia, serif; margin-bottom: 1rem;">
                        Nuestra Misión
                    </h3>
                    <p style="color: #75655b; font-size: 0.95rem; line-height: 1.8; margin: 0;">
                        Ofrecemos fragancias que transforman vidas, permitiendo que cada persona expresar su esencia única a través de aromas cuidadosamente seleccionados.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div style="padding: 2.5rem; background: #fff; border: 1px solid rgba(199, 154, 91, 0.14); border-radius: 12px; box-shadow: 0 16px 40px rgba(33, 27, 24, 0.08); transition: all 0.3s ease;" class="h-100">
                    <div style="width: 50px; height: 50px; background: rgba(199, 154, 91, 0.15); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                        <i class="bi bi-star" style="font-size: 1.8rem; color: #c79a5b;"></i>
                    </div>
                    <h3 style="color: #211b18; font-size: 1.5rem; font-weight: 700; font-family: 'Playfair Display', Georgia, serif; margin-bottom: 1rem;">
                        Nuestros Valores
                    </h3>
                    <p style="color: #75655b; font-size: 0.95rem; line-height: 1.8; margin: 0;">
                        Autenticidad, calidad, compromiso y dedicación son los pilares que guían cada decisión en PERFUMERY J & P.
                    </p>
                </div>
            </div>
        </div>

        <!-- Por Qué Elegirnos -->
        <div style="margin-top: 4rem;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <span style="display: inline-flex; margin-bottom: 0.8rem; color: #9c7142; font-size: 0.78rem; font-weight: 900; letter-spacing: 0.14em; text-transform: uppercase;" class="perfume-eyebrow">RAZONES PARA CONFIAR</span>
                <h2 style="color: #3a2a23; font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; font-family: 'Playfair Display', Georgia, serif; margin: 0;">
                    ¿Por Qué Elegirnos?
                </h2>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div style="padding: 2rem; background: linear-gradient(135deg, rgba(199, 154, 91, 0.08), rgba(244, 231, 223, 0.4)); border: 1px solid rgba(199, 154, 91, 0.18); border-radius: 12px; text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem; color: #c79a5b;">
                            <i class="bi bi-gem"></i>
                        </div>
                        <h4 style="color: #211b18; font-weight: 700; margin-bottom: 0.75rem;">
                            Fragancias Seleccionadas
                        </h4>
                        <p style="color: #75655b; font-size: 0.9rem; margin: 0;">
                            Cuidadosamente elegidas por expertos para garantizar la mejor experiencia olfativa.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div style="padding: 2rem; background: linear-gradient(135deg, rgba(199, 154, 91, 0.08), rgba(244, 231, 223, 0.4)); border: 1px solid rgba(199, 154, 91, 0.18); border-radius: 12px; text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem; color: #c79a5b;">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <h4 style="color: #211b18; font-weight: 700; margin-bottom: 0.75rem;">
                            Calidad Garantizada
                        </h4>
                        <p style="color: #75655b; font-size: 0.9rem; margin: 0;">
                            Productos auténticos y de primera calidad directamente de marcas reconocidas.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div style="padding: 2rem; background: linear-gradient(135deg, rgba(199, 154, 91, 0.08), rgba(244, 231, 223, 0.4)); border: 1px solid rgba(199, 154, 91, 0.18); border-radius: 12px; text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem; color: #c79a5b;">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h4 style="color: #211b18; font-weight: 700; margin-bottom: 0.75rem;">
                            Envíos Seguros
                        </h4>
                        <p style="color: #75655b; font-size: 0.9rem; margin: 0;">
                            Empaques seguros y confiables para proteger cada compra durante el transporte.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div style="padding: 2rem; background: linear-gradient(135deg, rgba(199, 154, 91, 0.08), rgba(244, 231, 223, 0.4)); border: 1px solid rgba(199, 154, 91, 0.18); border-radius: 12px; text-align: center;">
                        <div style="font-size: 2.5rem; margin-bottom: 1rem; color: #c79a5b;">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4 style="color: #211b18; font-weight: 700; margin-bottom: 0.75rem;">
                            Atención Personalizada
                        </h4>
                        <p style="color: #75655b; font-size: 0.9rem; margin: 0;">
                            Equipo disponible para resolver tus dudas y recomendaciones expertos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="padding: 4rem 0; background: linear-gradient(120deg, rgba(33, 27, 24, 0.92), rgba(58, 42, 35, 0.88)); color: #fff; border-top: 1px solid rgba(199, 154, 91, 0.2);">
    <div class="container">
        <div style="text-align: center; max-width: 700px; margin: 0 auto;">
            <h2 style="font-size: clamp(1.8rem, 3.5vw, 2.5rem); font-weight: 800; margin-bottom: 1rem; font-family: 'Playfair Display', Georgia, serif;">
                ¿Listo para Descubrir tu Fragancia Ideal?
            </h2>
            <p style="color: rgba(255, 255, 255, 0.8); font-size: 1.05rem; margin-bottom: 2rem;">
                Explora nuestro catálogo y encuentra la fragancia perfecta para ti. Nuestro equipo está listo para ayudarte.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('catalogo.index') }}" class="btn" style="background: #c79a5b; color: #211b18; border: none; font-weight: 800; padding: 0.75rem 2rem;">
                    <i class="bi bi-bag-heart me-2"></i>Ver Catálogo
                </a>
                <a href="https://wa.me/573538002817?text=Hola%20PERFUMERY%20J%20%26%20P,%20me%20gustaría%20conocer%20más%20sobre%20sus%20productos" 
                   target="_blank" 
                   class="btn" 
                   style="background: transparent; color: #c79a5b; border: 2px solid #c79a5b; font-weight: 800; padding: 0.75rem 2rem;">
                    <i class="bi bi-whatsapp me-2"></i>Contáctanos
                </a>
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
