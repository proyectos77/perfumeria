<header role="banner">
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top"
         style="background: linear-gradient(to right, #001f4d, #26c6da);"
         role="navigation"
         aria-label="Menú principal del sitio">
        <div class="container-fluid">

            <!-- Logo + Marca -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-crear-system-4.png') }}" alt="Logo de Crear System" height="65" class="me-2">
                <span class="fw-bold text-white">Crear System</span>
            </a>

            <!-- Botón para móviles con descripción accesible -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Mostrar navegación">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú colapsable -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!-- Navegación principal izquierda -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.contactos') ? 'active' : '' }}"
                               href="{{ route('admin.contactos') }}">
                                <strong>Panel</strong>
                            </a>
                        </li>
                    @endauth

                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <strong>Inicio</strong>
                        </a>
                    </li>

                    <!-- Dropdown Servicios -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-semibold"
                           href="#"
                           id="navbarServicios"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                           aria-haspopup="true">
                            Servicios
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end animate__animated animate__fadeIn"
                            aria-labelledby="navbarServicios"
                            style="background-color: #002855;">
                            <li><a class="dropdown-item text-white" href="{{ route('servicios') }}#web">Desarrollo Web</a></li>
                            <li><a class="dropdown-item text-white" href="{{ route('servicios') }}#movil">Aplicaciones Móviles</a></li>
                            <li><a class="dropdown-item text-white" href="{{ route('servicios') }}#mantenimiento">Mantenimiento</a></li>
                            <li><a class="dropdown-item text-white" href="{{ route('servicios') }}#consultoria">Consultoría TI</a></li>
                            <li><a class="dropdown-item text-white" href="{{ route('servicios') }}#personalizado">Desarrollo a Medida</a></li>
                        </ul>
                    </li>

                    <!-- Otras secciones -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">
                            <strong>Contacto</strong>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <strong>Quiénes somos</strong>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <strong>Portafolio</strong>
                        </a>
                    </li>
                </ul>

                <!-- Navegación derecha -->
                <ul class="navbar-nav ms-auto align-items-center">

                    @auth
                        @php
                            $nuevos = \App\Models\Contacto::whereDate('created_at', \Carbon\Carbon::today())->count();
                        @endphp
                        <!-- Notificaciones -->
                        <li class="nav-item me-3">
                            <div class="position-relative" role="button" aria-label="Notificaciones nuevas">
                                <i class="bi bi-bell text-white" style="font-size: 1.5rem;"></i>
                                @if($nuevos > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" aria-label="{{ $nuevos }} notificaciones nuevas">
                                        {{ $nuevos }}
                                    </span>
                                @endif
                            </div>
                        </li>

                        <!-- Menú del usuario autenticado -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white"
                               href="#"
                               id="usuarioDropdown"
                               role="button"
                               data-bs-toggle="dropdown"
                               aria-expanded="false">
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
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>
