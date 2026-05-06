<footer class="site-footer">
    <div class="container">
        <div class="site-footer__panel">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-4">
                    <div class="site-footer__brand">
                        <span class="site-footer__eyebrow"><?php echo e($siteSettings->site_name); ?></span>

                        <div class="site-footer__logo-group">
                            <img src="<?php echo e($siteSettings->assetUrl($siteSettings->logo_path)); ?>" alt="Logo de <?php echo e($siteSettings->site_name); ?>" class="site-footer__logo">
                            <div>
                                <h2><?php echo e($siteSettings->site_name); ?></h2>
                                <p><?php echo e($siteSettings->site_tagline); ?></p>
                            </div>
                        </div>

                        <p class="site-footer__summary">
                            <?php echo e($siteSettings->site_summary); ?>

                        </p>

                        <div class="site-footer__actions">
                            <a href="<?php echo e(route('contacto')); ?>" class="btn btn-warning btn-lg px-4 fw-bold">
                                <i class="bi bi-chat-dots me-2"></i>Solicitar diagnóstico
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="site-footer__block">
                        <h3>Navegación</h3>
                        <div class="site-footer__stack">
                            <a href="<?php echo e(route('servicios')); ?>" class="site-footer__essential-link">
                                <span class="site-footer__contact-icon"><i class="bi bi-grid"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>Servicios</strong>
                                </span>
                            </a>

                            <a href="<?php echo e(route('quienessomos')); ?>" class="site-footer__essential-link">
                                <span class="site-footer__contact-icon"><i class="bi bi-buildings"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>Quiénes somos</strong>
                                </span>
                            </a>

                            <a href="<?php echo e(route('contacto')); ?>" class="site-footer__essential-link">
                                <span class="site-footer__contact-icon"><i class="bi bi-chat-dots-fill"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>Formulario de contacto</strong>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="site-footer__block">
                        <h3>Contacto directo</h3>
                        <div class="site-footer__contact-list">
                            <a href="<?php echo e($siteSettings->telUrl()); ?>" class="site-footer__contact-item">
                                <span class="site-footer__contact-icon"><i class="bi bi-telephone-fill"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>Teléfono</strong>
                                    <small><?php echo e($siteSettings->contact_phone); ?></small>
                                </span>
                            </a>

                            <a href="mailto:<?php echo e($siteSettings->contact_email); ?>" class="site-footer__contact-item">
                                <span class="site-footer__contact-icon"><i class="bi bi-envelope-fill"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>Correo</strong>
                                    <small><?php echo e($siteSettings->contact_email); ?></small>
                                </span>
                            </a>

                            <a href="<?php echo e($siteSettings->whatsappUrl()); ?>" target="_blank" rel="noopener" class="site-footer__contact-item">
                                <span class="site-footer__contact-icon"><i class="bi bi-whatsapp"></i></span>
                                <span class="site-footer__item-copy">
                                    <strong>WhatsApp</strong>
                                    <small>Escríbenos directamente</small>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-footer__prebottom">
                <span class="site-footer__social-label">Redes sociales</span>
                <div class="site-footer__social">
                    <?php $__empty_1 = true; $__currentLoopData = $siteSettings->socialLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e($socialLink['url']); ?>" target="_blank" rel="noopener" aria-label="<?php echo e($socialLink['label']); ?> de <?php echo e($siteSettings->site_name); ?>">
                            <i class="<?php echo e($socialLink['icon']); ?>"></i>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <span class="text-white-50 small">Actualiza tus redes desde administración.</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="site-footer__bottom">
            <p>&copy; <?php echo e(date('Y')); ?> <?php echo e($siteSettings->site_name); ?>. Todos los derechos reservados.</p>
            <div class="site-footer__bottom-links">
                <a href="<?php echo e(route('privacidad')); ?>">Privacidad</a>
                <a href="<?php echo e(route('terminos')); ?>">Términos</a>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\laragon\www\Perfumeria\resources\views/layouts/footer.blade.php ENDPATH**/ ?>