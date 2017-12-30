<?php

namespace MJRider\FlysystemFactory\Adapter;

use \League\Flysystem\AwsS3v2\AwsS3Adapter;

class S3v2 extends S3
{
    protected static function buildArgs($url)
    {
        // modify arguments for use with older S3Client version
        $args = parent::buildArgs($url);
        $args['key'] = $args['credentials']['key'];
        $args['secret'] = $args['credentials']['secret'];

        return $args;
    }

    protected static function buildAdapter($client, $bucket, $subpath)
    {
        return new AwsS3Adapter($client, $bucket, $subpath);
    }
}
