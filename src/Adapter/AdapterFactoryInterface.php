<?php
namespace MJRider\FlysystemFactory\Adapter;

/**
 * Interface defining the interface for AdapterFactory's
 */
interface AdapterFactoryInterface
{
    /**
     * Create Flysystem Adapter
     *
     * @param \arc\url\Url $url
     * @return \League\Flysystem\AdapterInterface;
     */
    public static function create($url);
}
