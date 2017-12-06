<?php
namespace MJRider\FlysystemFactory\Adapter;

use \arc\url as url;
use \arc\path as path;
use \Aws\S3\S3Client;
use \League\Flysystem\AwsS3v2\AwsS3Adapter;
use \MJRider\FlysystemFactory\Endpoint;

class S3v2 implements AdapterFactoryInterface
{
    use Endpoint;
    /**
     * @inheritDoc
     */
    public static function create($url)
    {
        $args = [
            'key'    => urldecode($url->user),
            'secret' => urldecode($url->pass),
            'region' => $url->host,
            'credentials' => [
                'key'    => $url->user,
                'secret' => urldecode($url->pass)
            ],
        ];
        if (isset($url->query->endpoint)) {
            $args[ 'base_url' ] = self::endpointToURL(urldecode($url->query->endpoint));
        }
        $bucket  = \arc\path::head($url->path);
        $subpath = \arc\path::tail($url->path);

        $client = S3Client::factory($args);

        $adapter = new AwsS3Adapter($client, $bucket, $subpath);
        return $adapter;
    }
}
