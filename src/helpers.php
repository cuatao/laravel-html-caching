<?php

if (! function_exists('get_caching_key_from_request')) {
    function get_caching_key_from_request($request)
    {
        $url = $request->url();
        $queryParams = $request->query();

        ksort($queryParams);

        $queryString = http_build_query($queryParams);

        $fullUrl = "{$url}?{$queryString}";

        return sha1($fullUrl);
    }
}