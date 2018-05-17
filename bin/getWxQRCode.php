<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/24/18
 * Time: 2:45 PM
 */

require __DIR__.'/../vendor/autoload.php';

/*if(!file_exists(__DIR__.'/../cache/access_token')){
    throw new Exception('access_token is not found!');
}

$access_token = file_get_contents(__DIR__.'/../cache/access_token');


$client = new \GuzzleHttp\Client();

$response = $client->request('POST','https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$access_token,[
   'json'=>[
       'expire_seconds'=>'604800',
       'action_name'=>'QR_SCENE',
       'action_info'=>[
           'scene'=>[
               'scene_id'=>123,
               'scene_str'=>'121212'
           ]
       ]
   ]
]);

var_export($response->getBody()->getContents());

*/

$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

/** @var \EasyWeChat\OfficialAccount\Application $wechatApp */
$wechatApp = $app->getContainer()[\Contract\Container::NAME_WX_APP];

$result = $wechatApp->qrcode->temporary('foo',6*24*3600);


if($ticket = $result['ticket']){
    $url = $wechatApp->qrcode->url($ticket);

    echo $url;
}


/**
 * ticket 换取二维码图片
 *
 * https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=TICKET
 */



