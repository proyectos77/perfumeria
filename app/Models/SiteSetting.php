<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_tagline',
        'site_summary',
        'logo_path',
        'contact_phone',
        'contact_email',
        'whatsapp_number',
        'admin_notification_email',
        'linkedin_url',
        'instagram_url',
        'facebook_url',
        'tiktok_url',
        'home_hero_badge',
        'home_hero_title',
        'home_hero_description',
        'home_slide_1_path',
        'home_slide_2_path',
        'home_slide_3_path',
        'home_slide_4_path',
        'home_projects_title',
        'home_projects_description',
        'services_hero_image_path',
        'services_hero_title',
        'services_hero_description',
        'services_feature_image_path',
        'service_1_title',
        'service_1_text',
        'service_1_items',
        'service_2_title',
        'service_2_text',
        'service_2_items',
        'service_3_title',
        'service_3_text',
        'service_3_items',
        'service_4_title',
        'service_4_text',
        'service_4_items',
        'service_5_title',
        'service_5_text',
        'service_5_items',
        'service_6_title',
        'service_6_text',
        'service_6_items',
        'contact_hero_image_path',
        'contact_hero_title',
        'contact_hero_description',
        'about_hero_image_path',
        'about_hero_title',
        'about_hero_description',
        'about_feature_image_path',
        'about_mission',
        'about_vision',
        'about_story',
        'about_profile_name',
        'about_profile_role',
        'about_profile_photo_path',
        'about_profile_cv_path',
        'about_profile_summary',
        'about_story_longform',
        'terms_hero_image_path',
        'terms_hero_title',
        'terms_hero_description',
        'terms_summary_description',
        'terms_side_description',
        'terms_updated_label',
        'terms_section_1',
        'terms_section_2',
        'terms_section_3',
        'terms_section_4',
        'terms_section_5',
        'terms_section_6',
        'terms_cta_title',
        'terms_cta_description',
        'privacy_hero_image_path',
        'privacy_hero_title',
        'privacy_hero_description',
        'privacy_summary_description',
        'privacy_side_description',
        'privacy_updated_label',
        'privacy_section_1',
        'privacy_section_2',
        'privacy_section_3',
        'privacy_section_4',
        'privacy_section_5',
        'privacy_section_6',
        'privacy_section_7',
        'privacy_cta_title',
        'privacy_cta_description',
    ];

    protected static ?self $currentInstance = null;

    public static function current(): self
    {
        if (static::$currentInstance instanceof self) {
            return static::$currentInstance;
        }

        if (!Schema::hasTable('site_settings')) {
            return static::$currentInstance = new self(static::defaults());
        }

        $settings = static::query()->first();

        if (!$settings) {
            $settings = static::query()->create(static::defaults());
        }

        return static::$currentInstance = $settings;
    }

    public static function forgetCurrent(): void
    {
        static::$currentInstance = null;
    }

    public static function defaults(): array
    {
        return [
            'site_name' => 'Crear System',
            'site_tagline' => 'Ingeniería de software y soluciones digitales para la eficiencia operativa',
            'site_summary' => 'Transformamos procesos críticos en activos digitales mediante software a medida y gestión documental inteligente.',
            'logo_path' => 'images/logo-crear-system-4.png',
            'contact_phone' => '+57 312 492 6898',
            'contact_email' => 'crearsystem@gmail.com',
            'whatsapp_number' => '573124926898',
            'admin_notification_email' => config('mail.admin_address', 'crearsystem@gmail.com'),
            'home_hero_badge' => 'Ingeniería de Software & Gestión Documental',
            'home_hero_title' => 'Transformamos procesos críticos en activos digitales de alto rendimiento',
            'home_hero_description' => 'Ayudamos a empresas en crecimiento a centralizar su información y automatizar su operación. Diseñamos soluciones robustas con el rigor técnico que su negocio exige y la escalabilidad que su futuro necesita.',
            'home_slide_1_path' => 'images/home/imagen-home1.png',
            'home_slide_2_path' => 'images/home/imagen-home2.png',
            'home_slide_3_path' => 'images/home/imagen-home3.png',
            'home_slide_4_path' => 'images/quienes-somos/imagen-gemeni1.png',
            'home_projects_title' => 'Tecnología propia: Nuestra mayor garantía de confianza',
            'home_projects_description' => 'Contamos con nuestro propio Sistema de Gestión Documental (SGDEA). No dependemos de terceros para asegurar la trazabilidad y seguridad de su información crítica; nuestra ingeniería es el respaldo de su operación.',
            'services_hero_image_path' => 'images/servicio/servicio1.png',
            'services_hero_title' => 'Soluciones diseñadas para la continuidad y escala de su negocio',
            'services_hero_description' => 'Nuestra oferta se centra en tres pilares: gestión técnica proactiva, ingeniería de software de alta disponibilidad y nuestra especialidad en gestión documental electrónica.',
            'services_feature_image_path' => 'images/home/imagen-home2.png',
            'service_1_title' => 'Gestión de Proyectos Tecnológicos',
            'service_1_text' => 'Resolvemos la falta de control en sus iniciativas digitales mediante liderazgo técnico senior. Aseguramos que sus proyectos se entreguen en tiempo, presupuesto y con calidad de ingeniería.',
            'service_1_items' => "Planificación de hitos\nControl de alcance y riesgos\nMetodologías ágiles",
            'service_2_title' => 'Soluciones Digitales & Automatización',
            'service_2_text' => 'Eliminamos los procesos manuales que frenan su crecimiento. Diseñamos flujos de trabajo inteligentes que integran sus herramientas actuales con software de alto rendimiento.',
            'service_2_items' => "Automatización de flujos críticos\nIntegración vía APIs\nSistemas de alta disponibilidad",
            'service_3_title' => 'Gestión Documental Estratégica',
            'service_3_text' => 'Convertimos el caos de archivos en un activo digital organizado. Analizamos sus necesidades de cumplimiento y estructura de datos para una transición eficiente hacia lo digital.',
            'service_3_items' => "Arquitectura de información\nPolíticas de retención digital\nSeguridad de datos críticos",
            'service_4_title' => 'Implementación SGDEA Crear System',
            'service_4_text' => 'Desplegamos nuestra propia tecnología de Gestión Documental Electrónica. Una solución real, ya probada, que garantiza la soberanía y trazabilidad de su información.',
            'service_4_items' => "Cero papel y legalidad\nFirmas digitales y flujos\nTrazabilidad total de documentos",
            'service_5_title' => 'Acompañamiento y Soporte Técnico',
            'service_5_text' => 'No desaparecemos tras la entrega. Actuamos como su departamento técnico externo para garantizar la continuidad de su operación y la evolución de sus sistemas.',
            'service_5_items' => "Soporte preventivo nivel 2 y 3\nMonitoreo de estabilidad\nMejora continua proactiva",
            'service_6_title' => 'Consultoría TI Estratégica',
            'service_6_text' => 'Le ayudamos a tomar decisiones tecnológicas basadas en datos y visión de negocio, evitando inversiones innecesarias en herramientas que no escalan.',
            'service_6_items' => "Diagnóstico operativo\nAuditoría de sistemas\nRuta de madurez digital",
            'contact_hero_image_path' => 'images/quienes-somos/quienes-somos2.png',
            'contact_hero_title' => 'Conversemos sobre la solucion que tu negocio necesita',
            'contact_hero_description' => 'Si buscas una pagina web profesional, una mejora tecnologica o una solucion a medida, este es el punto de partida para ordenar tu idea y convertirla en un proyecto real.',
            'about_hero_image_path' => 'images/quienes-somos/imagen-gemeni1.png',
            'about_hero_title' => 'Conoce al equipo que puede impulsar la imagen y la operacion de tu negocio',
            'about_hero_description' => 'Detras de cada proyecto hay una vision clara: ayudarte a comunicar mejor, trabajar con mas orden y construir una presencia digital que genere confianza.',
            'about_feature_image_path' => 'images/quienes-somos/quienes-somos1.png',
            'about_mission' => 'Ayudar a empresas y emprendedores a crecer con soluciones digitales que mejoran su imagen, fortalecen su operacion y generan mas confianza ante sus clientes.',
            'about_vision' => 'Ser una marca reconocida por convertir necesidades tecnologicas en proyectos bien pensados, bien ejecutados y alineados con el crecimiento de cada negocio.',
            'about_story' => 'Crear System nace de la conviccion de que la tecnologia bien aplicada puede ordenar procesos, fortalecer marcas y abrir nuevas oportunidades comerciales.',
            'about_profile_name' => 'Geovanni Pérez',
            'about_profile_role' => 'Founder & Technical Lead',
            'about_profile_photo_path' => 'images/equipo/geovanni.png',
            'about_profile_cv_path' => 'hoja-vida/perfil-profesional.pdf',
            'about_profile_summary' => 'Acompano a empresas y emprendedores en la construccion de soluciones digitales que no solo funcionan, sino que tambien transmiten orden, confianza y profesionalismo.',
            'about_story_longform' => "Mi camino comenzo en el Ejercito Nacional de Colombia, una etapa que fortalecio valores esenciales para cualquier proyecto serio: disciplina, responsabilidad y compromiso.\n\nLuego llego la decision de construir una carrera en tecnologia, con formacion tecnica, estudios en ingenieria de sistemas y una dedicacion constante al aprendizaje y la mejora.\n\nEsa experiencia hoy se traduce en una manera de trabajar enfocada en cumplir, comunicar con claridad y entregar soluciones que realmente aporten valor al cliente.",
            'terms_hero_image_path' => 'images/quienes-somos/quienes-somos1.png',
            'terms_hero_title' => 'Uso del sitio con reglas claras, serias y transparentes',
            'terms_hero_description' => 'Estos terminos explican las condiciones generales de uso del sitio web de Crear System y el alcance informativo de nuestros contenidos y servicios.',
            'terms_summary_description' => 'Estos terminos resumen las reglas generales de uso del sitio y ayudan a que la relacion informativa con nuestros visitantes tenga una base clara desde el principio.',
            'terms_side_description' => 'Este documento establece el uso general del sitio, el alcance de sus contenidos y la forma en que actualizamos esta informacion cuando es necesario.',
            'terms_updated_label' => '23 de marzo de 2026',
            'terms_section_1' => 'Al acceder a este sitio aceptas hacer un uso adecuado de sus contenidos, servicios y formularios. El usuario se compromete a no emplear este espacio con fines ilicitos, fraudulentos o que afecten la operacion, seguridad o reputacion de Crear System o de terceros.',
            'terms_section_2' => 'Los textos, imagenes, logotipos, disenos y demas recursos publicados en este sitio son propiedad de Crear System o cuentan con autorizacion para su uso. Su reproduccion total o parcial sin autorizacion previa no esta permitida.',
            'terms_section_3' => 'Crear System ofrece servicios relacionados con desarrollo web, software a medida, automatizacion, mantenimiento y consultoria tecnologica. La informacion publicada en este sitio es de caracter informativo y puede ajustarse segun la evolucion del portafolio o los requerimientos de cada proyecto.',
            'terms_section_4' => 'Aunque procuramos mantener la informacion actualizada y el sitio disponible, Crear System no garantiza la ausencia absoluta de errores, interrupciones o fallas tecnicas. El uso del sitio se realiza bajo la responsabilidad del usuario.',
            'terms_section_5' => 'Nos reservamos el derecho de modificar estos terminos cuando resulte necesario. Cualquier actualizacion sera publicada en esta misma pagina y entrara en vigencia desde su fecha de publicacion.',
            'terms_section_6' => 'Si tienes preguntas sobre estos terminos o deseas ampliar informacion sobre nuestros servicios, puedes escribirnos desde nuestra pagina de contacto y atenderemos tu solicitud.',
            'terms_cta_title' => 'Si algo no esta claro, te lo explicamos directamente',
            'terms_cta_description' => 'Si necesitas precision sobre el alcance de estos terminos o sobre nuestros servicios, puedes comunicarte con nosotros y recibir una respuesta clara.',
            'privacy_hero_image_path' => 'images/home/imagen-home3.png',
            'privacy_hero_title' => 'Tratamos tu informacion con claridad, respeto y responsabilidad',
            'privacy_hero_description' => 'Esta politica explica que datos recopilamos, para que los usamos y como los protegemos cuando te comunicas con Crear System o solicitas nuestros servicios.',
            'privacy_summary_description' => 'Queremos que tengas claridad antes de dejarnos tus datos. Por eso explicamos esta politica de forma directa, comprensible y coherente con una relacion basada en confianza.',
            'privacy_side_description' => 'Esta pagina resume como tratamos la informacion que recibimos cuando alguien desea conocernos, solicitar una propuesta o iniciar un proyecto con nosotros.',
            'privacy_updated_label' => '23 de marzo de 2026',
            'privacy_section_1' => 'Podemos recopilar datos como nombre, correo electronico, numero de contacto y detalles relacionados con tu empresa o proyecto cuando completas formularios, solicitas informacion o te comunicas con nuestro equipo.',
            'privacy_section_2' => 'Usamos la informacion para responder solicitudes, presentar propuestas, prestar servicios, mejorar la experiencia del usuario y mantener comunicaciones relacionadas con nuestros servicios y procesos de atencion.',
            'privacy_section_3' => 'Implementamos medidas razonables para proteger la informacion frente a accesos no autorizados, perdida, alteracion o divulgacion indebida. El acceso se limita a personal autorizado y a terceros necesarios para la prestacion del servicio.',
            'privacy_section_4' => 'No vendemos ni comercializamos informacion personal. Solo podremos compartirla con proveedores o aliados vinculados a la operacion del servicio, bajo compromisos de confidencialidad y cuando exista una necesidad legitima o legal.',
            'privacy_section_5' => 'Puedes solicitar acceso, rectificacion, actualizacion, supresion o revocatoria de autorizacion conforme a la normativa aplicable. Para ejercer estos derechos, puedes escribirnos por nuestros canales de contacto.',
            'privacy_section_6' => 'Podremos actualizar esta politica cuando sea necesario para reflejar cambios operativos, legales o de servicio. Cualquier ajuste sera publicado en esta misma pagina con su fecha correspondiente.',
            'privacy_section_7' => 'Si tienes dudas sobre esta politica o sobre el tratamiento de tus datos personales, puedes escribirnos desde nuestra pagina de contacto y te responderemos a la mayor brevedad posible.',
            'privacy_cta_title' => 'Si necesitas claridad sobre el uso de tus datos, conversemos',
            'privacy_cta_description' => 'Si tienes preguntas sobre esta politica o quieres gestionar una solicitud relacionada con tus datos, puedes comunicarte con nosotros por los canales oficiales.',
        ];
    }

    public function assetUrl(?string $path): string
    {
        if (blank($path)) {
            return '';
        }

        $normalizedPath = ltrim((string) $path, '/');

        if (Str::startsWith($normalizedPath, ['http://', 'https://', '//'])) {
            return $normalizedPath;
        }

        if (Str::startsWith($normalizedPath, ['images/', 'hoja-vida/', 'favicon', 'plantillas-sociales/', 'css/'])) {
            return asset($normalizedPath);
        }

        if (Str::startsWith($normalizedPath, 'storage/')) {
            return asset($normalizedPath);
        }

        return Storage::disk('public')->url($normalizedPath);
    }

    public function telUrl(): string
    {
        return 'tel:' . preg_replace('/[^0-9+]/', '', (string) $this->contact_phone);
    }

    public function whatsappUrl(): string
    {
        return 'https://wa.me/' . preg_replace('/\D+/', '', (string) $this->whatsapp_number);
    }

    public function socialLinks(): array
    {
        return array_filter([
            ['icon' => 'bi bi-linkedin', 'label' => 'LinkedIn', 'url' => $this->linkedin_url],
            ['icon' => 'bi bi-instagram', 'label' => 'Instagram', 'url' => $this->instagram_url],
            ['icon' => 'bi bi-facebook', 'label' => 'Facebook', 'url' => $this->facebook_url],
            ['icon' => 'bi bi-tiktok', 'label' => 'TikTok', 'url' => $this->tiktok_url],
        ], fn (array $item) => filled($item['url']));
    }

    public function homeSlides(): array
    {
        return [
            ['image' => $this->home_slide_1_path, 'label' => 'Presencia digital'],
            ['image' => $this->home_slide_2_path, 'label' => 'Soluciones comerciales'],
            ['image' => $this->home_slide_3_path, 'label' => 'Plataformas a medida'],
            ['image' => $this->home_slide_4_path, 'label' => 'Acompanamiento profesional'],
        ];
    }

    public function aboutStoryParagraphs(): array
    {
        return array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", (string) $this->about_story_longform))));
    }

    public function serviceCards(): array
    {
        return [
            [
                'id' => 'gestion-proyectos',
                'icon' => 'bi bi-kanban',
                'title' => $this->service_1_title,
                'text' => $this->service_1_text,
                'items' => $this->multilineItems($this->service_1_items),
                'accent' => 'brand',
            ],
            [
                'id' => 'automatizacion',
                'icon' => 'bi bi-cpu',
                'title' => $this->service_2_title,
                'text' => $this->service_2_text,
                'items' => $this->multilineItems($this->service_2_items),
                'accent' => 'sunset',
            ],
            [
                'id' => 'consultoria-ti',
                'icon' => 'bi bi-people',
                'title' => $this->service_3_title,
                'text' => $this->service_3_text,
                'items' => $this->multilineItems($this->service_3_items),
                'accent' => 'aqua',
            ],
            [
                'id' => 'sgdea-propio',
                'icon' => 'bi bi-shield-lock',
                'title' => $this->service_4_title,
                'text' => $this->service_4_text,
                'items' => $this->multilineItems($this->service_4_items),
                'accent' => 'violet',
            ],
            [
                'id' => 'soporte-continuo',
                'icon' => 'bi bi-headset',
                'title' => $this->service_5_title,
                'text' => $this->service_5_text,
                'items' => $this->multilineItems($this->service_5_items),
                'accent' => 'rose',
            ],
            [
                'id' => 'consultoria-estrategica',
                'icon' => 'bi bi-lightbulb',
                'title' => $this->service_6_title,
                'text' => $this->service_6_text,
                'items' => $this->multilineItems($this->service_6_items),
                'accent' => 'slate',
            ],
        ];
    }

    private function multilineItems(?string $content): array
    {
        return array_values(array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", (string) $content))));
    }
}
