@props(['images', 'autoplay' => true, 'interval' => 5000])

<div class="carousel-container">
    <div class="carousel-wrapper" id="elegantCarousel">
        <div class="carousel-slides">
            @forelse ($images as $index => $image)
                <div class="carousel-slide" data-index="{{ $index }}">
                    <img src="{{ $image }}" alt="Carrusel imagen {{ $index + 1 }}" loading="lazy">
                    <div class="carousel-overlay">
                        <div class="carousel-content">
                            <span class="carousel-badge">Destacado</span>
                            <h2>Colección Exclusiva</h2>
                            <p>Descubre nuestras fragancias más seleccionadas</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="carousel-slide carousel-slide--empty">
                    <div class="carousel-empty">
                        <i class="bi bi-image"></i>
                        <p>Galería de imágenes</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Controles de Navegación -->
        @if (count($images) > 1)
            <button class="carousel-button carousel-button--prev" id="prevBtn" aria-label="Imagen anterior">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="carousel-button carousel-button--next" id="nextBtn" aria-label="Imagen siguiente">
                <i class="bi bi-chevron-right"></i>
            </button>

            <!-- Indicadores -->
            <div class="carousel-indicators">
                @foreach ($images as $index => $image)
                    <button class="carousel-dot" data-slide="{{ $index }}" aria-label="Ir a imagen {{ $index + 1 }}" @if ($index === 0) data-active @endif></button>
                @endforeach
            </div>
        @endif
    </div>
</div>

<style>
.carousel-container {
    width: 100%;
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(45, 122, 92, 0.12);
}

.carousel-wrapper {
    position: relative;
    width: 100%;
    padding-bottom: 66.67%; /* 3:2 Aspect Ratio */
    background: var(--primary-100);
}

.carousel-slides {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.carousel-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    z-index: 0;
}

.carousel-slide[data-active] {
    opacity: 1;
    z-index: 1;
}

.carousel-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.carousel-slide--empty {
    background: linear-gradient(135deg, var(--primary-100) 0%, var(--primary-50) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.carousel-empty {
    text-align: center;
    color: var(--text-light);
}

.carousel-empty i {
    font-size: 4rem;
    color: var(--primary-200);
    margin-bottom: 1rem;
    display: block;
}

.carousel-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(45, 122, 92, 0.3) 0%, rgba(45, 122, 92, 0.1) 50%, transparent 100%);
    display: flex;
    align-items: flex-end;
    padding: 2rem;
    z-index: 2;
}

.carousel-content {
    color: #fff;
    animation: slideUp 0.8s ease-out;
}

.carousel-badge {
    display: inline-block;
    padding: 0.4rem 0.8rem;
    background: var(--primary-600);
    color: #fff;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 900;
    text-transform: uppercase;
    margin-bottom: 0.8rem;
    letter-spacing: 0.05em;
}

.carousel-content h2 {
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    font-weight: 800;
    margin: 0 0 0.5rem 0;
    color: #fff;
    line-height: 1.2;
}

.carousel-content p {
    font-size: clamp(0.95rem, 2vw, 1.1rem);
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Botones de Navegación */
.carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.25);
    border: 2px solid rgba(255, 255, 255, 0.5);
    color: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.carousel-button:hover {
    background: rgba(255, 255, 255, 0.4);
    border-color: #fff;
    transform: translateY(-50%) scale(1.1);
}

.carousel-button--prev {
    left: 1.5rem;
}

.carousel-button--next {
    right: 1.5rem;
}

/* Indicadores */
.carousel-indicators {
    position: absolute;
    bottom: 1.5rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 0.6rem;
    z-index: 10;
}

.carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.4);
    border: 2px solid rgba(255, 255, 255, 0.6);
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
    font-size: 0;
}

.carousel-dot:hover {
    background: rgba(255, 255, 255, 0.6);
    transform: scale(1.15);
}

.carousel-dot[data-active] {
    background: #fff;
    width: 28px;
    border-radius: 6px;
}

/* Responsive */
@media (max-width: 768px) {
    .carousel-overlay {
        padding: 1.5rem;
    }

    .carousel-button {
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
    }

    .carousel-button--prev {
        left: 1rem;
    }

    .carousel-button--next {
        right: 1rem;
    }

    .carousel-indicators {
        bottom: 1rem;
        gap: 0.5rem;
    }

    .carousel-dot {
        width: 10px;
        height: 10px;
    }

    .carousel-dot[data-active] {
        width: 24px;
    }
}

@media (max-width: 480px) {
    .carousel-content h2 {
        font-size: 1.3rem;
    }

    .carousel-content p {
        font-size: 0.85rem;
    }

    .carousel-badge {
        font-size: 0.65rem;
        padding: 0.3rem 0.6rem;
    }
}
</style>
    text-align: center;
    color: var(--text-light);
}

.carousel-empty i {
    font-size: 4rem;
    color: var(--secondary-300);
    margin-bottom: 1rem;
    display: block;
}

.carousel-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(15, 31, 64, 0.4) 0%, rgba(15, 31, 64, 0.1) 50%, transparent 100%);
    display: flex;
    align-items: flex-end;
    padding: 2rem;
    z-index: 2;
}

.carousel-content {
    color: #fff;
    animation: slideUp 0.8s ease-out;
}

.carousel-badge {
    display: inline-block;
    padding: 0.4rem 0.8rem;
    background: var(--accent-600);
    color: #fff;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 900;
    text-transform: uppercase;
    margin-bottom: 0.8rem;
    letter-spacing: 0.05em;
}

.carousel-content h2 {
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    font-weight: 800;
    margin: 0 0 0.5rem 0;
    color: #fff;
    line-height: 1.2;
}

.carousel-content p {
    font-size: clamp(0.95rem, 2vw, 1.1rem);
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Botones de Navegación */
.carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.25);
    border: 2px solid rgba(255, 255, 255, 0.5);
    color: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.carousel-button:hover {
    background: rgba(255, 255, 255, 0.4);
    border-color: #fff;
    transform: translateY(-50%) scale(1.1);
}

.carousel-button--prev {
    left: 1.5rem;
}

.carousel-button--next {
    right: 1.5rem;
}

/* Indicadores */
.carousel-indicators {
    position: absolute;
    bottom: 1.5rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 0.6rem;
    z-index: 10;
}

.carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.4);
    border: 2px solid rgba(255, 255, 255, 0.6);
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
    font-size: 0;
}

.carousel-dot:hover {
    background: rgba(255, 255, 255, 0.6);
    transform: scale(1.15);
}

.carousel-dot[data-active] {
    background: #fff;
    width: 28px;
    border-radius: 6px;
}

/* Responsive */
@media (max-width: 768px) {
    .carousel-overlay {
        padding: 1.5rem;
    }

    .carousel-button {
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
    }

    .carousel-button--prev {
        left: 1rem;
    }

    .carousel-button--next {
        right: 1rem;
    }

    .carousel-indicators {
        bottom: 1rem;
        gap: 0.5rem;
    }

    .carousel-dot {
        width: 10px;
        height: 10px;
    }

    .carousel-dot[data-active] {
        width: 24px;
    }
}

@media (max-width: 480px) {
    .carousel-content h2 {
        font-size: 1.3rem;
    }

    .carousel-content p {
        font-size: 0.85rem;
    }

    .carousel-badge {
        font-size: 0.65rem;
        padding: 0.3rem 0.6rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('elegantCarousel');
    if (!carousel) return;

    const slides = carousel.querySelectorAll('.carousel-slide');
    const dots = carousel.querySelectorAll('.carousel-dot');
    const prevBtn = carousel.querySelector('#prevBtn');
    const nextBtn = carousel.querySelector('#nextBtn');

    let currentIndex = 0;
    let autoplayInterval;

    const updateCarousel = (index) => {
        slides.forEach((slide, i) => {
            slide.removeAttribute('data-active');
            if (i === index) {
                slide.setAttribute('data-active', '');
            }
        });

        dots.forEach((dot, i) => {
            dot.removeAttribute('data-active');
            if (i === index) {
                dot.setAttribute('data-active', '');
            }
        });

        currentIndex = index;
    };

    const nextSlide = () => {
        let nextIndex = (currentIndex + 1) % slides.length;
        updateCarousel(nextIndex);
        resetAutoplay();
    };

    const prevSlide = () => {
        let prevIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateCarousel(prevIndex);
        resetAutoplay();
    };

    const goToSlide = (index) => {
        updateCarousel(index);
        resetAutoplay();
    };

    const startAutoplay = () => {
        @if ($autoplay && count($images) > 1)
            autoplayInterval = setInterval(nextSlide, {{ $interval }});
        @endif
    };

    const resetAutoplay = () => {
        clearInterval(autoplayInterval);
        startAutoplay();
    };

    // Event Listeners
    if (prevBtn) prevBtn.addEventListener('click', prevSlide);
    if (nextBtn) nextBtn.addEventListener('click', nextSlide);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => goToSlide(index));
    });

    // Pausar en hover
    carousel.addEventListener('mouseenter', () => clearInterval(autoplayInterval));
    carousel.addEventListener('mouseleave', startAutoplay);

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') prevSlide();
        if (e.key === 'ArrowRight') nextSlide();
    });

    // Inicializar
    updateCarousel(0);
    startAutoplay();
});
</script>
