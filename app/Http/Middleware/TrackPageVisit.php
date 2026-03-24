<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\PageVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;

class TrackPageVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (!$this->shouldTrack($request)) {
            return $response;
        }

        PageVisit::create([
            'session_id' => $request->session()->getId(),
            'user_id' => optional($request->user())->id,
            'path' => '/' . ltrim($request->path(), '/'),
            'url' => $request->fullUrl(),
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 1000),
            'referrer' => $request->headers->get('referer'),
            'referrer_host' => parse_url((string) $request->headers->get('referer'), PHP_URL_HOST),
            'visited_at' => Carbon::now(),
        ]);

        return $response;
    }

    private function shouldTrack(Request $request): bool
    {
        if (!Schema::hasTable('page_visits')) {
            return false;
        }

        if (!$request->isMethod('GET') || $request->ajax() || $request->expectsJson()) {
            return false;
        }

        if ($request->is('admin/*') || $request->is('dashboard') || $request->is('profile*')) {
            return false;
        }

        if ($request->routeIs(
            'login',
            'register',
            'logout',
            'password.*',
            'verification.*',
            'profile.*',
            'admin.*',
            'dashboard'
        )) {
            return false;
        }

        return !$request->is('storage/*', '_debugbar/*', 'livewire/*');
    }
}
