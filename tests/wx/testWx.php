<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/15/18
 * Time: 3:35 PM
 */

require_once __DIR__.'/../../vendor/autoload.php';

$client = new \GuzzleHttp\Client();

$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_base&state=%s#wechat_redirect";

$appId = 'wxbd42adf0827322ad';
$redirect_url = 'http://www.toiqgogo.com/index';
$state = '123';

$url = sprintf($url,$appId,urlencode($redirect_url),$state);

echo $url;

$response = $client->get($url);

var_export($response->getBody()->getContents());



