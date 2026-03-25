# Bitacora de cambios

## Regla obligatoria del proyecto

Esta bitacora debe actualizarse cada vez que se haga un cambio funcional, visual, editorial o estructural en el proyecto.

Reglas:

1. Ningun cambio se considera cerrado si no queda registrado en este archivo.
2. Cada registro debe incluir fecha, objetivo, cambios realizados, archivos afectados y validacion ejecutada.
3. Si el cambio corrige texto, ortografia, tildes o redaccion comercial, tambien debe quedar documentado.
4. Si el cambio afecta diseno, arquitectura o experiencia del usuario, se debe anotar el criterio aplicado.
5. Si en una sesion se hacen varios ajustes relacionados, deben consolidarse en una misma entrada para mantener orden.

## Formato de registro

### Fecha
`AAAA-MM-DD`

### Objetivo
Descripcion breve del proposito del cambio.

### Cambios realizados
Lista clara de lo que se hizo.

### Archivos afectados
Rutas principales modificadas.

### Validacion
Comandos ejecutados o revision realizada.

---

## Registro 2026-03-23

### Objetivo
Dejar el sitio con una presentacion visual elegante y consistente, mejorar el contenido comercial para publicacion y profesionalizar el panel interno, los correos y la redaccion general del proyecto.

### Cambios realizados

1. Se creo un hero reutilizable en `resources/views/partials/page-hero.blade.php` para replicar el estilo de inicio en otras vistas.
2. Se ajusto `resources/views/layouts/app.blade.php` para permitir secciones de ancho completo, mejorar metadatos base y forzar versionado del CSS.
3. Se corrigio y ordeno `resources/views/layouts/navigation.blade.php`, incluyendo enlaces y estructura responsive.
4. Se actualizo `resources/views/layouts/footer.blade.php` con mejor redaccion institucional y de contacto.
5. Se redisenaron las vistas publicas `home`, `servicios`, `contacto` y `quienessomos` para mantener el mismo lenguaje visual sin alterar la funcionalidad.
6. Se centralizo el sistema visual compartido en `public/css/style.css`, incluyendo hero, tarjetas, CTA, paneles y secciones internas.
7. Se reforzaron reglas criticas del hero para evitar problemas de renderizado por cache o por capas visuales.
8. Se actualizo el contenido comercial y editorial de las vistas publicas para que los textos esten orientados al cliente, con tono mas convincente, claro y profesional.
9. Se asigno una imagen principal diferente por pagina para evitar repeticion visual entre inicio, servicios, contacto y quienes somos.
10. Se reviso el contenido de `quienessomos` con enfoque institucional y humano, evitando textos internos o demasiado tecnicos y priorizando confianza, respaldo y cercania profesional.
11. Se reviso `servicios` para que el texto venda mejor el valor de cada solucion y no solo describa funcionalidades.
12. Se mejoro el panel interno en `resources/views/admin/contactos.blade.php` y `resources/views/dashboard.blade.php` con redaccion mas clara y profesional.
13. Se redisenaron los correos automaticos en `resources/views/emails/nuevo-contacto.blade.php` y `resources/views/emails/contacto_recibido.blade.php`.
14. Se mejoraron los asuntos de correo en `app/Mail/NuevoContacto.php` y `app/Mail/ContactoRecibido.php`.
15. Se corrigio una mejora funcional en `app/Mail/ContactoRecibido.php` al ajustar correctamente la propiedad del nombre del destinatario.
16. Se actualizo el mensaje de confirmacion del formulario en `app/Http/Controllers/ContactoController.php`.
17. Se normalizaron tildes, signos y caracteres especiales para evitar entidades HTML innecesarias o texto con codificacion danada en las vistas principales revisadas.
18. Se dejo esta regla permanente para que toda modificacion futura quede registrada en esta bitacora.
19. Se rediseno `resources/views/layouts/footer.blade.php` con una presentacion mas elegante, profesional y coherente con las vistas principales del sitio.
20. Se transformo `resources/views/privacidad.blade.php` en una pagina legal completa con hero, resumen visual, contenido claro y estructura premium.
21. Se transformo `resources/views/terminos.blade.php` en una pagina legal completa con hero, resumen visual y contenido legal mejor presentado.
22. Se ampliaron los estilos compartidos en `public/css/style.css` para soportar el nuevo footer premium y las secciones legales.
23. Se corrigio el fondo del contenido en los acordeones legales para que privacidad y terminos usen el mismo estilo limpio de la referencia visual aprobada.
24. Se reforzo el comportamiento del header fijo ajustando el desplazamiento de scroll global para que las anclas y secciones no queden ocultas debajo de la navegacion.

### Archivos afectados

- `resources/views/partials/page-hero.blade.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/layouts/navigation.blade.php`
- `resources/views/layouts/footer.blade.php`
- `resources/views/home.blade.php`
- `resources/views/servicios.blade.php`
- `resources/views/contacto.blade.php`
- `resources/views/quienessomos.blade.php`
- `resources/views/privacidad.blade.php`
- `resources/views/terminos.blade.php`
- `resources/views/admin/contactos.blade.php`
- `resources/views/dashboard.blade.php`
- `resources/views/emails/nuevo-contacto.blade.php`
- `resources/views/emails/contacto_recibido.blade.php`
- `app/Mail/NuevoContacto.php`
- `app/Mail/ContactoRecibido.php`
- `app/Http/Controllers/ContactoController.php`
- `public/css/style.css`
- `BITACORA_CAMBIOS.md`

### Validacion

1. Se reviso el contenido visible de las vistas principales.
2. Se buscaron entidades HTML y caracteres corruptos para normalizar tildes y signos.
3. Se ejecuto `php artisan view:cache`.
4. Se ejecuto `php artisan view:clear` cuando fue necesario por cambios visuales y cache de estilos.

## Registro 2026-03-24

### Objetivo
Redistribuir la informacion del footer para que se sienta menos cargado, con mejor equilibrio visual y lectura mas clara.

### Cambios realizados

1. Se reorganizo `resources/views/layouts/footer.blade.php` en cuatro bloques mas balanceados: marca, navegacion, soluciones y contacto.
2. Se redujo el peso del bloque institucional principal para que la informacion no quedara concentrada en una sola columna.
3. Se agrego un bloque de soluciones con mensajes cortos para explicar mejor la oferta sin saturar el footer.
4. Se movieron las redes sociales al bloque de contacto para mejorar la distribucion visual.
5. Se ampliaron los estilos del footer en `public/css/style.css` con tarjetas internas, destacados y ajustes responsive para conservar buena lectura en movil.

### Archivos afectados

- `resources/views/layouts/footer.blade.php`
- `public/css/style.css`
- `BITACORA_CAMBIOS.md`

### Validacion

1. Se reviso la estructura Blade del footer actualizado.
2. Se verifico el CSS del footer para asegurar distribucion correcta en escritorio y movil.

## Registro 2026-03-24

### Objetivo
Reducir el footer a su version esencial para publicacion, dejando solo informacion clave y moviendo las redes sociales antes de la linea legal inferior.

### Cambios realizados

1. Se simplifico `resources/views/layouts/footer.blade.php` eliminando bloques de navegacion extensa y descripciones adicionales.
2. Se dejo un footer mas compacto con presentacion institucional corta, accesos clave y datos de contacto esenciales.
3. Se movieron los iconos de redes sociales a una franja independiente antes del bloque de derechos reservados.
4. Se ajusto `public/css/style.css` para soportar la nueva estructura simplificada y conservar buen comportamiento responsive.

### Archivos afectados

- `resources/views/layouts/footer.blade.php`
- `public/css/style.css`
- `BITACORA_CAMBIOS.md`

### Validacion

1. Se reviso la estructura visual del footer reducido.
2. Se valido nuevamente la compilacion de vistas Blade tras el ajuste.

## Referencia tecnica 2026-03-24

### Objetivo
Dejar documentada la arquitectura propuesta para automatizar publicaciones en redes sociales desde el proyecto Laravel, sin confundir esta definicion con una implementacion ya construida.

### Cambios realizados

1. Se documento que actualmente el sitio no tiene una integracion activa con APIs de redes sociales ni un modulo interno de programacion de publicaciones.
2. Se definio como recomendacion inicial una arquitectura de bajo riesgo: Laravel como panel de control, IA para borradores, aprobacion manual y publicacion programada a traves de un integrador externo antes de pasar a APIs directas.
3. Se establecio el flujo propuesto de conexion:
   Laravel administra contenidos, la IA genera borradores, una cola interna gestiona tareas y un integrador o API externa publica en la red seleccionada.
4. Se dejo definida la estructura funcional recomendada para una futura implementacion:
   `social_posts`, `social_platform_connections`, `social_publish_logs` y tareas programadas con scheduler y queue.
5. Se dejo como criterio de arranque recomendado este orden de madurez:
   primero borradores con aprobacion, luego programacion automatica y por ultimo integraciones directas por red.
6. Se dejo documentado el criterio de conexion por plataforma:
   Instagram, Facebook Page y Threads se deben tratar dentro del ecosistema Meta;
   LinkedIn tiene una via corporativa clara por API;
   TikTok requiere condiciones mas restrictivas;
   X implica considerar costo de API.

### Archivos afectados

- `BITACORA_CAMBIOS.md`

### Validacion

1. Se reviso la coherencia entre la recomendacion tecnica y el estado real actual del proyecto.
2. Se confirmo que esta referencia describe una arquitectura propuesta y no una funcionalidad ya activa dentro del sistema.

### Estado actual

1. No existe aun un panel de publicaciones sociales dentro de Laravel.
2. No hay tokens OAuth guardados para redes sociales.
3. No existe scheduler social ni colas de publicacion dedicadas.
4. No hay boton de IA conectado a una automatizacion de contenido social.

### Arquitectura recomendada

1. Panel Laravel:
   crear, editar, aprobar y programar publicaciones.
2. Modulo IA:
   generar caption, hashtags, variantes por red y propuesta visual.
3. Scheduler interno:
   revisar `publish_at` y despachar trabajos a la cola.
4. Cola de trabajos:
   ejecutar publicaciones, reintentos y manejo de errores.
5. Capa de integracion:
   Buffer, n8n o Make en etapa inicial; APIs directas en etapa avanzada.
6. Registro tecnico:
   guardar respuesta de la red, fecha de envio, estado y errores por plataforma.

### Flujo recomendado

1. El usuario crea un contenido desde el panel.
2. El sistema genera un borrador con IA.
3. El usuario aprueba o corrige.
4. Se define fecha y red objetivo.
5. El scheduler detecta que ya corresponde publicar.
6. La cola envia el contenido al integrador o API.
7. El sistema guarda resultado, estado y trazabilidad.

### Conexion recomendada

1. Fase 1:
   Laravel + IA + aprobacion manual + Buffer o n8n.
2. Fase 2:
   Laravel + scheduler + cola + publicacion automatica aprobada.
3. Fase 3:
   Laravel + integraciones directas con Meta y LinkedIn como prioridad.

### Criterio practico recomendado

1. No iniciar con publicacion masiva totalmente automatica cada pocas horas en todas las redes.
2. Empezar con un flujo semiautomatico y controlado para cuidar calidad, tono y cumplimiento por plataforma.
3. Priorizar primero LinkedIn, Instagram y Facebook Page si el objetivo es presencia empresarial.
4. Dejar TikTok y X para una segunda etapa, segun estrategia comercial y presupuesto.

## Registro 2026-03-24

### Objetivo
Implementar la primera fase real del modulo de publicaciones sociales dentro del panel Laravel, dejando lista la base para administracion, programacion interna y futura integracion con redes sociales.

### Cambios realizados

1. Se crearon las migraciones `social_posts` y `social_publish_logs` para guardar contenido, estados, fechas, redes objetivo y trazabilidad tecnica.
2. Se agregaron los modelos `App\Models\SocialPost` y `App\Models\SocialPublishLog` con casts, relaciones y catalogos internos de estados y plataformas.
3. Se implemento `App\Http\Controllers\SocialPostController` para listar, crear, editar, actualizar, eliminar y marcar publicaciones como publicadas manualmente.
4. Se agregaron rutas protegidas del panel para el modulo social en `routes/web.php`.
5. Se incorporo el acceso al nuevo modulo dentro de `resources/views/admin/partials/navigation.blade.php`.
6. Se construyeron las vistas administrativas:
   `resources/views/admin/social-posts/index.blade.php`,
   `resources/views/admin/social-posts/create.blade.php`,
   `resources/views/admin/social-posts/edit.blade.php`,
   `resources/views/admin/social-posts/_form.blade.php`
   y `resources/views/admin/social-posts/partials/styles.blade.php`.
7. Se implemento el comando `social-posts:mark-ready` en `app/Console/Commands/MarkScheduledSocialPostsReady.php` y se programo en `app/Console/Kernel.php` para revisar publicaciones vencidas cada minuto.
8. Se definio esta logica operativa:
   borrador para contenido en construccion,
   aprobada para contenido listo sin fecha,
   programada para contenido aprobado con fecha futura,
   lista para publicar cuando la fecha ya vencio,
   publicada cuando se marca cierre manual,
   y con posibilidad de registrar error tecnico despues.
9. Se ejecutaron las migraciones reales para crear las tablas nuevas en la base de datos local.

### Archivos afectados

- `database/migrations/2026_03_24_120000_create_social_posts_table.php`
- `database/migrations/2026_03_24_120100_create_social_publish_logs_table.php`
- `app/Models/SocialPost.php`
- `app/Models/SocialPublishLog.php`
- `app/Http/Controllers/SocialPostController.php`
- `app/Console/Commands/MarkScheduledSocialPostsReady.php`
- `app/Console/Kernel.php`
- `routes/web.php`
- `resources/views/admin/partials/navigation.blade.php`
- `resources/views/admin/social-posts/index.blade.php`
- `resources/views/admin/social-posts/create.blade.php`
- `resources/views/admin/social-posts/edit.blade.php`
- `resources/views/admin/social-posts/_form.blade.php`
- `resources/views/admin/social-posts/partials/styles.blade.php`
- `BITACORA_CAMBIOS.md`

### Validacion

1. Se validaron los archivos PHP nuevos con `php -l`.
2. Se verificaron las rutas con `php artisan route:list --name=social-posts`.
3. Se limpiaron y recompilaron las vistas con `php artisan view:clear` y `php artisan view:cache`.
4. Se verificaron las migraciones con `php artisan migrate --pretend`.
5. Se ejecutaron las migraciones reales con `php artisan migrate`.

## Registro 2026-03-24

### Objetivo
Implementar la fase de conexiones locales para Meta y LinkedIn, dejando al proyecto listo para probar autenticacion OAuth, detectar activos conectados y preparar la futura publicacion real en redes.

### Cambios realizados

1. Se agrego la tabla `social_platform_connections` para guardar conexiones sociales, tokens, activos de Meta y metadatos de autenticacion.
2. Se creo el modelo `App\Models\SocialPlatformConnection` con cifrado para tokens sensibles y casts para payload y scopes.
3. Se implementaron los servicios `App\Services\Social\MetaConnectionService` y `App\Services\Social\LinkedInConnectionService` para construir URLs OAuth, intercambiar el codigo por token y consultar datos basicos de la cuenta conectada.
4. Se implemento `App\Http\Controllers\SocialConnectionController` para listar conexiones, iniciar login con Meta y LinkedIn, recibir callbacks, guardar tokens y permitir cambiar la pagina principal detectada en Meta.
5. Se agregaron rutas administrativas del modulo de conexiones en `routes/web.php`.
6. Se amplio la navegacion del panel en `resources/views/admin/partials/navigation.blade.php` para incluir el acceso a conexiones.
7. Se creo `resources/views/admin/social-connections/index.blade.php` con instrucciones de setup local, callbacks, botones de conexion y listado de cuentas detectadas.
8. Se ampliaron `config/services.php`, `.env` y `.env.example` para incorporar credenciales y callbacks de Meta y LinkedIn.
9. Se dejo soportado este criterio operativo:
   Meta guarda el usuario autenticado, las paginas devueltas por la API y el activo de Instagram enlazado si existe;
   LinkedIn guarda la cuenta autenticada del miembro y su token para la siguiente fase.
10. Se ejecuto la migracion real de conexiones para dejar la base local lista para pruebas.

### Archivos afectados

- `database/migrations/2026_03_24_140000_create_social_platform_connections_table.php`
- `app/Models/SocialPlatformConnection.php`
- `app/Services/Social/MetaConnectionService.php`
- `app/Services/Social/LinkedInConnectionService.php`
- `app/Http/Controllers/SocialConnectionController.php`
- `config/services.php`
- `routes/web.php`
- `resources/views/admin/partials/navigation.blade.php`
- `resources/views/admin/social-connections/index.blade.php`
- `.env`
- `.env.example`
- `BITACORA_CAMBIOS.md`

### Validacion

1. Se validaron los archivos PHP nuevos con `php -l`.
2. Se verificaron las rutas con `php artisan route:list --name=social-connections`.
3. Se limpiaron y recompilaron las vistas con `php artisan view:clear` y `php artisan view:cache`.
4. Se verifico la nueva migracion con `php artisan migrate --pretend`.
5. Se ejecuto la migracion real con `php artisan migrate`.

## Registro 2026-03-24

### Objetivo
Dejar preparado el proyecto para futuras conexiones sociales en produccion, ampliando la base de configuracion para varias redes sin depender todavia de callbacks finales ni credenciales definitivas.

### Cambios realizados

1. Se ampliaron `config/services.php`, `.env` y `.env.example` para dejar preparada la configuracion base de Meta, LinkedIn, TikTok y X.
2. Se mantuvo el enfoque de Meta como familia principal para Facebook, Instagram y Threads.
3. Se amplio `App\Http\Controllers\SocialConnectionController` para mostrar un resumen general de preparacion por plataforma y detectar que configuraciones ya existen o siguen pendientes.
4. Se actualizo `resources/views/admin/social-connections/index.blade.php` para convertir el modulo en un tablero de preparacion multired, indicando variables, redirects previstos y estado de configuracion por plataforma.
5. Se dejo el sistema listo para que, una vez publicado el dominio final, solo haga falta registrar callbacks definitivos y completar credenciales en produccion.

### Archivos afectados

- `config/services.php`
- `.env`
- `.env.example`
- `app/Http/Controllers/SocialConnectionController.php`
- `resources/views/admin/social-connections/index.blade.php`
- `BITACORA_CAMBIOS.md`

### Validacion

1. Se reviso la coherencia de las variables por plataforma.
2. Se verifico visualmente que el panel muestre el estado de preparacion general por red.
3. Se mantuvo la estructura compatible con la fase de conexion futura sin romper las rutas actuales.

## Registro 2026-03-24

### Objetivo
Habilitar generacion asistida por IA dentro del formulario de publicaciones sociales para que el usuario pueda pedir una version profesional del contenido desde el panel.

### Cambios realizados

1. Se agrego configuracion de Gemini en `config/services.php`, `.env` y `.env.example` mediante `GOOGLE_GEMINI_API_KEY` y `GOOGLE_GEMINI_MODEL`.
2. Se amplio `App\Http\Controllers\SocialPostController` con el endpoint `generate` para construir un prompt comercial, consultar Gemini y devolver respuesta JSON al formulario.
3. Se agrego la ruta protegida `admin.social-posts.generate` en `routes/web.php`.
4. Se actualizo `resources/views/admin/social-posts/_form.blade.php` para incluir un boton `Generar publicacion con IA` y un flujo asincrono que envia titulo, redes, contenido base y brief a la generacion.
5. Se ajusto `resources/views/admin/social-posts/partials/styles.blade.php` para mostrar estados visuales de carga, exito y error durante la generacion.
6. Se dejo el comportamiento preparado para rellenar automaticamente titulo, contenido y notas cuando la API key de Gemini este configurada.

### Archivos afectados

- `config/services.php`
- `.env`
- `.env.example`
- `routes/web.php`
- `app/Http/Controllers/SocialPostController.php`
- `resources/views/admin/social-posts/_form.blade.php`
- `resources/views/admin/social-posts/partials/styles.blade.php`
- `BITACORA_CAMBIOS.md`

### Validacion

1. Se valido `app/Http/Controllers/SocialPostController.php` con `php -l`.
2. Se verificaron las rutas con `php artisan route:list --name=social-posts`.
3. Se limpiaron y recompilaron las vistas con `php artisan view:clear` y `php artisan view:cache`.
4. Se limpio configuracion con `php artisan config:clear`.

## Mejoras de arquitectura detectadas

1. El proyecto ya tiene una base visual compartida, pero todavia conviene convertir mas bloques repetidos en componentes Blade reutilizables.
2. Informacion como telefonos, correo, textos institucionales y enlaces de redes deberia centralizarse en una sola fuente de configuracion.
3. `public/css/style.css` todavia puede limpiarse para separar estilos legacy de los estilos vigentes.
4. Conviene mantener la revision de codificacion UTF-8 en futuras ediciones para evitar que reaparezcan textos danados.
