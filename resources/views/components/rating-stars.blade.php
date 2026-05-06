@props(['product', 'interactive' => true])

<div class="rating-section">
    <div class="rating-header">
        <div class="rating-stats">
            <div class="rating-average">
                <span class="rating-value">{{ number_format($product->getCalificacionPromedio(), 1) }}</span>
                <div class="rating-stars-display">
                    @php
                        $promedio = $product->getCalificacionPromedio();
                        $estrellas_llenas = floor($promedio);
                        $media_estrella = ($promedio - $estrellas_llenas) >= 0.5;
                    @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $estrellas_llenas)
                            <i class="bi bi-star-fill star-filled"></i>
                        @elseif ($i - 1 < $promedio && !$media_estrella && $i - 1 < $estrellas_llenas + 0.5)
                            <i class="bi bi-star-half star-half"></i>
                        @else
                            <i class="bi bi-star star-empty"></i>
                        @endif
                    @endfor
                </div>
                <span class="rating-count">({{ $product->getCalificacionTotal() }} calificaciones)</span>
            </div>

            @if ($interactive)
                <button type="button" class="btn-rate-product" data-bs-toggle="modal" data-bs-target="#ratingModal">
                    <i class="bi bi-pencil-square me-2"></i>Calificar Producto
                </button>
            @endif
        </div>

        @if ($product->getCalificacionTotal() > 0)
            <div class="rating-breakdown">
                @foreach ([5, 4, 3, 2, 1] as $stars)
                    @php
                        $count = $product->calificacionesAprobadas()
                            ->where('calificacion', $stars)
                            ->count();
                        $percentage = $product->getCalificacionTotal() > 0 
                            ? round(($count / $product->getCalificacionTotal()) * 100) 
                            : 0;
                    @endphp
                    <div class="rating-bar-item">
                        <span class="rating-bar-label">{{ $stars }} <i class="bi bi-star-fill"></i></span>
                        <div class="rating-bar-track">
                            <div class="rating-bar-fill" style="width: {{ $percentage }}%"></div>
                        </div>
                        <span class="rating-bar-count">{{ $count }}</span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @if ($interactive && auth()->check())
        <!-- Modal de Calificación -->
        <div class="modal fade" id="ratingModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold">Califica este Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('productos.calificaciones.store', $product) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="rating-input-group">
                                <label class="form-label fw-semibold mb-3">Tu Calificación</label>
                                <div class="rating-stars-input" id="ratingStarsInput">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label class="star-input-label" data-value="{{ $i }}">
                                            <input type="radio" name="calificacion" value="{{ $i }}" hidden required>
                                            <i class="bi bi-star-fill"></i>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Comentario (Opcional)</label>
                                <textarea name="comentario" class="form-control" rows="4" placeholder="Comparte tu experiencia..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Enviar Calificación</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @elseif ($interactive && !auth()->check())
        <!-- Modal para no autenticados -->
        <div class="modal fade" id="ratingModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold">Inicia Sesión para Calificar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="text-muted mb-4">Debes estar autenticado para calificar productos.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
.rating-section {
    margin: 2rem 0;
}

.rating-header {
    display: grid;
    gap: 2rem;
}

.rating-stats {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    background: var(--secondary-50);
    border-radius: 12px;
    border: 1px solid var(--border-light);
}

.rating-average {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.rating-value {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--text-primary);
    line-height: 1;
}

.rating-stars-display {
    display: flex;
    gap: 0.25rem;
    font-size: 1.2rem;
}

.star-filled {
    color: #ffc107;
}

.star-half {
    background: linear-gradient(90deg, #ffc107 50%, #ccc 50%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.star-empty {
    color: #ccc;
}

.rating-count {
    font-size: 0.85rem;
    color: var(--text-light);
}

.btn-rate-product {
    padding: 0.6rem 1.2rem;
    background: var(--primary-600);
    color: #fff;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-rate-product:hover {
    background: var(--primary-500);
    transform: translateY(-2px);
}

.rating-breakdown {
    display: grid;
    gap: 1rem;
}

.rating-bar-item {
    display: grid;
    grid-template-columns: 70px 1fr 40px;
    gap: 1rem;
    align-items: center;
}

.rating-bar-label {
    font-weight: 600;
    font-size: 0.9rem;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 0.3rem;
    color: var(--text-primary);
}

.rating-bar-track {
    height: 8px;
    background: var(--secondary-100);
    border-radius: 4px;
    overflow: hidden;
}

.rating-bar-fill {
    height: 100%;
    background: linear-gradient(90deg, #ffc107, #ffb700);
    transition: width 0.3s ease;
}

.rating-bar-count {
    font-weight: 600;
    font-size: 0.85rem;
    color: var(--text-light);
    text-align: right;
}

.rating-input-group {
    text-align: center;
}

.rating-stars-input {
    display: flex;
    justify-content: center;
    gap: 0.8rem;
    font-size: 2.5rem;
}

.star-input-label {
    cursor: pointer;
    color: #ccc;
    transition: all 0.2s ease;
}

.star-input-label:hover,
.star-input-label input:checked ~ i {
    color: #ffc107;
    transform: scale(1.1);
}

@media (max-width: 768px) {
    .rating-stats {
        flex-direction: column;
        gap: 1rem;
    }

    .rating-average {
        align-items: center;
    }

    .btn-rate-product {
        width: 100%;
    }

    .rating-breakdown {
        gap: 0.8rem;
    }

    .rating-bar-item {
        grid-template-columns: 60px 1fr 35px;
    }

    .rating-stars-input {
        font-size: 2rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ratingInputs = document.querySelectorAll('#ratingStarsInput .star-input-label');
    
    ratingInputs.forEach(label => {
        label.addEventListener('click', function() {
            const value = this.dataset.value;
            const input = this.querySelector('input[type="radio"]');
            input.checked = true;
        });

        label.addEventListener('mouseenter', function() {
            const value = parseInt(this.dataset.value);
            ratingInputs.forEach((l, i) => {
                if (i < value) {
                    l.style.color = '#ffc107';
                } else {
                    l.style.color = '#ccc';
                }
            });
        });
    });

    const container = document.getElementById('ratingStarsInput');
    if (container) {
        container.addEventListener('mouseleave', function() {
            ratingInputs.forEach(l => {
                const input = l.querySelector('input[type="radio"]');
                if (!input.checked) {
                    l.style.color = '#ccc';
                }
            });
        });
    }
});
</script>
