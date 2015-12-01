<?php

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
