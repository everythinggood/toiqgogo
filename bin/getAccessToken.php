<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/24/18
 * Time: 2:06 PM
 */

require __DIR__ . '/../vendor/autoload.php';

$appId = 'wxd1bd940d852cb646';
$secret = 'ad54de974213f49f43fb087c86e6cc37';

$client = new \GuzzleHttp\Client();

//$response = $client->get("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appId&secret=$secret");
//$response = $client->get("http://localhost/wxSignature?signature=11111&timestamp=222222&nonce=33333&echostr=4444");

$response = $client->request('GET', 'https://api.weixin.qq.com/cgi-bin/token', [
    'query' => [
        'grant_type' => 'client_credential',
        'appId' => $appId,
        'secret' => $secret
    ]
]);

$json = json_decode($response->getBody()->getContents());

var_export($json->access_token);

if($json->access_token){
    file_put_contents(__DIR__.'/../cache/access_token',$json->access_token);
}



