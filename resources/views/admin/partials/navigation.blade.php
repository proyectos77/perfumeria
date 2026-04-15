<div class="admin-switcher d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start mb-4">
    <a href="{{ route('admin.contactos') }}" class="btn {{ request()->routeIs('admin.contactos') ? 'btn-primary' : 'btn-outline-primary' }} fw-semibold px-4">
        <i class="bi bi-grid-1x2-fill me-2"></i>Dashboard
    </a>
    <a href="{{ route('admin.contactos.listado') }}" class="btn {{ request()->routeIs('admin.contactos.listado') ? 'btn-primary' : 'btn-outline-primary' }} fw-semibold px-4">
        <i class="bi bi-envelope-paper me-2"></i>Ver listado
    </a>
    <a href="{{ route('admin.testimonios') }}" class="btn {{ request()->routeIs('admin.testimonios') ? 'btn-primary' : 'btn-outline-primary' }} fw-semibold px-4">
        <i class="bi bi-chat-square-quote me-2"></i>Ver comentarios
    </a>
    <a href="{{ route('admin.social-posts.index') }}" class="btn {{ request()->routeIs('admin.social-posts.*') ? 'btn-primary' : 'btn-outline-primary' }} fw-semibold px-4">
        <i class="bi bi-share-fill me-2"></i>Publicaciones
    </a>
    <a href="{{ route('admin.social-templates.index') }}" class="btn {{ request()->routeIs('admin.social-templates.*') ? 'btn-primary' : 'btn-outline-primary' }} fw-semibold px-4">
        <i class="bi bi-palette-fill me-2"></i>Disenos
    </a>
    <a href="{{ route('admin.social-connections.index') }}" class="btn {{ request()->routeIs('admin.social-connections.*') ? 'btn-primary' : 'btn-outline-primary' }} fw-semibold px-4">
        <i class="bi bi-diagram-3-fill me-2"></i>Conexiones
    </a>
</div>
