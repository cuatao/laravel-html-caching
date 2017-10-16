<?php

namespace Cuatao\LaravelHtmlCaching\Http\Middleware;

use Cache;
use Closure;

class ResponseHtmlCachingBeforeMiddleware
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
        // Only fire when explicitly enabled.
        if (config('html_caching.enable', false)) {
            $key = get_caching_key_from_request($request);

            if (Cache::has($key)) {
                $content = Cache::get($key);

                return response($content);
            }
        }

        return $next($request);
    }
}
