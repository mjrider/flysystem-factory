<?php
namespace MJRider\FlysystemFactory;

/**
 * Interface defining the interface for AdapterFactory's
 */
interface AdapterFactoryInterface
{
    public static function create($endpoint);
}
