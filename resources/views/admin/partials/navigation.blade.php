<div class="admin-switcher d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start mb-4">
    <a href="{{ route('admin.categorias.index') }}" class="btn {{ request()->routeIs('admin.categorias.*') ? 'btn-primary' : 'btn-outline-primary' }} fw-semibold px-4">
        <i class="bi bi-tags-fill me-2"></i>Categorias
    </a>
    <a href="{{ route('admin.productos.index') }}" class="btn {{ request()->routeIs('admin.productos.*') ? 'btn-primary' : 'btn-outline-primary' }} fw-semibold px-4">
        <i class="bi bi-bag-heart-fill me-2"></i>Productos
    </a>
    <a href="{{ route('admin.productos.bulk') }}" class="btn {{ request()->routeIs('admin.productos.bulk') ? 'btn-primary' : 'btn-outline-primary' }} fw-semibold px-4">
        <i class="bi bi-images me-2"></i>Carga masiva
    </a>
    <a href="{{ route('admin.pedidos.index') }}" class="btn {{ request()->routeIs('admin.pedidos.*') ? 'btn-primary' : 'btn-outline-primary' }} fw-semibold px-4">
        <i class="bi bi-receipt-cutoff me-2"></i>Pedidos
    </a>
</div>
