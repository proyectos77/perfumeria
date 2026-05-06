<footer class="site-footer">
    <div class="container">
        <div class="site-footer__panel">
            <div class="row g-4 align-items-start">
                <div class="col-lg-5">
                    <div class="site-footer__brand">
                        <span class="site-footer__logo-frame">
                            <img src="{{ asset('images/logo-pagina.png') }}" alt="Logo de PERFUMERY J & P" class="site-footer__logo">
                        </span>
                        <div>
                            <span class="site-footer__eyebrow">Tienda en línea</span>
                            <h2>PERFUMERY J &amp; P</h2>
                            <p>Fragancias elegantes, catálogo organizado y pedidos simples.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-2">
                    <h3>Comprar</h3>
                    <div class="site-footer__links">
                        <a href="{{ route('catalogo.index') }}">Catálogo</a>
                        <a href="{{ route('quienes-somos') }}">Quiénes Somos</a>
                        <a href="{{ route('contacto') }}">Contacto</a>
                        @auth
                            <a href="{{ route('admin.productos.index') }}">Panel Admin</a>
                        @else
                            <a href="{{ route('login') }}">Acceso Admin</a>
                        @endauth
                    </div>
                </div>

                <div class="col-sm-6 col-lg-2">
                    <h3>Legal</h3>
                    <div class="site-footer__links">
                        <a href="{{ route('terminos') }}">Términos y Condiciones</a>
                        <a href="{{ route('privacidad') }}">Política de Privacidad</a>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-3">
                    <h3>Contacto</h3>
                    <div class="site-footer__contact-list">
                        <a href="tel:+573538002817" class="site-footer__contact-item">
                            <i class="bi bi-telephone-fill"></i>
                            <span>+57 353 8002817</span>
                        </a>
                        <a href="https://wa.me/573538002817?text=Hola%20PERFUMERY%20J%20%26%20P,%20me%20gustaría%20hacer%20una%20consulta" target="_blank" rel="noopener" class="site-footer__contact-item">
                            <i class="bi bi-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
                        <a href="mailto:ventas@perfumerjyp.test" class="site-footer__contact-item">
                            <i class="bi bi-envelope-fill"></i>
                            <span>Correo</span>
                        </a>
                    </div>

                    <div class="mt-3">
                        <h4 style="font-size: 0.875rem; margin-bottom: 0.75rem;">Síguenos</h4>
                        <div class="d-flex gap-2">
                            <a href="https://instagram.com" target="_blank" rel="noopener" title="Instagram" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://facebook.com" target="_blank" rel="noopener" title="Facebook" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://tiktok.com" target="_blank" rel="noopener" title="TikTok" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-footer__bottom">
            <p>&copy; {{ date('Y') }} PERFUMERY J &amp; P. Todos los derechos reservados.</p>
            <a href="{{ route('catalogo.index') }}">Ver Catálogo</a>
        </div>
    </div>
</footer>
