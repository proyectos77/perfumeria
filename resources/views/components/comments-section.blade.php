@props(['product'])

<div class="comments-section">
    <div class="comments-header">
        <h3 class="fw-bold">Opiniones de Clientes</h3>
        <span class="comments-count badge bg-primary">{{ $product->comentariosAprobados()->count() }}</span>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Formulario de Comentario -->
    @auth
        <div class="comment-form-container mb-4">
            <h4 class="fw-semibold mb-3">Deja tu Opinión</h4>
            <form action="{{ route('productos.comentarios.store', $product) }}" method="POST" class="comment-form">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tu Nombre</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                           value="{{ old('nombre', auth()->user()->name) }}" required>
                    @error('nombre') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tu Correo</label>
                    <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" 
                           value="{{ old('correo', auth()->user()->email) }}" required>
                    @error('correo') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tu Opinión</label>
                    <textarea name="contenido" rows="4" class="form-control @error('contenido') is-invalid @enderror" 
                              placeholder="Comparte tu experiencia con este producto..." required>{{ old('contenido') }}</textarea>
                    @error('contenido') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary fw-bold">
                        <i class="bi bi-send me-2"></i>Publicar Comentario
                    </button>
                    <small class="text-muted align-self-center">Los comentarios se mostrarán después de aprobación</small>
                </div>
            </form>
        </div>
    @else
        <div class="alert alert-info border-0 mb-4">
            <i class="bi bi-info-circle me-2"></i>
            <strong>Inicia sesión</strong> para dejar tu opinión.
            <a href="{{ route('login') }}" class="alert-link">Iniciar sesión</a> o 
            <a href="{{ route('register') }}" class="alert-link">registrarse</a>
        </div>
    @endauth

    <!-- Lista de Comentarios -->
    <div class="comments-list">
        @forelse ($product->comentariosAprobados()->latest()->get() as $comentario)
            <div class="comment-item">
                <div class="comment-header">
                    <div class="comment-author">
                        <h5 class="fw-bold mb-0">{{ $comentario->nombre }}</h5>
                        <small class="text-muted">{{ $comentario->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="comment-actions">
                        <button class="btn-comment-helpful" data-comment-id="{{ $comentario->id }}">
                            <i class="bi bi-hand-thumbs-up"></i>
                            <span class="helpful-count">{{ $comentario->util }}</span>
                        </button>
                    </div>
                </div>
                <p class="comment-content">{{ $comentario->contenido }}</p>
            </div>
        @empty
            <div class="comment-empty">
                <i class="bi bi-chat-dots"></i>
                <p>Aún no hay opiniones. ¡Sé el primero en compartir tu experiencia!</p>
            </div>
        @endforelse
    </div>
</div>

<style>
.comments-section {
    margin: 3rem 0;
    padding: 2rem;
    background: var(--secondary-50);
    border-radius: 12px;
    border: 1px solid var(--border-light);
}

.comments-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--border-medium);
}

.comments-header h3 {
    margin: 0;
    color: var(--text-primary);
}

.comments-count {
    font-weight: 800;
}

.comment-form-container {
    padding: 1.5rem;
    background: var(--white);
    border-radius: 12px;
    border: 1px solid var(--border-light);
}

.comment-form-container h4 {
    color: var(--text-primary);
}

.comment-form .form-label {
    color: var(--text-primary);
}

.comment-form .form-control {
    border: 1px solid var(--border-light);
    border-radius: 8px;
}

.comment-form .form-control:focus {
    border-color: var(--primary-500);
    box-shadow: 0 0 0 0.2rem rgba(74, 123, 198, 0.18);
}

.comments-list {
    display: grid;
    gap: 1.5rem;
}

.comment-item {
    padding: 1.5rem;
    background: var(--white);
    border-radius: 12px;
    border: 1px solid var(--border-light);
    transition: all 0.3s ease;
}

.comment-item:hover {
    box-shadow: 0 4px 12px rgba(15, 31, 64, 0.08);
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--border-light);
}

.comment-author h5 {
    color: var(--text-primary);
    font-size: 1rem;
}

.comment-author small {
    display: block;
    font-size: 0.8rem;
}

.comment-actions {
    display: flex;
    gap: 0.5rem;
}

.btn-comment-helpful {
    padding: 0.4rem 0.8rem;
    background: transparent;
    border: 1px solid var(--border-light);
    border-radius: 6px;
    color: var(--text-light);
    font-size: 0.85rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.4rem;
    white-space: nowrap;
}

.btn-comment-helpful:hover {
    background: var(--primary-50);
    border-color: var(--primary-500);
    color: var(--primary-600);
}

.btn-comment-helpful.is-active {
    background: var(--primary-600);
    border-color: var(--primary-600);
    color: #fff;
}

.helpful-count {
    font-weight: 600;
    min-width: 20px;
    text-align: center;
}

.comment-content {
    color: var(--text-secondary);
    line-height: 1.8;
    margin: 0;
    word-break: break-word;
}

.comment-empty {
    text-align: center;
    padding: 3rem 1rem;
    color: var(--text-light);
}

.comment-empty i {
    font-size: 3rem;
    color: var(--secondary-200);
    margin-bottom: 1rem;
    display: block;
}

@media (max-width: 768px) {
    .comments-section {
        padding: 1rem;
    }

    .comments-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .comment-header {
        flex-direction: column;
        gap: 0.8rem;
    }

    .comment-actions {
        width: 100%;
    }

    .btn-comment-helpful {
        flex: 1;
        justify-content: center;
    }

    .comment-form .row > div {
        margin-bottom: 0.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-comment-helpful').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const commentId = this.dataset.commentId;
            const countSpan = this.querySelector('.helpful-count');
            let count = parseInt(countSpan.textContent);

            if (this.classList.contains('is-active')) {
                count--;
                this.classList.remove('is-active');
            } else {
                count++;
                this.classList.add('is-active');
            }

            countSpan.textContent = count;

            // Aquí iría una llamada AJAX para guardar los datos
            // fetch(`/api/comentarios/${commentId}/helpful`, { method: 'POST' })
        });
    });
});
</script>
