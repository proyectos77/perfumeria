@extends('layouts.app')

@section('content')


<!-- Contenido -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-primary fw-bold display-5">Tu Privacidad es Importante</h2>
            <p class="text-muted fs-5">Conoce cómo protegemos y usamos tu información personal.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="privacy-feature">
                    <div class="privacy-icon-wrapper mb-3">
                        <i class="fas fa-database fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Recopilación de Datos</h5>
                    <p class="text-muted">Solo recopilamos la información esencial para brindarte nuestros servicios.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="privacy-feature">
                    <div class="privacy-icon-wrapper mb-3">
                        <i class="fas fa-shield-alt fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Máxima Protección</h5>
                    <p class="text-muted">Implementamos medidas de seguridad robustas para proteger tus datos.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="privacy-feature">
                    <div class="privacy-icon-wrapper mb-3">
                        <i class="fas fa-user-check fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Tú Tienes el Control</h5>
                    <p class="text-muted">Tienes derecho a acceder, corregir o eliminar tu información cuando quieras.</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalPoliticaPrivacidad">
                <i class="fas fa-file-contract me-2"></i>
                Ver Política de Privacidad Completa
            </button>
        </div>
    </div>
</section>

<div class="modal fade" id="modalPoliticaPrivacidad" tabindex="-1" aria-labelledby="modalPoliticaPrivacidadLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl modal-custom-width">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h4 class="modal-title text-primary fw-bold" id="modalPoliticaPrivacidadLabel">Política de Privacidad de Crear System</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <p class="mb-4 text-muted">En <strong>Crear System</strong> nos comprometemos a proteger tu privacidad. Esta política describe en detalle cómo recopilamos, usamos y resguardamos tu información personal. Última actualización: 18 de julio de 2025.</p>

        <div class="accordion accordion-flush" id="acordeonPrivacidad">

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePriv1">
                        <i class="fas fa-user-edit fa-lg me-3 text-primary"></i> 1. Información que Recopilamos
                    </button>
                </h2>
                <div id="collapsePriv1" class="accordion-collapse collapse" data-bs-parent="#acordeonPrivacidad">
                    <div class="accordion-body">
                        Podemos recopilar información de identificación personal como nombre, dirección de correo electrónico, número de contacto, y detalles de tu empresa o proyecto. Esto ocurre cuando te registras en nuestro sitio, llenas un formulario, contratas un servicio o te comunicas con nuestro equipo de soporte.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePriv2">
                        <i class="fas fa-cogs fa-lg me-3 text-primary"></i> 2. Uso de la Información
                    </button>
                </h2>
                <div id="collapsePriv2" class="accordion-collapse collapse" data-bs-parent="#acordeonPrivacidad">
                    <div class="accordion-body">
                        Utilizamos tu información para los siguientes propósitos: personalizar tu experiencia, mejorar nuestro sitio web, procesar transacciones, brindar los servicios contratados, responder a tus consultas y enviarte comunicaciones de marketing o actualizaciones sobre nuestros productos (siempre con tu consentimiento previo).
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePriv3">
                        <i class="fas fa-shield-virus fa-lg me-3 text-primary"></i> 3. Protección de Datos
                    </button>
                </h2>
                <div id="collapsePriv3" class="accordion-collapse collapse" data-bs-parent="#acordeonPrivacidad">
                    <div class="accordion-body">
                        Implementamos una variedad de medidas de seguridad técnicas y organizativas para mantener la seguridad de tu información personal. Tus datos se almacenan en redes seguras y solo son accesibles por un número limitado de personas con derechos especiales de acceso, quienes están obligadas a mantener la confidencialidad.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePriv4">
                        <i class="fas fa-share-nodes fa-lg me-3 text-primary"></i> 4. Compartir Información con Terceros
                    </button>
                </h2>
                <div id="collapsePriv4" class="accordion-collapse collapse" data-bs-parent="#acordeonPrivacidad">
                    <div class="accordion-body">
                        No vendemos, intercambiamos ni transferimos de ningún otro modo tu información personal a terceros, excepto a socios de confianza que nos asisten en la operación de nuestro sitio web o en la prestación de nuestros servicios, siempre y cuando dichas partes se comprometan a mantener esta información confidencial. También podemos divulgar tu información cuando creamos que es apropiado para cumplir con la ley.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePriv5">
                        <i class="fas fa-user-shield fa-lg me-3 text-primary"></i> 5. Tus Derechos
                    </button>
                </h2>
                <div id="collapsePriv5" class="accordion-collapse collapse" data-bs-parent="#acordeonPrivacidad">
                    <div class="accordion-body">
                        Tienes derecho a solicitar el Acceso, Rectificación, Cancelación u Oposición (derechos ARCO) sobre el uso de tus datos personales. Para ejercer estos derechos, puedes contactarnos directamente a través de los canales proporcionados en nuestra página de contacto y atenderemos tu solicitud según lo estipulado por la ley.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePriv6">
                        <i class="fas fa-sync-alt fa-lg me-3 text-primary"></i> 6. Cambios a esta Política
                    </button>
                </h2>
                <div id="collapsePriv6" class="accordion-collapse collapse" data-bs-parent="#acordeonPrivacidad">
                    <div class="accordion-body">
                        Nos reservamos el derecho de modificar esta política de privacidad en cualquier momento. Cualquier cambio será publicado en esta página y la fecha de "Última actualización" en la parte superior del modal será modificada. Te recomendamos revisarla periódicamente para estar informado.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePriv7">
                        <i class="fas fa-envelope-open-text fa-lg me-3 text-primary"></i> 7. Contacto
                    </button>
                </h2>
                <div id="collapsePriv7" class="accordion-collapse collapse" data-bs-parent="#acordeonPrivacidad">
                    <div class="accordion-body">
                        Si tienes alguna pregunta sobre nuestra política de privacidad, no dudes en ponerte en contacto con nosotros desde <a href="{{ route('contacto') }}" class="text-decoration-underline text-primary fw-bold">nuestra página de contacto</a>.
                    </div>
                </div>
            </div>
            
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection
