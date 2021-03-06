<?php

use App\Services\Contracts\CacheService;
use App\Services\KundenMeisterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Laravel\Lumen\Application;

if (! function_exists('on_route')) {
    function on_route($name, $exact = false)
    {
        /** @var Application $app */
        $app = app();
        $pathInfo = array_filter(explode('/', app('request')->getPathInfo()), function($v) { return trim($v) != ''; });
        foreach($app->namedRoutes as $route => $url) {
            $ok = true;
            $urlSegments = array_filter(explode('/', $url), function($v) { return trim($v) != ''; });

            if($exact && count($urlSegments) != count($pathInfo))
                continue;
            foreach($urlSegments as $i => $value) {
                if(!isset($pathInfo[$i]))
                {
                    $ok = false;
                    break;
                }

                if(strpos($value, "{") === 0 && strpos($value, "}") === strlen($value)-1)
                    continue;

                if($value != $pathInfo[$i]) {
                    $ok = false;
                    break;
                }
            }

            if($ok) {
                if ($exact && $name == $route)
                    return true;

                if (!$exact) {
                    $routeSegments = explode('.', $route);
                    $targetSegments = explode('.', $name);
                    $match = count($targetSegments) > 0;
                    foreach ($targetSegments as $j => $value)
                        if (!isset($routeSegments[$j]) || $routeSegments[$j] != $value) {
                            $match = false;

                            break;
                        }

                    if($match)
                        return true;
                }
            }
        }
        return false;
    }
}

if(! function_exists('render_status')) {
    function render_status() {
        $status = session('status');
        $error = session('error');
        $success = session('success');
        $warning = session('warning');

        $messages = "";
        if($status) {
            $messages .= ('<div class="alert alert-info" role="alert">' . $status . '</div>');
        }
        if($error) {
            $messages .= ('<div class="alert alert-danger" role="alert">' . $error . '</div>');
        }
        if($success) {
            $messages .= ('<div class="alert alert-success" role="alert">' . $success . '</div>');
        }
        if($warning) {
            $messages .= ('<div class="alert alert-warning" role="alert">' . $warning . '</div>');
        }

        return $messages;
    }
}

if (! function_exists('user')) {
    /**
     * @return \SDK\Responses\MeResponse
     */
    function user() {
        /** @var KundenMeisterService $sdk */
        $sdk = app(KundenMeisterService::class);

        /** @var CacheService $cache */
        $cache = app(CacheService::class);

        if(!$me = $cache->get('user', 'me'.$sdk->userId()))
            $cache->put('user', 'me'.$sdk->userId(), $me = $sdk->userManagement()->me(), 5);

        return $me;
    }

    function sdk() {
        /** @var KundenMeisterService $sdk */
        $sdk = app(KundenMeisterService::class);

        return $sdk;
    }
}

if(! function_exists('to_self')) {

    function to_self($parameters, $preserve = true) {

        if($preserve) {
            /** @var Request $request */
            $request = app('request');
            foreach ($request->query->all() as $key => $value) {

                if (!isset($parameters[$key]))
                    $parameters[$key] = $value;
            }
        }

        $queryString = "?";
        foreach($parameters as $key => $value) {
            $queryString .= "$key=$value&";
        }

        return substr($queryString, 0, strlen($queryString)-1);
    }
}


