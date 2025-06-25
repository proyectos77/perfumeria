<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: linear-gradient(to right, #001f4d, #26c6da);">>
    <div class="container-fluid">
        <!-- Logo + Marca -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-crear-system-4.png') }}" alt="Logo Crear System" height="65" class="me-2">
            <span class="fw-bold text-white">Crear System</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Dropdown Servicios -->
                  <!-- Contacto -->
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                       <strong>Inicio</strong> 
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" id="navbarServicios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Servicios
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end animate__animated animate__fadeIn" style="background-color: #002855;">
                        <li><a class="dropdown-item text-white" href="{{ route('servicios') }}#web">Desarrollo Web</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('servicios') }}#movil">Aplicaciones Móviles</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('servicios') }}#mantenimiento">Mantenimiento</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('servicios') }}#consultoria">Consultoría TI</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('servicios') }}#personalizado">Desarrollo a Medida</a></li>
                    </ul>
                </li>

                <!-- Contacto -->
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">
                        <strong>Contacto</strong>
                    </a>
                </li>

                 <!-- Contacto -->
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">
                       <strong> Quienes somos</strong>
                    </a>
                </li>

                 <!-- Contacto -->
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">
                        <strong>Portafolio</strong>
                    </a>
                </li>

                 
            </ul>


            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                    @php
                        $nuevos = \App\Models\Contacto::whereDate('created_at', \Carbon\Carbon::today())->count();
                    @endphp
                    <li class="nav-item me-3">
                        <div class="position-relative">
                            <i class="bi bi-bell text-white" style="font-size: 1.5rem;"></i>
                            @if($nuevos > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $nuevos }}
                                </span>
                            @endif
                        </div>
                    </li>
                @endauth

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="usuarioDropdown" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                   <!-- @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                    @endguest -->
                @endauth
            </ul>
        </div>
    </div>
</nav>
