<?php

use PHPUnit\Framework\TestCase;

class RackspaceTest extends TestCase
{
    protected $root = '';

    public function setup()
    {
        $this->root = getenv('TEST_RACKSPACE_LOCATION');
        if ($this->root === false) {
            $this->markTestSkipped('no openstack/rackspace endpoint available, test skipped');
        }
    }

    public function testRackspace()
    {
        $filesystem = \MJRider\FlysystemFactory\create($this->root);
        $this->assertInstanceOf('\League\Flysystem\Filesystem', $filesystem);
        $this->assertInstanceOf('\League\Flysystem\Rackspace\RackspaceAdapter', $filesystem->getAdapter());
    }
}
