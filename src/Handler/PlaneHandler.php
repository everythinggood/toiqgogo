<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/15/18
 * Time: 7:07 PM
 */

namespace Handler;


use GuzzleHttp\Client;
use Handler\Entity\User;
use Slim\Container;

class PlaneHandler
{
    /**
     * @var Client
     */
    private $client;

    /**
     * PlaneHandler constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->client = $container[\Contract\Container::NAME_HTTP_CLIENT];
    }

    public function isFree(User $user){

        return true;
    }

    public function getAdQrCode(User $user,$machineCode){

        $adQrCode = 'http://www.baidu.com';

        return $adQrCode;
    }
}