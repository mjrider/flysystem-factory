<?php
namespace MJRider\FlysystemFactory;

use League\Flysystem\Filesystem;
use arc\url as url;

class Factory
{

    public static function create($endpoint)
    {
        $url = url::url($endpoint);
        $filesystem = null;
        $adapter = null;

        switch ($url->scheme) {
            case 's3':
                $adapter = S3::create($url);
                break;
            case 'b2':
                $adapter = B2::create($url);
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
}
