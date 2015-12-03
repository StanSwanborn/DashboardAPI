<?php
/**
 * Created by PhpStorm.
 * User: Thijmen
 * Date: 10/9/2015
 * Time: 10:01
 */
namespace App\Services\Contracts;

use App\Models\Maps\Map;
use Illuminate\Database\Query\Builder;

interface CacheService
{
    public function get($tag, $key);
    public function forget($tag, $key);
    public function put($tag, $key, $value, $minutes = null);
    public function increment($tag, $key, $incrementValue = 1);
}