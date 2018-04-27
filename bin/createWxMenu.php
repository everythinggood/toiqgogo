<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/24/18
 * Time: 6:02 PM
 */

require __DIR__.'/../vendor/autoload.php';


if(!file_exists(__DIR__.'/../cache/access_token')){
    throw new Exception('access_token is not found!');
}

$access_token = file_get_contents(__DIR__.'/../cache/access_token');



$client = new \GuzzleHttp\Client();

$response = $client->request('POST','https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token,[
    'body'=>json_encode([
        "button"=>[
            [
                "type"=>"scancode_push",
                "name"=>"扫码领取纸巾",
                "key"=>"scan_get_paper"
            ],
            [
                "type"=>"view",
                "name"=>"商户平台",
                "url"=>"http://m.zhiwei99.com/app"
            ],
//            [
//                "type"=>"media_id",
//                "name"=>"测试文章",
//                "media_id"=>"IlC20hf1bqsB2u-j6MIDAg44X6YbIwcBKdjqM-cW2SM"
//            ]

        ]
    ],JSON_UNESCAPED_UNICODE)
]);

var_export($response->getBody()->getContents());