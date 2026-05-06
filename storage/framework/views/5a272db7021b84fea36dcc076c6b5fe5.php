<?php $__env->startSection('body_class', 'perfume-body'); ?>

<?php $__env->startSection('content'); ?>
<section class="perfume-hero">
    <div class="container">
        <div class="row align-items-end g-4">
            <div class="col-lg-7">
                <span class="perfume-eyebrow">Perfumeria online</span>
                <h1>Fragancias seleccionadas para cada momento.</h1>
                <p>Explora el catalogo, revisa stock disponible y solicita tu pedido de forma sencilla.</p>
            </div>
            <div class="col-lg-5">
                <form method="GET" action="<?php echo e(route('catalogo.index')); ?>" class="perfume-filter">
                    <label class="form-label">Filtrar por categoria</label>
                    <div class="d-flex gap-2">
                        <select name="categoria" class="form-select">
                            <option value="">Todas</option>
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categoria->id); ?>" <?php if($categoriaActual === $categoria->id): echo 'selected'; endif; ?>><?php echo e($categoria->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button class="btn btn-dark px-4">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <?php if(session('error')): ?>
            <div class="alert alert-danger border-0 shadow-sm rounded-4"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <div class="row g-4">
            <?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-6 col-xl-4">
                    <article class="perfume-card h-100">
                        <a href="<?php echo e(route('catalogo.show', $producto)); ?>" class="perfume-card__image">
                            <img src="<?php echo e($producto->imagenUrl()); ?>" alt="<?php echo e($producto->nombre); ?>">
                        </a>
                        <div class="perfume-card__body">
                            <span><?php echo e($producto->categoria->nombre); ?></span>
                            <h2><?php echo e($producto->nombre); ?></h2>
                            <p><?php echo e(Str::limit($producto->descripcion, 105)); ?></p>
                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <strong>$<?php echo e(number_format($producto->precio, 2)); ?></strong>
                                <small class="<?php echo e($producto->stock > 0 ? 'text-success' : 'text-danger'); ?>">
                                    <?php echo e($producto->stock > 0 ? $producto->stock . ' disponibles' : 'Sin stock'); ?>

                                </small>
                            </div>
                            <a href="<?php echo e(route('catalogo.show', $producto)); ?>" class="btn btn-outline-dark rounded-pill w-100 mt-3">Ver detalle</a>
                        </div>
                    </article>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <div class="text-center py-5 text-muted">Aun no hay perfumes disponibles en el catalogo.</div>
                </div>
            <?php endif; ?>
        </div>

        <?php if($productos->hasPages()): ?>
            <div class="mt-5"><?php echo e($productos->links('pagination::bootstrap-5')); ?></div>
        <?php endif; ?>
    </div>
</section>

<?php echo $__env->make('catalogo.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Perfumeria\resources\views/catalogo/index.blade.php ENDPATH**/ ?>