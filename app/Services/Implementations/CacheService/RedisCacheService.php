<?php
/**
 * Created by PhpStorm.
 * User: Stan
 * Date: 7-10-2015
 * Time: 09:49
 */

namespace App\Services\Implementations\CacheService;

use App\Models\Maps\Map;
use App\Services\Contracts\AuthorizationService;
use App\Services\Contracts\CacheService;
use Illuminate\Cache\CacheManager;
use Illuminate\Cache\RedisStore;
use Illuminate\Cache\Repository;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Connection;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Log;

class RedisCacheService implements  CacheService
{
    /** @var  RedisStore */
    private $store = null;

    private function store($tag) {
        if($this->store === null) {
            /** @var CacheManager $cache */
            $cache = app('cache');

            /** @var Repository $store */
            $repo = $cache->store("redis");

            /** @var RedisStore $store */
            $this->store = $repo->getStore();
        }
        return $this->store->tags($tag);
    }

    public function get($tag, $key)
    {
        return $this->store($tag)->get($key);
    }

    public function forget($tag, $key = null)
    {
        if($key !== null)
            return $this->store($tag)->forget($key);

        $this->store($tag)->flush();
        return true;
    }

    public function put($tag, $key, $value, $minutes = null)
    {
        if($minutes == null)
            $this->store($tag)->forever($key, $value);
        else
            $this->store($tag)->put($key, $value, $minutes);

        return $value;
    }

    public function increment($tag, $key, $incrementValue = 1)
    {
        $this->store($tag)->increment($key, $incrementValue);
    }
}