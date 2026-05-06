@php
    $primaryLinks = [
        ['label' => 'Inicio', 'route' => 'home'],
        ['label' => 'Catálogo', 'route' => 'catalogo.index'],
        ['label' => 'Quiénes Somos', 'route' => 'quienes-somos'],
        ['label' => 'Contacto', 'route' => 'contacto'],
    ];

    $isAdminRoute = request()->routeIs('admin.*', 'dashboard');
    $pedidosNuevos = auth()->check()
        ? \App\Models\Pedido::query()->whereNull('visto_admin_at')->count()
        : 0;
    $ultimosPedidos = auth()->check()
        ? \App\Models\Pedido::query()->latest()->take(5)->get()
        : collect();
@endphp

<header class="site-header" role="banner" data-site-header>
    <nav class="navbar navbar-expand-lg site-navbar" role="navigation" aria-label="Menu principal del sitio">
        <div class="container-xl site-navbar__shell">
            <a class="navbar-brand site-navbar__brand d-flex align-items-center gap-3" href="{{ route('home') }}">
                <span class="site-navbar__logo-frame">
                    <img src="{{ asset('images/logo-pagina.png') }}" alt="Logo de PERFUMERY J & P" class="site-navbar__logo">
                </span>
                <div class="site-navbar__brand-copy d-flex flex-column">
                    <span class="site-navbar__brand-name">PERFUMERY J &amp; P</span>
                    <small class="site-navbar__tagline">Fragancias seleccionadas</small>
                </div>
            </a>

            <button class="navbar-toggler site-navbar__toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Abrir menu principal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse site-navbar__collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 site-navbar__menu">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ $isAdminRoute ? 'active' : '' }}" href="{{ route('admin.productos.index') }}"{{ $isAdminRoute ? ' aria-current=page' : '' }}>
                                <strong>Panel</strong>
                            </a>
                        </li>
                    @endauth

                    @foreach($primaryLinks as $link)
                        @php
                            $isCurrent = request()->routeIs($link['route']);
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link {{ $isCurrent ? 'active' : '' }}" href="{{ route($link['route']) }}"{{ $isCurrent ? ' aria-current=page' : '' }}>
                                <strong>{{ $link['label'] }}</strong>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="site-navbar__actions ms-lg-4">
                    @auth
                        <ul class="navbar-nav align-items-lg-center flex-row site-navbar__auth">
                            <li class="nav-item dropdown me-2">
                                <a class="nav-link position-relative" href="#" id="pedidoBellDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Pedidos nuevos">
                                    <i class="bi bi-bell-fill"></i>
                                    @if($pedidosNuevos > 0)
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                            {{ $pedidosNuevos }}
                                        </span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end order-bell-menu" aria-labelledby="pedidoBellDropdown">
                                    <li class="dropdown-header">Pedidos recientes</li>
                                    @forelse($ultimosPedidos as $pedidoNav)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.pedidos.show', $pedidoNav) }}">
                                                <strong>#{{ $pedidoNav->id }}</strong>
                                                <span>{{ $pedidoNav->nombreCompleto() ?: 'Cliente pendiente' }}</span>
                                                <small>{{ $pedidoNav->estadoLabel() }}</small>
                                            </a>
                                        </li>
                                    @empty
                                        <li><span class="dropdown-item-text text-muted">Sin pedidos aun</span></li>
                                    @endforelse
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item fw-bold" href="{{ route('admin.pedidos.index') }}">Ver todos los pedidos</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="usuarioDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endauth

                    @unless($isAdminRoute)
                        <a href="{{ route('catalogo.index') }}" class="btn btn-warning site-navbar__cta">
                            <i class="bi bi-bag-heart me-2"></i>Comprar
                        </a>
                    @endunless
                </div>
            </div>
        </div>
    </nav>
</header>
