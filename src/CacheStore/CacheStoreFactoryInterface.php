<?php
namespace MJRider\FlysystemFactory\CacheStore;

/**
 * Interface defining the interface for AdapterFactory's
 */
interface CacheStoreFactoryInterface
{
    /**
     * Create Flysystem CacheStore
     *
     * @param \arc\url\Url $url url needed to configure the adapter
     *
     * @return \League\Flysystem\Cached\CacheInterface
     */
    public static function create($url);
}
