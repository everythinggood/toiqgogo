<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/16/18
 * Time: 12:18 PM
 */

require_once __DIR__.'/../../vendor/autoload.php';

$qrCode = new \Endroid\QrCode\QrCode('http://www.baidu.com');

echo $qrCode->getContentType();

//$qrCode->writeFile(__DIR__.'/qrcode.jpg');

