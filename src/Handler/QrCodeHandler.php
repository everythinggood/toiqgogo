<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/16/18
 * Time: 12:00 PM
 */

namespace Handler;


use Endroid\QrCode\QrCode;
use Psr\Container\ContainerInterface;

class QrCodeHandler
{


    /**
     * QrCodeHandler constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {

    }

    public function getQrCodeByMachineCode(String $machineCode):QrCode
    {
        $url = sprintf('http://192.168.22.142:8100/wx/index?machineCode=%s',$machineCode);
        $qrCode = new QrCode($url);

        return $qrCode;
    }
}