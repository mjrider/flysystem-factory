<?php
namespace MJRider\FlysystemFactory\Adapter;

use \arc\url as url;
use \arc\path as path;
use \Aws\S3\S3Client;
use \League\Flysystem\AwsS3v3\AwsS3Adapter;

class S3 implements AdapterFactoryInterface
{
    /**
     * @inheritDoc
     */
    public static function create($url)
    {
        $args = [
            'credentials' => [
                'key'    => urldecode($url->user),
                'secret' => urldecode($url->pass)
            ],
            'region' => $url->host,
            'version' => 'latest',
            'use_path_style_endpoint' => (bool) $url->query->use_path_style_endpoint,
        ];
        if (isset($url->query->endpoint)) {
            $args[ 'endpoint' ] = urldecode($url->query->endpoint);
        }
        $bucket  = (string) \arc\path::head($url->path);
        $subpath = (string) \arc\path::tail($url->path);

        $client = S3Client::factory($args);

        $adapter = new AwsS3Adapter($client, $bucket, $subpath);
        return $adapter;
    }
}
