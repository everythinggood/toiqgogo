<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/24/18
 * Time: 11:22 AM
 */

namespace Action;


use Contract\Container;
use Contract\Event;
use GuzzleHttp\Client;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class WxSignATureAction implements ActionInterface
{
    /**
     * @var Logger
     */
    private $logger;
    /**
     * @var Client
     */
    private $client;

    public function __construct(ContainerInterface $container)
    {
        $this->logger = $container[Container::NAME_LOGGER];
        $this->client = new Client();
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {

        $content = $request->getBody()->getContents();

        $this->logger->addInfo('xml data: ',[$content]);

        /** @var Request $request */
        if($request->getParam('echostr')){
            return $this->checkSignature($request,$response);
        }

        /** @var Response $response */

        if($content){

            $xml = $this->convertXMLToArr($content);
            $this->logger->addInfo('xml to arr: ',$xml);
//

            switch ($xml['MsgType']){
                case "text" :
                    $response = $response->withHeader('Content-type','text/xml');
                    $response = $this->sendTextMessage($xml['FromUserName'],$xml['ToUserName'],$response);
                    break;
                case "event" :
                    $response = $response->withHeader('Content-type','tet/xml');
                    $response = $this->handleEvent($xml,$response);
                    break;
                default :
                    $response->write('success');
                    break;
            }
            return $response;
        }else{
            return $response->write('success');
        }




    }

    protected function handleEvent(array $xml,Response $response){

        switch ($xml['Event']){
            case Event::CLICK:
                break;
            case Event::LOCATION:
                break;
            case Event::SCAN:
                $this->sendCustomMessage($xml['FromUserName']);
                break;
            case Event::SUBSCRIBE:
//                if($xml['EventKey']){
//
//                }
                $this->sendCustomMessage($xml['FromUserName']);
                break;
            case Event::VIEW:
                break;
            default:
                $response->write('success');
        }

        return $response;

    }

    protected function sendCustomMessage(String $toUser){
        $fileName = __DIR__.'/../../cache/access_token';
        if(file_exists(__DIR__.'/../../cache/access_token')){
            $access_token = file_get_contents($fileName);

            /**
             * 神经病 腾讯 a标签href要带双引号 ，并且a标签后面不能带空格
             */
            $response = $this->client->request('POST', 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=' . $access_token ,[
                'body' => json_encode([
                    'touser' => $toUser,
                    'msgtype' => 'text',
                    'text' => [
                        'content' => "请点击【<a href=\"http://m.zhiwei99.com/addon/YiKaTong/GuanzhuGzh/up?state=412\">免费领取纸巾</a>]"
                    ]
                ],JSON_UNESCAPED_UNICODE)
            ]);

            $this->logger->addInfo('sendCustomMessage success',json_decode($response->getBody()->getContents(),true));
        }else{

            $this->logger->addInfo('sendCustomMessage fail',['code'=>'access_token is not found!']);
        }

    }

    protected function sendTextMessage($toUserName,$fromUserName,ResponseInterface $response){

        $return = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";

        $content = '欢迎';

        $return  = sprintf($return,$toUserName,$fromUserName,time(),$content);

        /** @var Response $response */
        return $response->write($return);
    }

    protected function checkSignature(ServerRequestInterface $request,ResponseInterface $response){
        /** @var Request $request */
        $this->logger->addInfo('请求获取参数',$request->getParams());
        $signature = $request->getParam('signature');
        $timestamp = $request->getParam('timestamp');
        $nonce = $request->getParam('nonce');
        $echostr = $request->getParam('echostr');
        $token = "helloyi123";

        $params = compact('timestamp','nonce','token');

        $this->logger->addInfo('params',$params);

        sort($params,SORT_STRING);

        $params = implode($params);
        $params = sha1($params);

        $this->logger->addInfo('加密之后的',[$params]);

        $this->logger->addInfo('比对之后',[$signature,$params]);

        /** @var Response $response */

        if($signature == $params){

            $this->logger->addInfo('token 认证成功');

            return $response->write($echostr);

        }else{

            $this->logger->addInfo('token 认证失败');
            return $response;

        }
    }

    protected function convertXMLToArr($content){

        libxml_disable_entity_loader(true);
        $arr = json_decode(json_encode(simplexml_load_string($content, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

        return $arr;
    }

}