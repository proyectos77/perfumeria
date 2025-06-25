@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-primary mb-4">Términos y Condiciones</h2>

    <p>Bienvenido a Crear System. Al utilizar nuestro sitio web y nuestros servicios, aceptas los siguientes términos y condiciones. Por favor, léelos cuidadosamente.</p>

    <h5 class="mt-4">1. Uso del sitio</h5>
    <p>Al acceder a este sitio, aceptas utilizarlo solo con fines legales y de acuerdo con estos términos.</p>

    <h5 class="mt-4">2. Propiedad intelectual</h5>
    <p>Todo el contenido del sitio (textos, logos, imágenes, código, etc.) pertenece a Crear System, salvo lo indicado expresamente.</p>

    <h5 class="mt-4">3. Servicios ofrecidos</h5>
    <p>Ofrecemos servicios de desarrollo de software, diseño web, consultoría tecnológica y soporte técnico. Nos reservamos el derecho de modificar o suspender cualquier servicio.</p>

    <h5 class="mt-4">4. Responsabilidad</h5>
    <p>No nos hacemos responsables por daños derivados del uso incorrecto del sitio o los servicios ofrecidos.</p>

    <h5 class="mt-4">5. Modificaciones</h5>
    <p>Podemos actualizar estos términos en cualquier momento. Se recomienda revisarlos periódicamente.</p>

    <h5 class="mt-4">6. Contacto</h5>
    <p>Si tienes preguntas sobre estos términos, contáctanos en <a href="{{ route('contacto') }}">nuestra página de contacto</a>.</p>
</div>
@endsection
