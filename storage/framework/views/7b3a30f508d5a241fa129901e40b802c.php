<?php $__env->startSection('content'); ?>

<?php
    $conversationTopics = [
        [
            'icon' => 'bi bi-diagram-3',
            'title' => 'Contexto actual',
            'text' => 'Entendemos en qué punto está tu empresa, qué necesidad tienes y dónde hoy se está generando más fricción.',
        ],
        [
            'icon' => 'bi bi-kanban',
            'title' => 'Prioridades del proyecto',
            'text' => 'Aterrizamos qué conviene resolver primero y qué tipo de avance puede tener más sentido según tu momento actual.',
        ],
        [
            'icon' => 'bi bi-chat-square-text',
            'title' => 'Siguiente paso',
            'text' => 'Definimos si vale la pena avanzar a una propuesta, un diagnóstico más detallado o una conversación de seguimiento.',
        ],
    ];

    $contactPoints = [
        [
            'icon' => 'bi bi-telephone-fill',
            'title' => 'Teléfono',
            'text' => $siteSettings->contact_phone,
            'accent' => 'brand',
        ],
        [
            'icon' => 'bi bi-envelope-fill',
            'title' => 'Correo',
            'text' => $siteSettings->contact_email,
            'accent' => 'aqua',
        ],
        [
            'icon' => 'bi bi-person-lines-fill',
            'title' => 'Tipo de contacto',
            'text' => 'Conversación inicial, diagnóstico o evaluación de una necesidad puntual.',
            'accent' => 'sunset',
        ],
    ];
?>

<?php echo $__env->make('partials.page-hero', [
    'class' => 'page-hero--contact',
    'image' => $siteSettings->contact_hero_image_path,
    'badge' => [
        'icon' => 'bi bi-chat-dots',
        'text' => 'Contacto',
    ],
    'title' => 'Conversemos sobre tu necesidad antes de hablar de una propuesta.',
    'description' => 'Este es el punto de partida para transformar una necesidad en una solución clara, bien orientada y respaldada profesionalmente.',
    'actions' => [
        [
            'href' => '#contacto-formulario',
            'label' => 'Solicitar conversación inicial',
            'icon' => 'bi bi-arrow-down-circle',
            'class' => 'btn btn-warning btn-lg px-5 fw-bold shadow-lg',
        ],
        [
            'href' => $siteSettings->whatsappUrl(),
            'label' => 'Hablar por WhatsApp',
            'icon' => 'bi bi-whatsapp',
            'target' => '_blank',
            'class' => 'btn btn-outline-light btn-lg px-5 fw-semibold',
        ],
    ],
    'highlights' => [
        ['value' => 'Inicial', 'label' => 'Conversación de diagnóstico'],
        ['value' => 'Directa', 'label' => 'Comunicación clara y ejecutiva'],
        ['value' => 'Útil', 'label' => 'Orientada a definir el siguiente paso'],
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section id="contacto-formulario" class="section-surface section-surface--muted py-5">
    <div class="container py-lg-4">
        <div class="section-heading text-center">
            <span class="section-heading__eyebrow">Contacto inicial</span>
            <h2 class="section-heading__title">Una conversación bien planteada ayuda a tomar mejores decisiones</h2>
            <p class="section-heading__text">No buscamos llevarte a una venta agresiva. Buscamos entender tu contexto, identificar si hay encaje y definir una forma razonable de avanzar.</p>
        </div>

        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <div class="contact-strategy-panel">
                    <div class="contact-strategy-panel__header">
                        <span class="section-heading__eyebrow">Qué podemos revisar</span>
                        <h3>En la primera conversación nos enfocamos en claridad, no en presión comercial.</h3>
                    </div>

                    <div class="contact-strategy-panel__topics">
                        <?php $__currentLoopData = $conversationTopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="contact-topic">
                                <div class="contact-topic__icon">
                                    <i class="<?php echo e($topic['icon']); ?>"></i>
                                </div>
                                <div>
                                    <h4><?php echo e($topic['title']); ?></h4>
                                    <p class="mb-0"><?php echo e($topic['text']); ?></p>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="contact-strategy-panel__note">
                        <strong>Sugerencia</strong>
                        <p class="mb-0">Si quieres agilizar la respuesta, cuéntanos brevemente qué necesitas, en qué etapa está el tema y qué te gustaría aclarar en una primera conversación.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="form-panel">
                    <div class="form-panel__header">
                        <span class="section-heading__eyebrow">Formulario breve</span>
                        <h3>Solicita una conversación inicial</h3>
                        <p>Déjanos tus datos y una descripción breve del contexto. Con eso podemos revisar el caso y responderte con mayor criterio.</p>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('contacto.enviar')); ?>" method="POST" class="row g-4">
                        <?php echo csrf_field(); ?>

                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control form-control-lg form-control-soft" placeholder="Ej: Laura Gómez" required>
                        </div>

                        <div class="col-md-6">
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control form-control-lg form-control-soft" placeholder="Ej: laura@empresa.com" required>
                        </div>

                        <div class="col-12">
                            <label for="mensaje" class="form-label">Contexto o necesidad</label>
                            <textarea name="mensaje" class="form-control form-control-soft" rows="5" placeholder="Cuéntanos brevemente qué necesitas, qué problema quieres resolver o qué te gustaría revisar en una conversación inicial." required></textarea>
                        </div>

                        <div class="col-12">
                            <div class="legal-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="acepta_terminos" id="acepta_terminos" required>
                                    <label class="form-check-label" for="acepta_terminos">
                                        He leído y acepto los
                                        <a href="<?php echo e(route('terminos')); ?>" target="_blank">Términos y Condiciones</a>
                                        y la
                                        <a href="<?php echo e(route('privacidad')); ?>" target="_blank">Política de Privacidad</a>.
                                    </label>
                                </div>

                                <?php $__errorArgs = ['acepta_terminos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback d-block">
                                        Debes aceptar los términos y condiciones para continuar.
                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-wrap gap-3">
                            <button type="submit" class="btn btn-warning btn-lg px-4 fw-bold shadow-lg">
                                <i class="bi bi-send me-2"></i>Enviar solicitud
                            </button>
                            <a href="<?php echo e($siteSettings->whatsappUrl()); ?>" target="_blank" class="btn btn-outline-primary btn-lg px-4 fw-semibold">
                                <i class="bi bi-whatsapp me-2"></i>WhatsApp
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-2">
            <?php $__currentLoopData = $contactPoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    <article class="info-card info-card--executive h-100">
                        <div class="premium-card__icon premium-card__icon--<?php echo e($point['accent']); ?>">
                            <i class="<?php echo e($point['icon']); ?>"></i>
                        </div>
                        <div>
                            <h3><?php echo e($point['title']); ?></h3>
                            <p class="mb-0"><?php echo e($point['text']); ?></p>
                        </div>
                    </article>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Perfumeria\resources\views/contacto.blade.php ENDPATH**/ ?>