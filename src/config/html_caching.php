<?php
return [
    /*
     * Whether or not to enable HTML response caching. Off by default.
     */
    'enable' => env('HTML_CACHE_ENABLE', false),
    /*
     * TTL cache the HTML response, in minutes.
     */
    'ttl' => env('HTML_CACHE_TTL', 60),
];