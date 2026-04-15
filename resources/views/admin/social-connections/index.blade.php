@extends('layouts.app')

@section('content')
<section class="social-connections-page py-5">
    <div class="container-fluid social-connections-shell px-3 px-lg-4 px-xxl-5">
        <div class="social-connections-header mb-4">
            <div>
                <span class="social-connections-header__eyebrow">Conexiones</span>
                <h1 class="social-connections-header__title">Redes activas, conexiones y publicacion</h1>
                <p class="social-connections-header__text">
                    Aqui defines que redes quieres usar desde el panel, conectas cuentas reales y dejas lista la base para publicar desde tu sistema.
                </p>
            </div>
        </div>

        @include('admin.partials.navigation')

        @if (session('success'))
            <div class="alert social-connections-alert social-connections-alert--success mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert social-connections-alert social-connections-alert--error mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="connection-activation-card mb-4">
            <div class="connection-activation-card__head">
                <div>
                    <span class="connection-pill">Redes activas</span>
                    <h2>Elige que redes quieres usar desde el panel</h2>
                    <p>
                        Activa solo las redes que te interesan. Estas opciones luego apareceran en Disenos y Publicaciones para trabajar con un flujo mas limpio.
                    </p>
                </div>
            </div>

            <form action="{{ route('admin.social-connections.preferences') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="connection-activation-grid">
                    @foreach($platformPreparation as $item)
                        @php
                            $platformKey = strtolower($item['name']);
                            $isEnabled = (bool) optional($platformPreferences->get($platformKey))->is_enabled;
                        @endphp

                        <label class="connection-toggle-card">
                            <div>
                                <strong>{{ $item['name'] }}</strong>
                                <small>{{ $item['family'] }}</small>
                            </div>

                            <div class="connection-toggle-card__meta">
                                <span class="connection-state {{ $isEnabled ? 'connection-state--ready' : 'connection-state--pending' }}">
                                    {{ $isEnabled ? 'Activa' : 'Inactiva' }}
                                </span>
                                <input type="checkbox" name="enabled_platforms[]" value="{{ $platformKey }}" {{ $isEnabled ? 'checked' : '' }}>
                            </div>
                        </label>
                    @endforeach
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">
                        <i class="bi bi-sliders me-2"></i>Guardar redes activas
                    </button>
                </div>
            </form>
        </div>

        <div class="connection-readiness-card mb-4">
            <div class="connection-readiness-card__head">
                <div>
                    <span class="connection-pill">Preparacion general</span>
                    <h2>Redes listas para conectar cuando el proyecto ya este publicado</h2>
                    <p>
                        Esta vista te deja claro que queda preparado desde ahora y que solo faltara completar credenciales y callbacks definitivos cuando el dominio de produccion ya exista.
                    </p>
                </div>
            </div>

            <div class="connection-readiness-grid">
                @foreach($platformPreparation as $item)
                    <article class="connection-readiness-item">
                        <div class="connection-readiness-item__top">
                            <div>
                                <strong>{{ $item['name'] }}</strong>
                                <small>{{ implode(', ', $item['networks']) }}</small>
                            </div>
                            <div class="d-flex flex-column align-items-end gap-2">
                                @php
                                    $platformKey = strtolower($item['name']);
                                    $isEnabled = (bool) optional($platformPreferences->get($platformKey))->is_enabled;
                                @endphp
                                <span class="connection-state {{ $isEnabled ? 'connection-state--ready' : 'connection-state--pending' }}">
                                    {{ $isEnabled ? 'Activa en panel' : 'No activa' }}
                                </span>
                                <span class="connection-state {{ $item['status'] ? 'connection-state--ready' : 'connection-state--pending' }}">
                                    {{ $item['status'] ? 'Configurado' : 'Pendiente' }}
                                </span>
                            </div>
                        </div>

                        <p>{{ $item['description'] }}</p>

                        <div class="connection-code-block connection-code-block--compact">
                            <strong>Redirect previsto</strong>
                            <code>{{ $item['redirect'] }}</code>
                        </div>

                        <div class="connection-record__meta">
                            @foreach($item['keys'] as $envKey)
                                <span class="connection-chip">{{ $envKey }}</span>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="connections-setup-grid mb-4">
            <article class="connection-setup-card">
                <span class="connection-pill">Meta</span>
                <h2>Lo que necesitaras al pasar a produccion</h2>
                <ul class="connection-setup-list">
                    <li>Una cuenta personal de Facebook con acceso al negocio.</li>
                    <li>Una Facebook Page administrada por esa cuenta.</li>
                    <li>Si vas a usar Instagram o Threads, la cuenta debe estar dentro del ecosistema Meta correctamente enlazado.</li>
                    <li>Una app en Meta for Developers con Login for Business o flujo OAuth equivalente.</li>
                    <li>Las credenciales cargadas en `META_APP_ID`, `META_APP_SECRET` y, si aplica, `META_CONFIG_ID`.</li>
                </ul>
                <div class="connection-code-block">
                    <strong>Callback previsto Meta</strong>
                    <code>{{ $metaCallbackUrl }}</code>
                </div>
                <a href="{{ route('admin.social-connections.meta.redirect') }}" class="btn btn-primary rounded-pill px-4 fw-semibold">
                    <i class="bi bi-facebook me-2"></i>Conectar Meta
                </a>
            </article>

            <article class="connection-setup-card">
                <span class="connection-pill">LinkedIn</span>
                <h2>Lo que necesitaras al pasar a produccion</h2>
                <ul class="connection-setup-list">
                    <li>Una app en LinkedIn Developers.</li>
                    <li>Redirect URL registrada exactamente igual a la del dominio final.</li>
                    <li>`LINKEDIN_CLIENT_ID` y `LINKEDIN_CLIENT_SECRET` configurados.</li>
                    <li>Scope `w_member_social` para publicar como miembro.</li>
                    <li>Si luego quieres publicar como empresa, tendras que pasar a permisos de organizacion.</li>
                </ul>
                <div class="connection-code-block">
                    <strong>Callback previsto LinkedIn</strong>
                    <code>{{ $linkedInCallbackUrl }}</code>
                </div>
                <a href="{{ route('admin.social-connections.linkedin.redirect') }}" class="btn btn-primary rounded-pill px-4 fw-semibold">
                    <i class="bi bi-linkedin me-2"></i>Conectar LinkedIn
                </a>
            </article>
        </div>

        <div class="row g-4">
            <div class="col-xl-7">
                <div class="connection-data-card h-100">
                    <div class="connection-data-card__head">
                        <span class="connection-pill">Meta conectada</span>
                        <h3>Cuentas y activos detectados</h3>
                        <p>Este bloque te muestra el usuario conectado y las paginas detectadas para seleccionar cual vas a usar.</p>
                    </div>

                    <div class="connection-data-card__body">
                        @forelse($metaConnections as $connection)
                            <article class="connection-record">
                                <div class="connection-record__top">
                                    <div>
                                        <strong>{{ $connection->account_name ?: 'Cuenta Meta' }}</strong>
                                        <small>{{ $connection->account_email ?: 'Sin correo devuelto por Meta' }}</small>
                                    </div>
                                    <form action="{{ route('admin.social-connections.destroy', $connection) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Eliminar</button>
                                    </form>
                                </div>

                                <div class="connection-record__meta">
                                    <span class="connection-chip">Usuario ID: {{ $connection->provider_user_id }}</span>
                                    <span class="connection-chip">Estado: {{ ucfirst($connection->status) }}</span>
                                    @if($connection->token_expires_at)
                                        <span class="connection-chip">Token: {{ $connection->token_expires_at->format('d M Y H:i') }}</span>
                                    @endif
                                </div>

                                @php
                                    $pages = collect($connection->payload['pages'] ?? []);
                                @endphp

                                <div class="connection-page-list">
                                    @forelse($pages as $page)
                                        <form action="{{ route('admin.social-connections.meta.page', $connection) }}" method="POST" class="connection-page-item">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="page_id" value="{{ $page['id'] }}">

                                            <div>
                                                <strong>{{ $page['name'] ?? 'Pagina sin nombre' }}</strong>
                                                <small>ID {{ $page['id'] ?? 'N/A' }}</small>
                                                <div class="mt-2 text-secondary">
                                                    Instagram:
                                                    {{ $page['instagram_business_account']['username'] ?? 'No enlazada' }}
                                                </div>
                                            </div>

                                            <button type="submit" class="btn {{ $connection->meta_page_id === ($page['id'] ?? null) ? 'btn-success' : 'btn-outline-light' }} btn-sm rounded-pill px-3">
                                                {{ $connection->meta_page_id === ($page['id'] ?? null) ? 'Pagina activa' : 'Usar esta pagina' }}
                                            </button>
                                        </form>
                                    @empty
                                        <div class="connection-empty">
                                            Meta no devolvio paginas. Revisa permisos, rol de administrador de la Page y el enlace con Instagram.
                                        </div>
                                    @endforelse
                                </div>
                            </article>
                        @empty
                            <div class="connection-empty">
                                Aun no hay conexiones Meta registradas en este proyecto.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-xl-5">
                <div class="connection-data-card h-100">
                    <div class="connection-data-card__head">
                        <span class="connection-pill">LinkedIn conectado</span>
                        <h3>Cuentas disponibles</h3>
                        <p>En esta fase dejamos conectada la cuenta del miembro para pruebas de autenticacion y futura publicacion.</p>
                    </div>

                    <div class="connection-data-card__body">
                        @forelse($linkedInConnections as $connection)
                            <article class="connection-record">
                                <div class="connection-record__top">
                                    <div>
                                        <strong>{{ $connection->account_name ?: 'Cuenta LinkedIn' }}</strong>
                                        <small>{{ $connection->account_email ?: 'Sin correo devuelto por LinkedIn' }}</small>
                                    </div>
                                    <form action="{{ route('admin.social-connections.destroy', $connection) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Eliminar</button>
                                    </form>
                                </div>

                                <div class="connection-record__meta">
                                    <span class="connection-chip">Usuario ID: {{ $connection->provider_user_id }}</span>
                                    <span class="connection-chip">Estado: {{ ucfirst($connection->status) }}</span>
                                    @if($connection->token_expires_at)
                                        <span class="connection-chip">Token: {{ $connection->token_expires_at->format('d M Y H:i') }}</span>
                                    @endif
                                </div>
                            </article>
                        @empty
                            <div class="connection-empty">
                                Aun no hay conexiones LinkedIn registradas en este proyecto.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .social-connections-page {
        background:
            radial-gradient(circle at top left, rgba(37, 99, 235, 0.16), transparent 30%),
            radial-gradient(circle at right top, rgba(20, 184, 166, 0.12), transparent 24%),
            linear-gradient(180deg, #060b16 0%, #0a1324 52%, #0b1627 100%);
    }

    .social-connections-shell {
        max-width: 1760px;
    }

    .social-connections-header__eyebrow,
    .connection-pill {
        display: inline-flex;
        padding: 0.42rem 0.9rem;
        border-radius: 999px;
        background: rgba(59, 130, 246, 0.12);
        border: 1px solid rgba(96, 165, 250, 0.16);
        color: #93c5fd;
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .social-connections-header__title {
        margin: 0.85rem 0 0.8rem;
        color: #f8fafc;
        font-size: clamp(2rem, 2.8vw, 3rem);
        font-weight: 900;
        letter-spacing: -0.05em;
    }

    .social-connections-header__text,
    .connection-data-card__head p,
    .connection-record small,
    .connection-page-item small,
    .connection-empty {
        color: #8ea3bd;
        line-height: 1.75;
    }

    .admin-switcher .btn {
        min-width: 180px;
        border-radius: 999px;
    }

    .admin-switcher .btn-outline-primary,
    .admin-switcher .btn-outline-primary:hover {
        color: #dbeafe;
        border-color: rgba(96, 165, 250, 0.18);
        background: rgba(12, 20, 36, 0.8);
    }

    .admin-switcher .btn-primary {
        border-color: transparent;
        background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 50%, #06b6d4 100%);
        box-shadow: 0 18px 30px rgba(29, 78, 216, 0.22);
    }

    .social-connections-alert {
        border-radius: 20px;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.18);
    }

    .social-connections-alert--success {
        border: 1px solid rgba(74, 222, 128, 0.16);
        background: rgba(4, 120, 87, 0.14);
        color: #d1fae5;
    }

    .social-connections-alert--error {
        border: 1px solid rgba(248, 113, 113, 0.14);
        background: rgba(127, 29, 29, 0.18);
        color: #fee2e2;
    }

    .connection-activation-card {
        padding: 1.35rem;
        border: 1px solid rgba(148, 163, 184, 0.12);
        border-radius: 28px;
        background: linear-gradient(180deg, rgba(10, 16, 29, 0.96) 0%, rgba(5, 9, 18, 0.98) 100%);
        box-shadow: 0 24px 65px rgba(0, 0, 0, 0.26);
    }

    .connection-activation-card__head h2 {
        margin: 0.9rem 0 0.75rem;
        color: #f8fafc;
        font-weight: 900;
        letter-spacing: -0.04em;
    }

    .connection-activation-card__head p {
        margin: 0;
        color: #8ea3bd;
        line-height: 1.75;
    }

    .connection-activation-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 1rem;
        margin-top: 1.2rem;
    }

    .connection-toggle-card {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        align-items: center;
        padding: 1rem;
        border-radius: 20px;
        background: rgba(15, 23, 42, 0.74);
        border: 1px solid rgba(148, 163, 184, 0.08);
    }

    .connection-toggle-card strong {
        display: block;
        color: #f8fafc;
        margin-bottom: 0.25rem;
    }

    .connection-toggle-card small {
        color: #94a3b8;
    }

    .connection-toggle-card__meta {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 0.7rem;
    }

    .connection-toggle-card input[type="checkbox"] {
        width: 20px;
        height: 20px;
        accent-color: #2563eb;
    }

    .connections-setup-grid,
    .connection-data-card,
    .connection-readiness-grid {
        display: grid;
        gap: 1.2rem;
    }

    .connections-setup-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .connection-readiness-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .connection-setup-card,
    .connection-data-card,
    .connection-readiness-card,
    .connection-readiness-item {
        border: 1px solid rgba(148, 163, 184, 0.12);
        border-radius: 28px;
        background: linear-gradient(180deg, rgba(10, 16, 29, 0.96) 0%, rgba(5, 9, 18, 0.98) 100%);
        box-shadow: 0 24px 65px rgba(0, 0, 0, 0.26);
    }

    .connection-setup-card,
    .connection-data-card__head,
    .connection-data-card__body,
    .connection-readiness-card,
    .connection-readiness-item {
        padding: 1.35rem;
    }

    .connection-setup-card h2,
    .connection-data-card__head h3,
    .connection-readiness-card__head h2 {
        margin: 0.9rem 0 0.75rem;
        color: #f8fafc;
        font-weight: 900;
        letter-spacing: -0.04em;
    }

    .connection-readiness-card__head p,
    .connection-readiness-item p {
        margin: 0;
        color: #8ea3bd;
        line-height: 1.75;
    }

    .connection-readiness-item__top {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        align-items: flex-start;
        margin-bottom: 0.9rem;
    }

    .connection-readiness-item strong {
        display: block;
        color: #f8fafc;
        margin-bottom: 0.3rem;
    }

    .connection-readiness-item small {
        color: #94a3b8;
    }

    .connection-state {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        padding: 0.38rem 0.8rem;
        font-size: 0.76rem;
        font-weight: 800;
        letter-spacing: 0.03em;
        white-space: nowrap;
    }

    .connection-state--ready {
        background: rgba(34, 197, 94, 0.2);
        color: #bbf7d0;
    }

    .connection-state--pending {
        background: rgba(245, 158, 11, 0.2);
        color: #fde68a;
    }

    .connection-setup-list {
        margin: 0 0 1rem;
        padding-left: 1.2rem;
        color: #cbd5e1;
        line-height: 1.8;
    }

    .connection-code-block {
        display: grid;
        gap: 0.45rem;
        margin-bottom: 1rem;
        padding: 0.95rem 1rem;
        border-radius: 18px;
        background: rgba(15, 23, 42, 0.74);
        border: 1px solid rgba(148, 163, 184, 0.08);
    }

    .connection-code-block strong {
        color: #f8fafc;
    }

    .connection-code-block code {
        color: #93c5fd;
        word-break: break-all;
    }

    .connection-code-block--compact {
        margin-top: 1rem;
        margin-bottom: 1rem;
        padding: 0.85rem 0.95rem;
    }

    .connection-record,
    .connection-page-item,
    .connection-empty {
        padding: 1rem;
        border-radius: 20px;
        background: rgba(15, 23, 42, 0.74);
        border: 1px solid rgba(148, 163, 184, 0.08);
    }

    .connection-record + .connection-record {
        margin-top: 1rem;
    }

    .connection-record__top,
    .connection-page-item {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        align-items: flex-start;
    }

    .connection-record strong,
    .connection-page-item strong {
        display: block;
        color: #f8fafc;
        margin-bottom: 0.25rem;
    }

    .connection-record__meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.6rem;
        margin-top: 0.9rem;
    }

    .connection-chip {
        display: inline-flex;
        padding: 0.38rem 0.8rem;
        border-radius: 999px;
        background: rgba(37, 99, 235, 0.14);
        color: #bfdbfe;
        border: 1px solid rgba(96, 165, 250, 0.14);
        font-size: 0.76rem;
        font-weight: 800;
    }

    .connection-page-list {
        display: grid;
        gap: 0.85rem;
        margin-top: 1rem;
    }

    @media (max-width: 991.98px) {
        .connection-activation-grid,
        .connections-setup-grid,
        .connection-readiness-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767.98px) {
        .connection-record__top,
        .connection-page-item {
            flex-direction: column;
        }
    }
</style>
@endsection
