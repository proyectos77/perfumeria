<?php

namespace App\Http\Controllers;

use App\Models\SocialPost;
use App\Models\SocialPlatformPreference;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SocialTemplateController extends Controller
{
    public function index(): View
    {
        return view('admin.social-templates.index', [
            'templates' => array_values($this->templates()),
        ]);
    }

    public function show(string $template): View
    {
        $selectedTemplate = $this->findTemplate($template);

        abort_if($selectedTemplate === null, 404);

        SocialPlatformPreference::syncDefaults();

        $platformOptions = SocialPlatformPreference::enabledPlatformOptions();
        if ($platformOptions === []) {
            $platformOptions = SocialPost::availablePlatforms();
        }

        return view('admin.social-templates.show', [
            'template' => $selectedTemplate,
            'platformOptions' => $platformOptions,
        ]);
    }

    public function storeDraft(Request $request, string $template): RedirectResponse
    {
        $selectedTemplate = $this->findTemplate($template);

        abort_if($selectedTemplate === null, 404);

        $rules = [
            'internal_title' => ['required', 'string', 'max:160'],
            'platforms' => ['required', 'array', 'min:1'],
            'platforms.*' => ['required', 'string', 'in:' . implode(',', array_keys(SocialPost::availablePlatforms()))],
        ];

        foreach ($selectedTemplate['fields'] as $field) {
            $rules[$field['key']] = ['required', 'string', 'max:' . ($field['max'] ?? 280)];
        }

        $data = $request->validate($rules);

        $post = SocialPost::create([
            'title' => $data['internal_title'],
            'content' => $this->buildContent($selectedTemplate, $data),
            'platforms' => $data['platforms'],
            'status' => SocialPost::STATUS_DRAFT,
            'ai_prompt' => $this->buildAiPrompt($selectedTemplate, $data),
            'notes' => $this->buildNotes($selectedTemplate),
            'created_by' => $request->user()?->id,
            'updated_by' => $request->user()?->id,
        ]);

        $post->logs()->create([
            'status' => 'created_from_template',
            'message' => 'La publicacion fue creada desde el modulo de disenos.',
            'payload' => [
                'template' => $selectedTemplate['slug'],
                'platforms' => $post->platforms,
            ],
        ]);

        return redirect()
            ->route('admin.social-posts.edit', $post)
            ->with('success', 'El borrador se creo desde la plantilla. Ahora puedes ajustarlo y publicarlo.');
    }

    private function templates(): array
    {
        return [
            'senales-web' => [
                'slug' => 'senales-web',
                'name' => 'Post educativo',
                'description' => 'Plantilla vertical para explicar problemas y llevar a mensaje directo.',
                'format' => '1080 x 1350',
                'preview' => 'plantillas-sociales/post-01-senales-web.svg',
                'accent' => 'Educacion + conversion',
                'fields' => [
                    ['key' => 'badge', 'label' => 'Etiqueta superior', 'type' => 'text', 'default' => 'PRESENCIA DIGITAL', 'max' => 40],
                    ['key' => 'headline', 'label' => 'Titulo principal', 'type' => 'textarea', 'rows' => 3, 'default' => '3 senales de que tu negocio ya necesita una web', 'max' => 120],
                    ['key' => 'intro', 'label' => 'Texto de apoyo', 'type' => 'textarea', 'rows' => 3, 'default' => 'Si tu negocio depende solo de redes o WhatsApp, estas senales te estan avisando que es hora de ordenar tu presencia online.', 'max' => 240],
                    ['key' => 'point_one', 'label' => 'Punto 1', 'type' => 'textarea', 'rows' => 2, 'default' => 'Te preguntan siempre lo mismo: servicios, precios, horario y contacto.', 'max' => 180],
                    ['key' => 'point_two', 'label' => 'Punto 2', 'type' => 'textarea', 'rows' => 2, 'default' => 'Tu negocio no transmite confianza porque no hay un sitio claro y profesional que te respalde.', 'max' => 180],
                    ['key' => 'point_three', 'label' => 'Punto 3', 'type' => 'textarea', 'rows' => 2, 'default' => 'Dependes solo de Instagram o WhatsApp y necesitas un lugar propio para explicar y vender.', 'max' => 180],
                    ['key' => 'cta', 'label' => 'Llamado a la accion', 'type' => 'text', 'default' => 'Escribeme "WEB" y te digo que deberia tener tu pagina.', 'max' => 120],
                ],
            ],
            'auditoria-gratis' => [
                'slug' => 'auditoria-gratis',
                'name' => 'Post de oferta',
                'description' => 'Pieza cuadrada para promocionar auditorias, bonos o revisiones gratis.',
                'format' => '1080 x 1080',
                'preview' => 'plantillas-sociales/post-02-auditoria-gratis.svg',
                'accent' => 'Oferta directa',
                'fields' => [
                    ['key' => 'badge', 'label' => 'Etiqueta superior', 'type' => 'text', 'default' => 'OFERTA DEL MES', 'max' => 40],
                    ['key' => 'headline', 'label' => 'Titulo principal', 'type' => 'textarea', 'rows' => 2, 'default' => 'Auditoria web gratis', 'max' => 90],
                    ['key' => 'intro', 'label' => 'Texto de apoyo', 'type' => 'textarea', 'rows' => 3, 'default' => 'Reviso si tu pagina transmite confianza, carga rapido y lleva al cliente a contactarte.', 'max' => 220],
                    ['key' => 'point_one', 'label' => 'Beneficio 1', 'type' => 'text', 'default' => 'Version movil', 'max' => 80],
                    ['key' => 'point_two', 'label' => 'Beneficio 2', 'type' => 'text', 'default' => 'Claridad del mensaje', 'max' => 80],
                    ['key' => 'point_three', 'label' => 'Beneficio 3', 'type' => 'text', 'default' => 'Llamado a la accion', 'max' => 80],
                    ['key' => 'cta', 'label' => 'Llamado a la accion', 'type' => 'text', 'default' => 'Escribeme por WhatsApp', 'max' => 120],
                ],
            ],
            'whatsapp-web' => [
                'slug' => 'whatsapp-web',
                'name' => 'Story o reel',
                'description' => 'Formato vertical para historias, reels y anuncios cortos con CTA.',
                'format' => '1080 x 1920',
                'preview' => 'plantillas-sociales/story-01-whatsapp-web.svg',
                'accent' => 'Historia + CTA',
                'fields' => [
                    ['key' => 'badge', 'label' => 'Etiqueta superior', 'type' => 'text', 'default' => 'STORY PARA REEL', 'max' => 40],
                    ['key' => 'headline', 'label' => 'Titulo principal', 'type' => 'textarea', 'rows' => 3, 'default' => 'Tu negocio vende por WhatsApp?', 'max' => 100],
                    ['key' => 'intro', 'label' => 'Texto de apoyo', 'type' => 'textarea', 'rows' => 3, 'default' => 'Entonces necesitas una web que explique, respalde y lleve a tu cliente al contacto.', 'max' => 220],
                    ['key' => 'point_one', 'label' => 'Mensaje del cliente', 'type' => 'textarea', 'rows' => 2, 'default' => 'Hola, quiero cotizar.', 'max' => 100],
                    ['key' => 'point_two', 'label' => 'Respuesta del negocio', 'type' => 'textarea', 'rows' => 3, 'default' => 'Perfecto, aqui esta toda la informacion en nuestra web.', 'max' => 140],
                    ['key' => 'cta', 'label' => 'Llamado a la accion', 'type' => 'text', 'default' => 'Responde "WEB" y te digo como la haria para tu negocio.', 'max' => 130],
                ],
            ],
        ];
    }

    private function findTemplate(string $slug): ?array
    {
        return $this->templates()[$slug] ?? null;
    }

    private function buildContent(array $template, array $data): string
    {
        $content = [
            $data['headline'],
            '',
            $data['intro'],
            '',
        ];

        if ($template['slug'] === 'whatsapp-web') {
            $content[] = 'Ejemplo de conversacion:';
            $content[] = 'Cliente: ' . $data['point_one'];
            $content[] = 'Negocio: ' . $data['point_two'];
        } else {
            $content[] = 'Puntos clave:';
            $content[] = '1. ' . $data['point_one'];
            $content[] = '2. ' . $data['point_two'];
            $content[] = '3. ' . $data['point_three'];
        }

        $content[] = '';
        $content[] = 'CTA: ' . $data['cta'];

        return implode("\n", $content);
    }

    private function buildAiPrompt(array $template, array $data): string
    {
        return implode(' ', [
            'Adaptar este borrador a una publicacion social basada en la plantilla "' . $template['name'] . '".',
            'Mantener el enfoque comercial, el tono claro y el llamado a la accion final.',
            'Formato visual de referencia: ' . $template['format'] . '.',
            'CTA principal: ' . $data['cta'],
        ]);
    }

    private function buildNotes(array $template): string
    {
        $notes = [
            'Plantilla seleccionada: ' . $template['name'] . ' (' . $template['slug'] . ').',
            'Archivo base: ' . $template['preview'] . '.',
            'Enfoque: ' . $template['accent'] . '.',
        ];

        if ($template['slug'] === 'whatsapp-web') {
            $notes[] = 'Mensajes incluidos: cliente y negocio.';
        } else {
            $notes[] = 'Estructura de apoyo: tres puntos y cierre con CTA.';
        }

        return implode("\n", $notes);
    }
}
