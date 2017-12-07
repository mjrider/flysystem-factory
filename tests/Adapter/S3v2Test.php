<?php

namespace MJRider\FlysystemFactory\Adapter;

use PHPUnit\Framework\TestCase;

/**
 * @requires PHP 5.4
 */
class S3v2Test extends TestCase
{
    protected $root = '';

    public function setup()
    {
        $this->root = getenv('TEST_S3_LOCATION');
        if ( !class_exists('\League\Flysystem\AwsS3v2\AwsS3Adapter') ) {
            $this->markTestSkipped('AWSS3v3 not available, skipping test');
        }
        if ($this->root === false) {
            $this->markTestSkipped('no S3 endpoint available, test skipped');
        }
        if( strpos($this->root,'//') === 0) {
            $this->root = 's3v2:'.$this->root;
        }
    }

    public function testS3()
    {
        $filesystem = \MJRider\FlysystemFactory\create($this->root);
        $this->assertInstanceOf('\League\Flysystem\Filesystem', $filesystem);
        $this->assertInstanceOf('\League\Flysystem\AwsS3v2\AwsS3Adapter', $filesystem->getAdapter());
    }

    public function testS3SubFolder()
    {
        $filesystem = \MJRider\FlysystemFactory\create($this->root);
        $this->assertInstanceOf('\League\Flysystem\Filesystem', $filesystem);
        $this->assertInstanceOf('\League\Flysystem\AwsS3v2\AwsS3Adapter', $filesystem->getAdapter());
    }
}
