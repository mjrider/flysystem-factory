<?php
use PHPUnit\Framework\TestCase;

class PredisTest extends TestCase {
	protected $root = '';

	public function setup()
	{
		$this->root = 'null:/';
	}

	public function testPredis() {
		$filesystem = \MJRider\FlysystemFactory\create($this->root);
		$filesystem = \MJRider\FlysystemFactory\cache('predis:',$filesystem);
		$this->assertInstanceOf('\League\Flysystem\Filesystem', $filesystem);
		$this->assertInstanceOf('\League\Flysystem\Cached\CachedAdapter', $filesystem->getAdapter());
		$this->assertInstanceOf('\League\Flysystem\Cached\Storage\Predis', $filesystem->getAdapter()->getCache());
	}

	public function testPredisTcp() {
		$filesystem = \MJRider\FlysystemFactory\create($this->root);
		$filesystem = \MJRider\FlysystemFactory\cache('predis-tcp:',$filesystem);
		$this->assertInstanceOf('\League\Flysystem\Filesystem', $filesystem);
		$this->assertInstanceOf('\League\Flysystem\Cached\CachedAdapter', $filesystem->getAdapter());
		$this->assertInstanceOf('\League\Flysystem\Cached\Storage\Predis', $filesystem->getAdapter()->getCache());
	}
}
