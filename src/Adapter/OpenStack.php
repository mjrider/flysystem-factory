<?php

namespace MJRider\FlysystemFactory\Adapter;

use OpenStack\OpenStack as OpenStackClient;
use Nimbusoft\Flysystem\OpenStack\SwiftAdapter;
use MJRider\FlysystemFactory\Endpoint;
use Monolog\Logger;
use GuzzleHttp\MessageFormatter;

/**
 * Static factory class for creating an rackspace Adapter
 */
class Openstack implements AdapterFactoryInterface
{
    use Endpoint;

    /**
     * @inheritDoc
     */
    public static function create($url)
    {
        $auth = null;
        $region = null;

        if (isset($url->query->authendpoint)) {
            $auth = urldecode($url->query->authendpoint);
            unset($url->query->authendpoint);
        }

        if (isset($url->query->region)) {
            $region = urldecode($url->query->region);
            unset($url->query->region);
        }

        $auth = self::endpointToURL($auth);
        $logger = new Logger('Logger');
        $logger->pushHandler(new \Monolog\Handler\StreamHandler("php://stdout", 'debug'));


        $args = [
            'authUrl' => $auth,
//            'debugLog' => true,
//            'logger' => $logger,
//            'messageFormatter' => new MessageFormatter(MessageFormatter::DEBUG),
            'user' => [
                'name' => urldecode($url->user),
                'password' => urldecode($url->pass),
                "domain" => [ "id" => "default" ],
            ],
            'scope'   => ['project' => ['id' => $url->host ]]
        ];

        if (!is_null($region)) {
            $args['region'] = $region;
        }

        $options = (array) $url->query;

        $path = \arc\path::collapse($url->path);
        $container = trim(\arc\path::head($path), '/');
        $prefix = ltrim(\arc\path::tail($path), '/');

        $client = new OpenStackClient($args);
        $container = $client->objectStoreV1()->getContainer($container);

        $adapter = new SwiftAdapter($container, $prefix);

        return $adapter;
    }
}
