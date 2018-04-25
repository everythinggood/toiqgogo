<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/24/18
 * Time: 3:48 PM
 */

namespace Action;


use Contract\Container;
use GuzzleHttp\Client;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Request;

class WxScanPushAction implements ActionInterface
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
        /** @var Request $request*/
        $this->logger->addInfo('WxScanPush',$request->getParams());

        $content = $request->getBody()->getContents();

        $this->logger->addInfo('WxScanPush---XML:  '.$content);

        $arr = $this->convertXMLToArr($content);

        $this->logger->addInfo('xmlToArr',$arr);

        if($toUser = $arr['FromUserName']){
            $this->sendCustomMessage($toUser);
        }


        return $response;
    }

    protected function convertXMLToArr($content){

        libxml_disable_entity_loader(true);
        $arr = json_decode(json_encode(simplexml_load_string($content, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

        return $arr;
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

}