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

class BackedHandler
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

        $adQrCode = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=gQFL7zwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyeFBiU2NmanJkRWsxMGtLeTFyY1QAAgQURRpbAwQA6QcA';

        return $adQrCode;
    }
}