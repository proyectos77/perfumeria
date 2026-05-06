<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($siteSettings->site_name); ?> - Soluciones digitales, gestión documental y acompañamiento tecnológico</title>
    <meta name="description" content="<?php echo e($siteSettings->site_summary); ?>">
    <meta name="keywords" content="soluciones digitales, gestión documental, SGDEA, automatización, proyectos tecnológicos, firma tecnológica">
    <meta name="author" content="<?php echo e($siteSettings->site_name); ?>">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="<?php echo e($siteSettings->site_name); ?>">
    <meta property="og:description" content="<?php echo e($siteSettings->site_summary); ?>">
    <meta property="og:image" content="<?php echo e($siteSettings->assetUrl($siteSettings->logo_path)); ?>">
    <meta property="og:url" content="<?php echo e(url('/')); ?>">
    <meta property="og:type" content="website">

    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>?v=<?php echo e(time()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/site-public-pages.css')); ?>?v=<?php echo e(time()); ?>">
</head>
<?php
    $heroHeaderRoutes = ['home', 'contacto', 'servicios', 'quienessomos', 'terminos', 'privacidad'];
    $usesHeroHeader = request()->routeIs(...$heroHeaderRoutes);
?>
<body class="<?php echo $__env->yieldContent('body_class', 'bg-light'); ?> <?php echo e($usesHeroHeader ? 'site-body--hero' : 'site-body--plain'); ?>">
    <div id="cookie-banner" class="site-cookie-banner" style="display: none;">
        <div class="container site-cookie-banner__inner">
            <p class="site-cookie-banner__text mb-0">
                Usamos cookies para mejorar tu experiencia. Al continuar, aceptas nuestra
                <a href="<?php echo e(route('terminos')); ?>">política de privacidad y términos</a>.
            </p>
            <button id="aceptar-cookies" class="btn btn-outline-light btn-sm site-cookie-banner__button">Aceptar</button>
        </div>
    </div>

    <div class="site-shell min-vh-100">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if(isset($header)): ?>
            <header class="site-subheader">
                <div class="container py-4 site-subheader__inner">
                    <?php echo e($header); ?>

                </div>
            </header>
        <?php endif; ?>

        <main class="<?php echo $__env->yieldContent('main_class', 'site-main'); ?>">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <a href="<?php echo e($siteSettings->whatsappUrl()); ?>"
       target="_blank"
       class="site-float-action site-float-action--whatsapp"
       data-bs-toggle="tooltip"
       title="Escríbenos por WhatsApp"
       aria-label="Escríbenos por WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const banner = document.getElementById("cookie-banner");
            const botonAceptar = document.getElementById("aceptar-cookies");
            const siteHeader = document.querySelector("[data-site-header]");

            if (banner && !localStorage.getItem("cookies_aceptadas")) {
                banner.style.display = "block";
            }

            if (botonAceptar) {
                botonAceptar.addEventListener("click", function () {
                    localStorage.setItem("cookies_aceptadas", true);
                    banner.style.display = "none";
                });
            }

            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            if (siteHeader) {
                const syncHeaderState = function () {
                    siteHeader.classList.toggle("is-scrolled", window.scrollY > 18);
                };

                syncHeaderState();
                window.addEventListener("scroll", syncHeaderState, { passive: true });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\Perfumeria\resources\views/layouts/app.blade.php ENDPATH**/ ?>