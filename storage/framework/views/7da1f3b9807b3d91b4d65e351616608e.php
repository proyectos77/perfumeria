<?php
    $heroImage = $image ?? 'images/home/imagen-home1.png';
    $heroImageUrl = isset($siteSettings) ? $siteSettings->assetUrl($heroImage) : asset($heroImage);
    $heroBadge = $badge ?? null;
    $heroTitle = $title ?? '';
    $heroDescription = $description ?? '';
    $heroActions = $actions ?? [];
    $heroHighlights = $highlights ?? [];
    $heroClass = $class ?? '';
?>

<header class="page-hero <?php echo e($heroClass); ?>">
    <div class="page-hero__media" style="background-image: url('<?php echo e($heroImageUrl); ?>');"></div>
    <div class="page-hero__overlay"></div>
    <div class="page-hero__ornament page-hero__ornament--top"></div>
    <div class="page-hero__ornament page-hero__ornament--bottom"></div>

    <div class="container page-hero__container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9 text-center">
                <?php if($heroBadge): ?>
                    <div class="page-hero__badge badge bg-warning text-dark px-4 py-2 mb-4 fw-semibold animate__animated animate__fadeInDown">
                        <?php if(!empty($heroBadge['icon'])): ?>
                            <i class="<?php echo e($heroBadge['icon']); ?> me-2"></i>
                        <?php endif; ?>
                        <?php echo e($heroBadge['text'] ?? ''); ?>

                    </div>
                <?php endif; ?>

                <h1 class="page-hero__title display-3 fw-bold text-white mb-4 animate__animated animate__fadeInUp">
                    <?php echo $heroTitle; ?>

                </h1>

                <?php if($heroDescription): ?>
                    <p class="page-hero__description lead fs-4 text-white-50 mb-5 animate__animated animate__fadeInUp animate__delay-1s">
                        <?php echo e($heroDescription); ?>

                    </p>
                <?php endif; ?>

                <?php if(!empty($heroActions)): ?>
                    <div class="d-flex flex-wrap justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-2s">
                        <?php $__currentLoopData = $heroActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a
                                href="<?php echo e($action['href']); ?>"
                                class="<?php echo e($action['class'] ?? 'btn btn-warning btn-lg px-5 fw-bold shadow-lg'); ?>"<?php echo e(!empty($action['target']) ? ' target=' . '"' . $action['target'] . '"' : ''); ?>

                            >
                                <?php if(!empty($action['icon'])): ?>
                                    <i class="<?php echo e($action['icon']); ?> me-2"></i>
                                <?php endif; ?>
                                <?php echo e($action['label']); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <?php if(!empty($heroHighlights)): ?>
                    <div class="page-hero__highlights d-flex flex-wrap justify-content-center gap-4 gap-lg-5 mt-5 animate__animated animate__fadeInUp animate__delay-3s">
                        <?php $__currentLoopData = $heroHighlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="page-hero__highlight">
                                <span class="display-6 fw-bold text-warning"><?php echo e($highlight['value']); ?></span>
                                <p class="text-white-50 mb-0 small"><?php echo e($highlight['label']); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="page-hero__wave">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path fill="#ffffff" d="M0,64 C288,120 576,0 864,64 C1152,128 1440,32 1440,32 L1440,120 L0,120 Z"></path>
        </svg>
    </div>
</header>
<?php /**PATH C:\laragon\www\Perfumeria\resources\views/partials/page-hero.blade.php ENDPATH**/ ?>