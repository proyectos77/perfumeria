<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('service_1_title')->nullable()->after('services_feature_image_path');
            $table->text('service_1_text')->nullable()->after('service_1_title');
            $table->text('service_1_items')->nullable()->after('service_1_text');
            $table->string('service_2_title')->nullable()->after('service_1_items');
            $table->text('service_2_text')->nullable()->after('service_2_title');
            $table->text('service_2_items')->nullable()->after('service_2_text');
            $table->string('service_3_title')->nullable()->after('service_2_items');
            $table->text('service_3_text')->nullable()->after('service_3_title');
            $table->text('service_3_items')->nullable()->after('service_3_text');
            $table->string('service_4_title')->nullable()->after('service_3_items');
            $table->text('service_4_text')->nullable()->after('service_4_title');
            $table->text('service_4_items')->nullable()->after('service_4_text');
            $table->string('service_5_title')->nullable()->after('service_4_items');
            $table->text('service_5_text')->nullable()->after('service_5_title');
            $table->text('service_5_items')->nullable()->after('service_5_text');
            $table->string('service_6_title')->nullable()->after('service_5_items');
            $table->text('service_6_text')->nullable()->after('service_6_title');
            $table->text('service_6_items')->nullable()->after('service_6_text');

            $table->string('terms_hero_image_path')->nullable()->after('service_6_items');
            $table->string('terms_hero_title')->nullable()->after('terms_hero_image_path');
            $table->text('terms_hero_description')->nullable()->after('terms_hero_title');
            $table->text('terms_summary_description')->nullable()->after('terms_hero_description');
            $table->text('terms_side_description')->nullable()->after('terms_summary_description');
            $table->string('terms_updated_label')->nullable()->after('terms_side_description');
            $table->text('terms_section_1')->nullable()->after('terms_updated_label');
            $table->text('terms_section_2')->nullable()->after('terms_section_1');
            $table->text('terms_section_3')->nullable()->after('terms_section_2');
            $table->text('terms_section_4')->nullable()->after('terms_section_3');
            $table->text('terms_section_5')->nullable()->after('terms_section_4');
            $table->text('terms_section_6')->nullable()->after('terms_section_5');
            $table->string('terms_cta_title')->nullable()->after('terms_section_6');
            $table->text('terms_cta_description')->nullable()->after('terms_cta_title');

            $table->string('privacy_hero_image_path')->nullable()->after('terms_cta_description');
            $table->string('privacy_hero_title')->nullable()->after('privacy_hero_image_path');
            $table->text('privacy_hero_description')->nullable()->after('privacy_hero_title');
            $table->text('privacy_summary_description')->nullable()->after('privacy_hero_description');
            $table->text('privacy_side_description')->nullable()->after('privacy_summary_description');
            $table->string('privacy_updated_label')->nullable()->after('privacy_side_description');
            $table->text('privacy_section_1')->nullable()->after('privacy_updated_label');
            $table->text('privacy_section_2')->nullable()->after('privacy_section_1');
            $table->text('privacy_section_3')->nullable()->after('privacy_section_2');
            $table->text('privacy_section_4')->nullable()->after('privacy_section_3');
            $table->text('privacy_section_5')->nullable()->after('privacy_section_4');
            $table->text('privacy_section_6')->nullable()->after('privacy_section_5');
            $table->text('privacy_section_7')->nullable()->after('privacy_section_6');
            $table->string('privacy_cta_title')->nullable()->after('privacy_section_7');
            $table->text('privacy_cta_description')->nullable()->after('privacy_cta_title');
        });

        DB::table('site_settings')->update([
            'service_1_title' => 'Desarrollo web',
            'service_1_text' => 'Creamos sitios web y plataformas que transmiten confianza, explican mejor tu propuesta y convierten visitas en oportunidades reales.',
            'service_1_items' => "Diseno responsivo\nSEO tecnico\nVelocidad y experiencia de usuario",
            'service_2_title' => 'Mantenimiento de software',
            'service_2_text' => 'Mantenemos tus plataformas actualizadas, seguras y estables para que tu operacion siga avanzando sin fricciones ni interrupciones innecesarias.',
            'service_2_items' => "Actualizaciones criticas\nMonitoreo y soporte\nCorreccion de incidencias",
            'service_3_title' => 'Consultoria TI',
            'service_3_text' => 'Te ayudamos a tomar mejores decisiones tecnologicas para invertir con criterio, ordenar procesos y avanzar con una ruta mas clara.',
            'service_3_items' => "Diagnostico de procesos\nRuta tecnologica\nPriorizacion de iniciativas",
            'service_4_title' => 'Software a medida',
            'service_4_text' => 'Desarrollamos soluciones personalizadas para negocios que necesitan mas control, mas trazabilidad y una operacion mejor organizada.',
            'service_4_items' => "Modelado del negocio\nEscalabilidad\nIntegracion con tus procesos",
            'service_5_title' => 'Integraciones API',
            'service_5_text' => 'Conectamos tus sistemas, herramientas y plataformas para que tu negocio trabaje con mas fluidez y menos reprocesos.',
            'service_5_items' => "Pagos y facturacion\nSincronizacion de datos\nConectividad entre sistemas",
            'service_6_title' => 'Automatizacion de procesos',
            'service_6_text' => 'Automatizamos tareas repetitivas para que tu equipo ahorre tiempo, reduzca errores y se concentre en lo que realmente genera valor.',
            'service_6_items' => "Bots y scripts\nProcesos recurrentes\nReportes automaticos",
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
        ]);
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'service_1_title', 'service_1_text', 'service_1_items',
                'service_2_title', 'service_2_text', 'service_2_items',
                'service_3_title', 'service_3_text', 'service_3_items',
                'service_4_title', 'service_4_text', 'service_4_items',
                'service_5_title', 'service_5_text', 'service_5_items',
                'service_6_title', 'service_6_text', 'service_6_items',
                'terms_hero_image_path', 'terms_hero_title', 'terms_hero_description',
                'terms_summary_description', 'terms_side_description', 'terms_updated_label',
                'terms_section_1', 'terms_section_2', 'terms_section_3',
                'terms_section_4', 'terms_section_5', 'terms_section_6',
                'terms_cta_title', 'terms_cta_description',
                'privacy_hero_image_path', 'privacy_hero_title', 'privacy_hero_description',
                'privacy_summary_description', 'privacy_side_description', 'privacy_updated_label',
                'privacy_section_1', 'privacy_section_2', 'privacy_section_3',
                'privacy_section_4', 'privacy_section_5', 'privacy_section_6',
                'privacy_section_7', 'privacy_cta_title', 'privacy_cta_description',
            ]);
        });
    }
};
