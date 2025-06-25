@props([
    'title' => 'Título por defecto',
    'text' => 'Texto descriptivo de la sección...',
    'image' => 'images/ilustracion-default.svg',
    'reverse' => false,
])

<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center {{ $reverse ? 'flex-row-reverse' : '' }}">
            <!-- Imagen -->
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="{{ asset($image) }}" class="img-fluid" alt="{{ $title }}" style="max-height: 300px;">
            </div>

            <!-- Texto -->
            <div class="col-md-6">
                <h2 class="text-primary">{{ $title }}</h2>
                <p class="text-muted">{{ $text }}</p>
            </div>
        </div>
    </div>
</section>
