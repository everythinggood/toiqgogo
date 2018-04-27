<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/28/18
 * Time: 12:34 AM
 */

require __DIR__.'/../vendor/autoload.php';


if(!file_exists(__DIR__.'/../cache/access_token')){
    throw new Exception('access_token is not found!');
}

$access_token = file_get_contents(__DIR__.'/../cache/access_token');

$client = new \GuzzleHttp\Client();

$response = $client->post('https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token='.$access_token,[
   'json'=>[
        "type"=>"news",
       "offset"=>0,
       "count"=>2
   ]
]);


var_export($response->getBody()->getContents());