<?php

namespace App\Services\Social;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class LinkedInConnectionService
{
    public function authorizationUrl(string $state): string
    {
        $clientId = (string) config('services.linkedin.client_id');
        $redirectUri = (string) config('services.linkedin.redirect');

        if ($clientId === '' || $redirectUri === '') {
            throw new RuntimeException('LinkedIn no esta configurado todavia en las variables de entorno.');
        }

        return 'https://www.linkedin.com/oauth/v2/authorization?' . http_build_query([
            'response_type' => 'code',
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'state' => $state,
            'scope' => implode(' ', config('services.linkedin.scopes', [])),
        ]);
    }

    public function exchangeCodeForToken(string $code): array
    {
        $response = Http::asForm()
            ->acceptJson()
            ->post('https://www.linkedin.com/oauth/v2/accessToken', [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => config('services.linkedin.redirect'),
                'client_id' => config('services.linkedin.client_id'),
                'client_secret' => config('services.linkedin.client_secret'),
            ]);

        $response->throw();

        return $response->json();
    }

    public function fetchUserInfo(string $accessToken): array
    {
        $response = Http::acceptJson()
            ->withToken($accessToken)
            ->get('https://api.linkedin.com/v2/userinfo');

        $response->throw();

        return $response->json();
    }
}
