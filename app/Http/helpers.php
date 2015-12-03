<?php

use App\Services\Contracts\CacheService;
use App\Services\KundenMeisterService;
use Illuminate\Support\Facades\Cache;

if (! function_exists('on_route')) {
    function on_route($name, $exact = false)
    {
        if(!array_key_exists($name, ($routes = app()->namedRoutes)))
            return false;

        $targetSegments = explode('.', $name);
        $currentPath = app('request')->segments();
        $currentSegments = array_values(array_filter($currentPath, function($v) { return !starts_with($v, '{') && $v != ''; }));


        if($exact) {
            return $targetSegments === $currentSegments;
        } else {
            $result = array_diff($targetSegments, $currentSegments);

            return !$result;
        }
    }
}

if (! function_exists('user')) {
    /**
     * @return \SDK\Responses\MeResponse
     */
    function user()
    {
        /** @var KundenMeisterService $sdk */
        $sdk = app(KundenMeisterService::class);

        /** @var CacheService $cache */
        $cache = app(CacheService::class);

        if(!$me = $cache->get('user', 'me'))
            $cache->put('user', 'me', $me = $sdk->userManagement()->me());

        return $me;
    }
}


