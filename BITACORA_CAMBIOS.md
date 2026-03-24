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

## Mejoras de arquitectura detectadas

1. El proyecto ya tiene una base visual compartida, pero todavia conviene convertir mas bloques repetidos en componentes Blade reutilizables.
2. Informacion como telefonos, correo, textos institucionales y enlaces de redes deberia centralizarse en una sola fuente de configuracion.
3. `public/css/style.css` todavia puede limpiarse para separar estilos legacy de los estilos vigentes.
4. Conviene mantener la revision de codificacion UTF-8 en futuras ediciones para evitar que reaparezcan textos danados.
