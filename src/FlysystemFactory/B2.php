<?php
namespace MJRider\FlysystemFactory;

use Mhetreramesh\Flysystem\BackblazeAdapter;
use ChrisWhite\B2\Client;

class B2
{
    public static function create($url)
    {
         $client = new Client($url->user, $url->pass);
         $adapter = new BackblazeAdapter($client, $url->host);
        return $adapter;
    }
}
