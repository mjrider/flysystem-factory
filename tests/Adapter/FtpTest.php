<?php

namespace MJRider\FlysystemFactory\Adapter;

use PHPUnit\Framework\TestCase;

/**
 * @requires PHP 5.4
 */
class FtpTest extends TestCase
{
    protected $root = '';

    public function setup()
    {
        $this->root = 'ftp:'.__DIR__ . '/files/';
        is_dir(__DIR__ . '/files/') || mkdir(__DIR__ . '/files/');
    }

    public function testLocal()
    {
        $filesystem = \MJRider\FlysystemFactory\create($this->root);
        $this->assertInstanceOf('\League\Flysystem\Filesystem', $filesystem);
        $this->assertInstanceOf('\League\Flysystem\Adapter\Ftp', $filesystem->getAdapter());
    }
}
