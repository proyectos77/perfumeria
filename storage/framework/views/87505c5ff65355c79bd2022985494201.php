<?php
    $serviceLinks = [
        ['label' => 'Gestión de proyectos', 'fragment' => 'gestion-proyectos-tecnologicos'],
        ['label' => 'Soluciones y automatización', 'fragment' => 'soluciones-digitales-automatizacion'],
        ['label' => 'Gestión documental', 'fragment' => 'gestion-documental'],
        ['label' => 'Implementación SGDEA', 'fragment' => 'implementacion-sgdea-crear-system'],
        ['label' => 'Acompañamiento y soporte', 'fragment' => 'acompanamiento-soporte'],
    ];

    $primaryLinks = [
        ['label' => 'Inicio', 'route' => 'home'],
        ['label' => 'Catalogo', 'route' => 'catalogo.index'],
        ['label' => 'Contacto', 'route' => 'contacto'],
        ['label' => 'Quiénes somos', 'route' => 'quienessomos'],
    ];

    $isAdminRoute = request()->routeIs('admin.*', 'dashboard');
    $isServicesRoute = request()->routeIs('servicios');
?>

<header class="site-header" role="banner" data-site-header>
    <nav class="navbar navbar-expand-lg navbar-dark site-navbar" role="navigation" aria-label="Menú principal del sitio">
        <div class="container-xl site-navbar__shell">
            <a class="navbar-brand site-navbar__brand d-flex align-items-center gap-3" href="<?php echo e(route('home')); ?>">
                <img
                    src="<?php echo e($siteSettings->assetUrl($siteSettings->logo_path)); ?>"
                    alt="Logo de <?php echo e($siteSettings->site_name); ?>"
                    height="64"
                    class="site-navbar__logo"
                >
                <div class="site-navbar__brand-copy d-flex flex-column text-white">
                    <span class="site-navbar__brand-name"><?php echo e($siteSettings->site_name); ?></span>
                    <small class="site-navbar__tagline"><?php echo e($siteSettings->site_tagline); ?></small>
                </div>
            </a>

            <button class="navbar-toggler site-navbar__toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Abrir menú principal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse site-navbar__collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 site-navbar__menu">
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e($isAdminRoute ? 'active' : ''); ?>" href="<?php echo e(route('admin.contactos')); ?>"<?php echo e($isAdminRoute ? ' aria-current=page' : ''); ?>>
                                <strong>Panel</strong>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php $__currentLoopData = $primaryLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $isCurrent = request()->routeIs($link['route']);
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e($isCurrent ? 'active' : ''); ?>" href="<?php echo e(route($link['route'])); ?>"<?php echo e($isCurrent ? ' aria-current=page' : ''); ?>>
                                <strong><?php echo e($link['label']); ?></strong>
                            </a>
                        </li>

                        <?php if($link['route'] === 'home'): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-semibold <?php echo e($isServicesRoute ? 'active' : ''); ?>"
                                   href="#"
                                   id="navbarServicios"
                                   role="button"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false"<?php echo e($isServicesRoute ? ' aria-current=page' : ''); ?>>
                                    Servicios
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end animate__animated animate__fadeIn" aria-labelledby="navbarServicios">
                                    <?php $__currentLoopData = $serviceLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo e(route('servicios')); ?>#<?php echo e($serviceLink['fragment']); ?>">
                                                <?php echo e($serviceLink['label']); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <div class="site-navbar__actions ms-lg-4">
                    <?php if(auth()->guard()->check()): ?>
                        <?php
                            $nuevos = \App\Models\Contacto::whereDate('created_at', \Carbon\Carbon::today())->count();
                        ?>

                        <ul class="navbar-nav align-items-lg-center flex-row site-navbar__auth">
                            <li class="nav-item">
                                <div class="site-navbar__notification position-relative" role="button" aria-label="Notificaciones nuevas">
                                    <i class="bi bi-bell text-white"></i>
                                    <?php if($nuevos > 0): ?>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" aria-label="<?php echo e($nuevos); ?> notificaciones nuevas">
                                            <?php echo e($nuevos); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?>

                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="usuarioDropdown">
                                    <li><a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">Perfil</a></li>
                                    <li>
                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php endif; ?>

                    <?php if (! ($isAdminRoute)): ?>
                        <a href="<?php echo e(route('catalogo.index')); ?>" class="btn btn-warning site-navbar__cta">
                            <i class="bi bi-bag-heart me-2"></i>Ver perfumes
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<?php /**PATH C:\laragon\www\Perfumeria\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>