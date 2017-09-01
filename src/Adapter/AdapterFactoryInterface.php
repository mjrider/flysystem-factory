<?php
namespace MJRider\FlysystemFactory\Adapter;

/**
 * Interface defining the interface for AdapterFactory's
 */
interface AdapterFactoryInterface
{
    public static function create($url);
}
