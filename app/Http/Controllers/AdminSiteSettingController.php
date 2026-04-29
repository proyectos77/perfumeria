<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminSiteSettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.site-settings.edit', [
            'settings' => SiteSetting::current(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $settings = SiteSetting::current();

        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'site_tagline' => ['nullable', 'string', 'max:255'],
            'site_summary' => ['nullable', 'string'],
            'contact_phone' => ['nullable', 'string', 'max:255'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'whatsapp_number' => ['nullable', 'string', 'max:30'],
            'admin_notification_email' => ['nullable', 'email', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'tiktok_url' => ['nullable', 'url', 'max:255'],
            'home_hero_badge' => ['nullable', 'string', 'max:255'],
            'home_hero_title' => ['nullable', 'string', 'max:255'],
            'home_hero_description' => ['nullable', 'string'],
            'home_projects_title' => ['nullable', 'string', 'max:255'],
            'home_projects_description' => ['nullable', 'string'],
            'services_hero_title' => ['nullable', 'string', 'max:255'],
            'services_hero_description' => ['nullable', 'string'],
            'service_1_title' => ['nullable', 'string', 'max:255'],
            'service_1_text' => ['nullable', 'string'],
            'service_1_items' => ['nullable', 'string'],
            'service_2_title' => ['nullable', 'string', 'max:255'],
            'service_2_text' => ['nullable', 'string'],
            'service_2_items' => ['nullable', 'string'],
            'service_3_title' => ['nullable', 'string', 'max:255'],
            'service_3_text' => ['nullable', 'string'],
            'service_3_items' => ['nullable', 'string'],
            'service_4_title' => ['nullable', 'string', 'max:255'],
            'service_4_text' => ['nullable', 'string'],
            'service_4_items' => ['nullable', 'string'],
            'service_5_title' => ['nullable', 'string', 'max:255'],
            'service_5_text' => ['nullable', 'string'],
            'service_5_items' => ['nullable', 'string'],
            'service_6_title' => ['nullable', 'string', 'max:255'],
            'service_6_text' => ['nullable', 'string'],
            'service_6_items' => ['nullable', 'string'],
            'contact_hero_title' => ['nullable', 'string', 'max:255'],
            'contact_hero_description' => ['nullable', 'string'],
            'about_hero_title' => ['nullable', 'string', 'max:255'],
            'about_hero_description' => ['nullable', 'string'],
            'about_mission' => ['nullable', 'string'],
            'about_vision' => ['nullable', 'string'],
            'about_story' => ['nullable', 'string'],
            'about_profile_name' => ['nullable', 'string', 'max:255'],
            'about_profile_role' => ['nullable', 'string', 'max:255'],
            'about_profile_summary' => ['nullable', 'string'],
            'about_story_longform' => ['nullable', 'string'],
            'terms_hero_title' => ['nullable', 'string', 'max:255'],
            'terms_hero_description' => ['nullable', 'string'],
            'terms_summary_description' => ['nullable', 'string'],
            'terms_side_description' => ['nullable', 'string'],
            'terms_updated_label' => ['nullable', 'string', 'max:255'],
            'terms_section_1' => ['nullable', 'string'],
            'terms_section_2' => ['nullable', 'string'],
            'terms_section_3' => ['nullable', 'string'],
            'terms_section_4' => ['nullable', 'string'],
            'terms_section_5' => ['nullable', 'string'],
            'terms_section_6' => ['nullable', 'string'],
            'terms_cta_title' => ['nullable', 'string', 'max:255'],
            'terms_cta_description' => ['nullable', 'string'],
            'privacy_hero_title' => ['nullable', 'string', 'max:255'],
            'privacy_hero_description' => ['nullable', 'string'],
            'privacy_summary_description' => ['nullable', 'string'],
            'privacy_side_description' => ['nullable', 'string'],
            'privacy_updated_label' => ['nullable', 'string', 'max:255'],
            'privacy_section_1' => ['nullable', 'string'],
            'privacy_section_2' => ['nullable', 'string'],
            'privacy_section_3' => ['nullable', 'string'],
            'privacy_section_4' => ['nullable', 'string'],
            'privacy_section_5' => ['nullable', 'string'],
            'privacy_section_6' => ['nullable', 'string'],
            'privacy_section_7' => ['nullable', 'string'],
            'privacy_cta_title' => ['nullable', 'string', 'max:255'],
            'privacy_cta_description' => ['nullable', 'string'],
            'logo_path' => ['nullable', 'image', 'max:4096'],
            'home_slide_1_path' => ['nullable', 'image', 'max:4096'],
            'home_slide_2_path' => ['nullable', 'image', 'max:4096'],
            'home_slide_3_path' => ['nullable', 'image', 'max:4096'],
            'home_slide_4_path' => ['nullable', 'image', 'max:4096'],
            'services_hero_image_path' => ['nullable', 'image', 'max:4096'],
            'services_feature_image_path' => ['nullable', 'image', 'max:4096'],
            'contact_hero_image_path' => ['nullable', 'image', 'max:4096'],
            'about_hero_image_path' => ['nullable', 'image', 'max:4096'],
            'about_feature_image_path' => ['nullable', 'image', 'max:4096'],
            'terms_hero_image_path' => ['nullable', 'image', 'max:4096'],
            'privacy_hero_image_path' => ['nullable', 'image', 'max:4096'],
            'about_profile_photo_path' => ['nullable', 'image', 'max:4096'],
            'about_profile_cv_path' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ], [
            'site_name.required' => 'El nombre del sitio es obligatorio.',
            'contact_email.email' => 'El correo público debe ser una dirección de email válida.',
            'admin_notification_email.email' => 'El correo de notificaciones debe ser una dirección válida.',
            'linkedin_url.url' => 'El enlace de LinkedIn debe ser una URL válida.',
            'instagram_url.url' => 'El enlace de Instagram debe ser una URL válida.',
            'facebook_url.url' => 'El enlace de Facebook debe ser una URL válida.',
            'tiktok_url.url' => 'El enlace de TikTok debe ser una URL válida.',
            'logo_path.image' => 'El logo debe ser una imagen válida.',
            'home_slide_1_path.image' => 'La imagen del slide 1 debe ser un archivo de imagen válido.',
            'home_slide_2_path.image' => 'La imagen del slide 2 debe ser un archivo de imagen válido.',
            'home_slide_3_path.image' => 'La imagen del slide 3 debe ser un archivo de imagen válido.',
            'home_slide_4_path.image' => 'La imagen del slide 4 debe ser un archivo de imagen válido.',
            'services_hero_image_path.image' => 'La imagen del hero de servicios debe ser un archivo de imagen válido.',
            'services_feature_image_path.image' => 'La imagen de bloque de servicios debe ser un archivo de imagen válido.',
            'contact_hero_image_path.image' => 'La imagen del hero de contacto debe ser un archivo de imagen válida.',
            'about_hero_image_path.image' => 'La imagen del hero de quienes somos debe ser un archivo de imagen válida.',
            'about_feature_image_path.image' => 'La imagen del bloque de quienes somos debe ser un archivo de imagen válida.',
            'terms_hero_image_path.image' => 'La imagen del hero de términos debe ser un archivo de imagen válido.',
            'privacy_hero_image_path.image' => 'La imagen del hero de privacidad debe ser un archivo de imagen válido.',
            'about_profile_photo_path.image' => 'La foto de perfil debe ser un archivo de imagen válido.',
            'about_profile_cv_path.mimes' => 'La hoja de vida debe cargarse en formato PDF.',
        ]);

        $fileFields = [
            'logo_path' => 'site-settings/brand',
            'home_slide_1_path' => 'site-settings/home',
            'home_slide_2_path' => 'site-settings/home',
            'home_slide_3_path' => 'site-settings/home',
            'home_slide_4_path' => 'site-settings/home',
            'services_hero_image_path' => 'site-settings/services',
            'services_feature_image_path' => 'site-settings/services',
            'contact_hero_image_path' => 'site-settings/contact',
            'about_hero_image_path' => 'site-settings/about',
            'about_feature_image_path' => 'site-settings/about',
            'terms_hero_image_path' => 'site-settings/legal',
            'privacy_hero_image_path' => 'site-settings/legal',
            'about_profile_photo_path' => 'site-settings/about',
            'about_profile_cv_path' => 'site-settings/about',
        ];

        foreach ($fileFields as $field => $directory) {
            if ($request->hasFile($field)) {
                $this->deleteManagedFile($settings->{$field});
                $validated[$field] = $request->file($field)->store($directory, 'public');
            } else {
                unset($validated[$field]);
            }
        }

        $settings->fill($validated)->save();
        SiteSetting::forgetCurrent();

        return redirect()
            ->route('admin.site-settings.edit')
            ->with('success', 'La configuracion del sitio fue actualizada correctamente.');
    }

    private function deleteManagedFile(?string $path): void
    {
        if (blank($path)) {
            return;
        }

        $normalizedPath = ltrim((string) $path, '/');

        if (str_starts_with($normalizedPath, 'site-settings/')) {
            Storage::disk('public')->delete($normalizedPath);
        }
    }
}
