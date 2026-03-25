<?php

namespace App\Services\Social;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class MetaConnectionService
{
    public function authorizationUrl(string $state): string
    {
        $appId = (string) config('services.meta.app_id');
        $redirectUri = (string) config('services.meta.redirect');
        $graphVersion = (string) config('services.meta.graph_version');
        $configId = (string) config('services.meta.config_id');

        if ($appId === '' || $redirectUri === '') {
            throw new RuntimeException('Meta no esta configurado todavia en las variables de entorno.');
        }

        $query = [
            'client_id' => $appId,
            'redirect_uri' => $redirectUri,
            'state' => $state,
            'response_type' => 'code',
            'scope' => implode(',', config('services.meta.scopes', [])),
        ];

        if ($configId !== '') {
            $query['config_id'] = $configId;
        }

        return sprintf(
            'https://www.facebook.com/%s/dialog/oauth?%s',
            $graphVersion,
            http_build_query($query)
        );
    }

    public function exchangeCodeForToken(string $code): array
    {
        $response = Http::asForm()
            ->acceptJson()
            ->post($this->graphUrl('oauth/access_token'), [
                'client_id' => config('services.meta.app_id'),
                'redirect_uri' => config('services.meta.redirect'),
                'client_secret' => config('services.meta.client_secret'),
                'code' => $code,
            ]);

        $response->throw();

        return $response->json();
    }

    public function fetchProfile(string $accessToken): array
    {
        $response = Http::acceptJson()
            ->get($this->graphUrl('me'), [
                'fields' => 'id,name,email',
                'access_token' => $accessToken,
            ]);

        $response->throw();

        return $response->json();
    }

    public function fetchPages(string $accessToken): array
    {
        $response = Http::acceptJson()
            ->get($this->graphUrl('me/accounts'), [
                'fields' => 'id,name,access_token,instagram_business_account{id,username}',
                'access_token' => $accessToken,
            ]);

        $response->throw();

        return $response->json('data', []);
    }

    private function graphUrl(string $path): string
    {
        return sprintf(
            'https://graph.facebook.com/%s/%s',
            config('services.meta.graph_version'),
            ltrim($path, '/')
        );
    }
}
