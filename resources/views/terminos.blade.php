@extends('layouts.app')

@section('content')

<!-- Contenido -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-primary fw-bold display-5">Nuestra Política Legal</h2>
            <p class="text-muted fs-5">Consulta los términos que rigen el uso de nuestros servicios.</p>
        </div>

        <div class="accordion accordion-flush shadow-lg" id="politicaLegalAcordeon">

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingUno">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUno" aria-expanded="true" aria-controls="collapseUno">
                        <i class="fas fa-gavel fa-lg me-3 text-primary"></i> 1. Uso del Sitio Web
                    </button>
                </h2>
                <div id="collapseUno" class="accordion-collapse collapse" aria-labelledby="headingUno" data-bs-parent="#politicaLegalAcordeon">
                    <div class="accordion-body">
                        Bienvenido a <strong>Crear System</strong>. Al acceder y utilizar nuestro sitio web, aceptas cumplir con los presentes términos y condiciones, así como con todas las leyes y regulaciones aplicables. Te comprometes a utilizar el sitio únicamente con fines lícitos y de una manera que no infrinja los derechos de, restrinja o inhiba el uso y disfrute de este sitio por parte de terceros.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDos">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDos" aria-expanded="false" aria-controls="collapseDos">
                        <i class="fas fa-copyright fa-lg me-3 text-primary"></i> 2. Propiedad Intelectual
                    </button>
                </h2>
                <div id="collapseDos" class="accordion-collapse collapse" aria-labelledby="headingDos" data-bs-parent="#politicaLegalAcordeon">
                    <div class="accordion-body">
                        Todo el contenido presente en este sitio, incluyendo, entre otros, textos, gráficos, logos, iconos, imágenes, clips de audio, descargas digitales y código de software, es propiedad exclusiva de <strong>Crear System</strong> o de sus proveedores de contenido y está protegido por las leyes de propiedad intelectual.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTres">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTres" aria-expanded="false" aria-controls="collapseTres">
                        <i class="fas fa-laptop-code fa-lg me-3 text-primary"></i> 3. Servicios Ofrecidos
                    </button>
                </h2>
                <div id="collapseTres" class="accordion-collapse collapse" aria-labelledby="headingTres" data-bs-parent="#politicaLegalAcordeon">
                    <div class="accordion-body">
                        Ofrecemos servicios de desarrollo de software a medida, diseño y desarrollo web, consultoría tecnológica y soporte técnico. Nos reservamos el derecho de modificar, suspender o descontinuar cualquier servicio en cualquier momento y sin previo aviso, sin que ello genere responsabilidad alguna.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCuatro">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuatro" aria-expanded="false" aria-controls="collapseCuatro">
                        <i class="fas fa-shield-alt fa-lg me-3 text-primary"></i> 4. Limitación de Responsabilidad
                    </button>
                </h2>
                <div id="collapseCuatro" class="accordion-collapse collapse" aria-labelledby="headingCuatro" data-bs-parent="#politicaLegalAcordeon">
                    <div class="accordion-body">
                        <strong>Crear System</strong> no se hace responsable por daños directos, indirectos, incidentales o consecuentes que puedan derivarse del uso o la incapacidad de uso de nuestro sitio web o de los servicios ofrecidos, incluyendo errores, omisiones o interrupciones en el servicio.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCinco">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCinco" aria-expanded="false" aria-controls="collapseCinco">
                        <i class="fas fa-sync-alt fa-lg me-3 text-primary"></i> 5. Modificaciones a los Términos
                    </button>
                </h2>
                <div id="collapseCinco" class="accordion-collapse collapse" aria-labelledby="headingCinco" data-bs-parent="#politicaLegalAcordeon">
                    <div class="accordion-body">
                        Nos reservamos el derecho de actualizar o modificar estos términos y condiciones en cualquier momento y sin previo aviso. Es tu responsabilidad revisarlos periódicamente para estar al tanto de los cambios. El uso continuado del sitio después de cualquier modificación constituye tu aceptación de los nuevos términos.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSeis">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeis" aria-expanded="false" aria-controls="collapseSeis">
                        <i class="fas fa-envelope-open-text fa-lg me-3 text-primary"></i> 6. Contacto
                    </button>
                </h2>
                <div id="collapseSeis" class="accordion-collapse collapse" aria-labelledby="headingSeis" data-bs-parent="#politicaLegalAcordeon">
                    <div class="accordion-body">
                        Si tienes alguna pregunta o duda sobre estos términos, no dudes en contactarnos a través de <a href="{{ route('contacto') }}" class="text-decoration-underline text-primary fw-bold">nuestra página de contacto</a>.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
