<?php

namespace Cuatao\LaravelHtmlCaching\Http\Middleware;

use Cache;
use Closure;

class ResponseHtmlCachingAfterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Only fire when explicitly enabled.
        if (config('html_caching.enable', false)) {
            $this->buildCache($request, $response);
        }

        return $response;
    }

    protected function buildCache($request, $response)
    {
        return Cache::remember(get_caching_key_from_request($request), config('response-cache.ttl', 60), function () use ($response) {
            return $response->getContent();
        });
    }
}
