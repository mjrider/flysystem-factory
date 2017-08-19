<?php
namespace MJRider\FlysystemFactory;
use \arc\url as url;	

class Factory {

	public static function create ($endpoint) {
		$url = url::url($endpoint);
		$filesystem = null;

		switch($url->scheme) {
		case 'local':
			break;
		case 's3':
			$adapter = S3::create($url);
			var_dump($adapter);
			break;
		default:
			// TODO fix our own exception handling
			var_dump($endpoint,$url);
			throw new \Exception(sprintf('Unknown scheme [%s]',$url->scheme));
		}
		return $filesystem;
	}
}

