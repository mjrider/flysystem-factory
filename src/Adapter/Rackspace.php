<?php
namespace MJRider\FlysystemFactory\Adapter;

use OpenCloud\OpenStack;
use League\Flysystem\Rackspace\RackspaceAdapter;

/**
 * Static factory class for creating an rackspace Adapter
 */
class Rackspace implements AdapterFactoryInterface
{
    /**
     * @inheritDoc
     */
    public static function create($url)
    {
        $auth = null;
        $zone = null;

        if (isset($url->query->authendpoint)) {
            $auth = urldecode($url->query->authendpoint);
            unset($url->query->authendpoint);
        }
        if (isset($url->query->zone)) {
            $zone = urldecode($url->query->zone);
            unset($url->query->zone);
        }

        /* Rewriting endpoint from minimal scheme to full url
		 * example.com => https://example.com/
		 * example.com/v1  => https://example.com/v1
		 * example.com:1443/v1 => https://example.com:1443/v1
		 * http://example.com:8080/v1 => http://example.com:8080/v1
		 */
        $authUrl = \arc\url::url($auth);
        if ($authUrl->host == '') {
               $authUrl = \arc\url::url('//'.$auth);
        }
        if ($authUrl->scheme == '') {
               $authUrl->scheme = 'https';
        }
        $auth = (string)$authUrl;

        $args = [
            'username' => urldecode($url->user),
            'password' => urldecode($url->pass),
            'tenantId' => urldecode($url->host),
        ];

        $options = (array)$url->query;

        $container = trim(\arc\path::head($url->path), '/');
        $prefix = ltrim(\arc\path::tail($url->path), '/');

        $client = new OpenStack($auth, $args, $options);
        $store = $client->objectStoreService('swift', $zone);
        $container = $store->getContainer($container);

        $adapter = new RackspaceAdapter($container, $prefix);
        return $adapter;
    }
}
