<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'meta' => [
        'app_id' => env('META_APP_ID'),
        'client_secret' => env('META_APP_SECRET'),
        'graph_version' => env('META_GRAPH_VERSION', 'v24.0'),
        'config_id' => env('META_CONFIG_ID'),
        'redirect' => env('META_REDIRECT_URI', env('APP_URL') . '/admin/social-connections/meta/callback'),
        'scopes' => array_filter(array_map('trim', explode(',', (string) env(
            'META_SCOPES',
            'email,pages_show_list,pages_read_engagement,pages_manage_posts,pages_manage_metadata,instagram_basic,instagram_content_publish'
        )))),
    ],

    'linkedin' => [
        'client_id' => env('LINKEDIN_CLIENT_ID'),
        'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
        'redirect' => env('LINKEDIN_REDIRECT_URI', env('APP_URL') . '/admin/social-connections/linkedin/callback'),
        'version' => env('LINKEDIN_API_VERSION', '202511'),
        'scopes' => array_filter(array_map('trim', explode(' ', (string) env(
            'LINKEDIN_SCOPES',
            'openid profile email w_member_social'
        )))),
    ],

    'tiktok' => [
        'client_key' => env('TIKTOK_CLIENT_KEY'),
        'client_secret' => env('TIKTOK_CLIENT_SECRET'),
        'redirect' => env('TIKTOK_REDIRECT_URI', env('APP_URL') . '/admin/social-connections/tiktok/callback'),
        'scopes' => array_filter(array_map('trim', explode(',', (string) env(
            'TIKTOK_SCOPES',
            'user.info.basic,video.publish'
        )))),
    ],

    'x' => [
        'client_id' => env('X_CLIENT_ID'),
        'client_secret' => env('X_CLIENT_SECRET'),
        'redirect' => env('X_REDIRECT_URI', env('APP_URL') . '/admin/social-connections/x/callback'),
        'scopes' => array_filter(array_map('trim', explode(' ', (string) env(
            'X_SCOPES',
            'tweet.read tweet.write users.read offline.access'
        )))),
    ],

    'gemini' => [
        'api_key' => env('GOOGLE_GEMINI_API_KEY'),
        'model' => env('GOOGLE_GEMINI_MODEL', 'gemini-2.0-flash'),
    ],

    'apolo' => [
        'url' => env('APOLO_URL', env('APP_URL') . '/register'),
        'register_url' => env('APOLO_REGISTER_URL', env('APOLO_URL', env('APP_URL') . '/register')),
    ],

];
