<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/15/18
 * Time: 3:35 PM
 */

require_once __DIR__.'/../../vendor/autoload.php';

$client = new \GuzzleHttp\Client();

//get code
/*

$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_base&state=%s#wechat_redirect";

$appId = 'wxbd42adf0827322ad';
$redirect_url = 'http://toiqgogo.com/testwx';
$state = '123';

$url = sprintf($url,$appId,urlencode($redirect_url),$state);

echo $url;

$response = $client->get($url);

var_export($response->getBody()->getContents());*/


//get accesstoken use code
/*$appId = 'wxbd42adf0827322ad';
$secret = '31a3f1d179433ee6e58511a4af66ad91';
$code = '071ZdI9Q0JWScb2mJf8Q0neK9Q0ZdI93';


$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code";
$url = sprintf($url,$appId,$secret,$code);

$response = $client->get($url);

var_export($response->getBody()->getContents());*/


//get userinfo
//$accessToken = '9_-8ftrEv5pOzMLwinFCET3KV5_ZolKUhP5vn3wB-qOOZWSZgVOxciAZZoqbXs44iuoEBa3zR5RR4phkPD9Jx0iJBTpetoZO6t1XgsSBFRSWF6cOWlbhTl1b-vxk4IHUm9tnll3ofLmmihkf5pSUGcADAVXJ';
//$openId = 'oX8Ie1ZcrBLS2Bq_Gdj9gdFHH2vM';
//$url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=%s&openid=%s&lang=zh_CN';
//$url = sprintf($url,$accessToken,$openId);
//
//$response = $client->get($url);
//var_export($response->getBody()->getContents());