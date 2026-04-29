@php
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
@endphp

<header class="site-header" role="banner" data-site-header>
    <nav class="navbar navbar-expand-lg navbar-dark site-navbar" role="navigation" aria-label="Menú principal del sitio">
        <div class="container-xl site-navbar__shell">
            <a class="navbar-brand site-navbar__brand d-flex align-items-center gap-3" href="{{ route('home') }}">
                <img
                    src="{{ $siteSettings->assetUrl($siteSettings->logo_path) }}"
                    alt="Logo de {{ $siteSettings->site_name }}"
                    height="64"
                    class="site-navbar__logo"
                >
                <div class="site-navbar__brand-copy d-flex flex-column text-white">
                    <span class="site-navbar__brand-name">{{ $siteSettings->site_name }}</span>
                    <small class="site-navbar__tagline">{{ $siteSettings->site_tagline }}</small>
                </div>
            </a>

            <button class="navbar-toggler site-navbar__toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Abrir menú principal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse site-navbar__collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 site-navbar__menu">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ $isAdminRoute ? 'active' : '' }}" href="{{ route('admin.contactos') }}"{{ $isAdminRoute ? ' aria-current=page' : '' }}>
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

                        @if($link['route'] === 'home')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-semibold {{ $isServicesRoute ? 'active' : '' }}"
                                   href="#"
                                   id="navbarServicios"
                                   role="button"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false"{{ $isServicesRoute ? ' aria-current=page' : '' }}>
                                    Servicios
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end animate__animated animate__fadeIn" aria-labelledby="navbarServicios">
                                    @foreach($serviceLinks as $serviceLink)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('servicios') }}#{{ $serviceLink['fragment'] }}">
                                                {{ $serviceLink['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <div class="site-navbar__actions ms-lg-4">
                    @auth
                        @php
                            $nuevos = \App\Models\Contacto::whereDate('created_at', \Carbon\Carbon::today())->count();
                        @endphp

                        <ul class="navbar-nav align-items-lg-center flex-row site-navbar__auth">
                            <li class="nav-item">
                                <div class="site-navbar__notification position-relative" role="button" aria-label="Notificaciones nuevas">
                                    <i class="bi bi-bell text-white"></i>
                                    @if($nuevos > 0)
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" aria-label="{{ $nuevos }} notificaciones nuevas">
                                            {{ $nuevos }}
                                        </span>
                                    @endif
                                </div>
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
                            <i class="bi bi-bag-heart me-2"></i>Ver perfumes
                        </a>
                    @endunless
                </div>
            </div>
        </div>
    </nav>
</header>
