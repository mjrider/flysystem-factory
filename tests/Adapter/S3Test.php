<?php

use PHPUnit\Framework\TestCase;

class S3Test extends TestCase
{
    protected $root = '';

    public function setup()
    {
        $this->root = getenv('TEST_S3_LOCATION');
        if ($this->root === false) {
            $this->markTestSkipped('no S3 endpoint available, test skipped');
        }
    }

    public function testS3()
    {
        $filesystem = \MJRider\FlysystemFactory\create($this->root);
        $this->assertInstanceOf('\League\Flysystem\Filesystem', $filesystem);
        $this->assertInstanceOf('\League\Flysystem\AwsS3v3\AwsS3Adapter', $filesystem->getAdapter());
    }

    public function testS3SubFolder()
    {
        $filesystem = \MJRider\FlysystemFactory\create($this->root);
        $this->assertInstanceOf('\League\Flysystem\Filesystem', $filesystem);
        $this->assertInstanceOf('\League\Flysystem\AwsS3v3\AwsS3Adapter', $filesystem->getAdapter());
    }
}
