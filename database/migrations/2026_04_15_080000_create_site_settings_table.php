<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Crear System');
            $table->string('site_tagline')->nullable();
            $table->text('site_summary')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('admin_notification_email')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('home_hero_badge')->nullable();
            $table->string('home_hero_title')->nullable();
            $table->text('home_hero_description')->nullable();
            $table->string('home_slide_1_path')->nullable();
            $table->string('home_slide_2_path')->nullable();
            $table->string('home_slide_3_path')->nullable();
            $table->string('home_slide_4_path')->nullable();
            $table->string('home_projects_title')->nullable();
            $table->text('home_projects_description')->nullable();
            $table->string('services_hero_image_path')->nullable();
            $table->string('services_hero_title')->nullable();
            $table->text('services_hero_description')->nullable();
            $table->string('services_feature_image_path')->nullable();
            $table->string('contact_hero_image_path')->nullable();
            $table->string('contact_hero_title')->nullable();
            $table->text('contact_hero_description')->nullable();
            $table->string('about_hero_image_path')->nullable();
            $table->string('about_hero_title')->nullable();
            $table->text('about_hero_description')->nullable();
            $table->string('about_feature_image_path')->nullable();
            $table->text('about_mission')->nullable();
            $table->text('about_vision')->nullable();
            $table->text('about_story')->nullable();
            $table->string('about_profile_name')->nullable();
            $table->string('about_profile_role')->nullable();
            $table->string('about_profile_photo_path')->nullable();
            $table->string('about_profile_cv_path')->nullable();
            $table->text('about_profile_summary')->nullable();
            $table->text('about_story_longform')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
