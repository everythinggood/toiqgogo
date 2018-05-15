<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/15/18
 * Time: 5:40 PM
 */

namespace Handler;


use Contract\ENV;
use Dotenv\Dotenv;
use GuzzleHttp\Client;
use Monolog\Logger;
use Slim\Container;

class WxJsHandler
{

    /**
     * @var Logger
     */
    private $logger;
    /**
     * @var array
     */
    private $setting;
    /**
     * @var Dotenv
     */
    private $env;
    /**
     * @var Client
     */
    private $client;

    /**
     * WxJsHandler constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->logger = $container[\Contract\Container::NAME_LOGGER];
        $this->setting = $container[\Contract\Container::NAME_SETTING];
        $this->env = $container[\Contract\Container::NAME_ENV];
        $this->client = $container[\Contract\Container::NAME_HTTP_CLIENT];
    }

    public function getSnsApiBaseUrl(String $state = '123')
    {
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_base&state=%s#wechat_redirect";

        return sprintf($url, getenv(ENV::ENV_APP_ID), urlencode(getenv(ENV::ENV_REDIRECT_URL)), $state);

    }

    public function getSnsApiUserInfoUrl(String $state = '123')
    {
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_userinfo&state=%s#wechat_redirect';

        return sprintf($url, getenv(ENV::ENV_APP_ID), urlencode(getenv(ENV::ENV_REDIRECT_URL)), $state);
    }

    /**
     *
     * { "access_token":"ACCESS_TOKEN",
    "expires_in":7200,
    "refresh_token":"REFRESH_TOKEN",
    "openid":"OPENID",
    "scope":"SCOPE" }
     * @param $code
     * @return mixed
     */
    public function getOpenidByCode($code){
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code';

        $url = sprintf($url,getenv(ENV::ENV_APP_ID),getenv(ENV::ENV_APP_SECRET),$code);

        $response = $this->client->get($url);

        $json = \GuzzleHttp\json_decode($response->getBody()->getContents(),true);

        return array_key_exists('openid',$json)?$json['openid']:null;

    }

    /**
     * @throws \Exception
     */
    public function getAccessTokenByFile(){
        if(!file_exists(__DIR__.'/../../cache/access_token')){
            throw new \Exception('access_token is not found!');
        }

        $access_token = file_get_contents(__DIR__.'/../../cache/access_token');

        return $access_token;
    }

    /**
     *
     * {    "openid":" OPENID",
    " nickname": NICKNAME,
    "sex":"1",
    "province":"PROVINCE"
    "city":"CITY",
    "country":"COUNTRY",
    "headimgurl":    "http://thirdwx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/46",
    "privilege":[ "PRIVILEGE1" "PRIVILEGE2"     ],
    "unionid": "o6_bmasdasdsad6_2sgVt7hMZOPfL"
    }
     * @param String $accessToken
     * @param $openId
     * @return array | null
     */
    public function getUserInfo(String $accessToken,$openId){
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=%s&openid=%s&lang=zh_CN';

        $url = sprintf($url,$accessToken,$openId);

        $response = $this->client->get($url);

        $json = json_decode($response->getBody()->getContents(),true);

        return array_key_exists('sex',$json)?$json:null;
    }


}