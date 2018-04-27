<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/24/18
 * Time: 11:22 AM
 */

namespace Action;


use Contract\Container;
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

    public function __construct(ContainerInterface $container)
    {
        $this->logger = $container[Container::NAME_LOGGER];
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {

        $content = $request->getBody()->getContents();

        $this->logger->addInfo('xml data: ',[$content]);

        /** @var Request $request */
//        if($request->getParam('echostr')){
//            return $this->checkSignature($request,$response);
//        }

        /**
         * xml  data
         * @var Response $response
         */

        return $response;



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


}