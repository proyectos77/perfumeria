<header class="site-header" role="banner" data-site-header>
    <nav class="navbar navbar-expand-lg navbar-dark site-navbar" role="navigation" aria-label="Menu principal del sitio">
        <div class="container-xl site-navbar__shell">
            <a class="navbar-brand site-navbar__brand d-flex align-items-center gap-3" href="{{ route('home') }}">
                <img
                    src="{{ asset('images/logo-crear-system-4.png') }}"
                    alt="Logo de Crear System"
                    height="64"
                    class="site-navbar__logo"
                >
                <div class="site-navbar__brand-copy d-flex flex-column text-white">
                    <span class="site-navbar__brand-name">Crear System</span>
                    <small class="site-navbar__tagline">Desarrollo web, software y automatizacion para hacer crecer tu negocio</small>
                </div>
            </a>

            <button class="navbar-toggler site-navbar__toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Abrir menu principal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse site-navbar__collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 site-navbar__menu">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}" href="{{ route('admin.contactos') }}">
                                <strong>Panel</strong>
                            </a>
                        </li>
                    @endauth

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <strong>Inicio</strong>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold {{ request()->routeIs('servicios') ? 'active' : '' }}"
                           href="#"
                           id="navbarServicios"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Servicios
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end animate__animated animate__fadeIn" aria-labelledby="navbarServicios">
                            <li><a class="dropdown-item" href="{{ route('servicios') }}#desarrollo-web">Desarrollo web</a></li>
                            <li><a class="dropdown-item" href="{{ route('servicios') }}#mantenimiento-software">Mantenimiento</a></li>
                            <li><a class="dropdown-item" href="{{ route('servicios') }}#consultoria-ti">Consultoria TI</a></li>
                            <li><a class="dropdown-item" href="{{ route('servicios') }}#software-medida">Software a medida</a></li>
                            <li><a class="dropdown-item" href="{{ route('servicios') }}#integraciones-api">Integraciones API</a></li>
                            <li><a class="dropdown-item" href="{{ route('servicios') }}#automatizacion-procesos">Automatizacion</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">
                            <strong>Contacto</strong>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('quienessomos') ? 'active' : '' }}" href="{{ route('quienessomos') }}">
                            <strong>Quienes somos</strong>
                        </a>
                    </li>
                </ul>

                <div class="site-navbar__actions ms-lg-4">
                    @auth
                        <ul class="navbar-nav align-items-lg-center flex-row site-navbar__auth">
                            @php
                                $nuevos = \App\Models\Contacto::whereDate('created_at', \Carbon\Carbon::today())->count();
                            @endphp

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
                                            <button type="submit" class="dropdown-item">Cerrar sesion</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endauth

                    @unless(request()->routeIs('admin.*', 'dashboard'))
                        <a href="{{ route('contacto') }}" class="btn btn-warning site-navbar__cta">
                            <i class="bi bi-chat-dots me-2"></i>Solicitar asesoria
                        </a>
                    @endunless
                </div>
            </div>
        </div>
    </nav>
</header>
