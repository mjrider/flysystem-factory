<?php
namespace MJRider\FlysystemFactory;

use \arc\url as url;
use \arc\path as path;
use \Aws\S3\S3Client;
use \League\Flysystem\AwsS3v3\AwsS3Adapter;

class S3
{
    public static function create($url)
    {
        $args = [
        'credentials' => [
        'key'    => $url->user,
        'secret' => $url->pass
        ],
        'region' => $url->host,
        'version' => 'latest'
        ];
        if (isset($url->query->endpoint)) {
            $args['endpoint'] = $url->query->endpoint;
        }
        $bucket  = \arc\path::head($url->path);
        $subpath = \arc\path::tail($url->path);

        $client = S3Client::factory($args);

        $adapter = new AwsS3Adapter($client, $bucket, $subpath);
        return $adapter;
    }
}
