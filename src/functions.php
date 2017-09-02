<?php
namespace MJRider\FlysystemFactory;

use League\Flysystem\Filesystem;
use arc\url as url;
use MJRider\FlysystemFactory\Adapter;

/**
 * Create a flysystem instance configured from a uri endpoint
 *
 * @param string $endpoint url formated string describing the flysystem configuration
 *
 * @return League\Flysystem\Filesystem instance
 */
function create($endpoint)
{
    $url = url::url($endpoint);
    $filesystem = null;
    $adapter = null;

    switch ($url->scheme) {
        case 's3':
            $adapter = Adapter\S3::create($url);
            break;
        case 'b2':
            $adapter = Adapter\B2::create($url);
            break;
        case 'file':
        case 'local':
            $adapter = Adapter\Local::create($url);
            break;
        default:
            // TODO fix our own exception handling
            var_dump($endpoint, $url);
            throw new \Exception(sprintf('Unknown scheme [%s]', $url->scheme));
    }
    if (!is_null($adapter)) {
        $filesystem = new Filesystem($adapter);
    }
    return $filesystem;
}
