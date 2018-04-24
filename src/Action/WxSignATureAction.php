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
use Slim\Http\Stream;

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
        /** @var Request $request */
        $this->logger->addInfo('请求获取参数',$request->getParams());
        $signature = $request->getParam('signature');
        $timestamp = $request->getParam('timestamp');
        $nonce = $request->getParam('nonce');
        $echostr = $request->getParam('echostr');

        $params = compact('signature','timestamp','nonce','echostr');

        sort($params,SORT_STRING);

        $params = implode($params);
        $params = sha1($params);

        $this->logger->addInfo('加密之后的',[$params]);

        $this->logger->addInfo('比对之后',[$signature,$params]);

        /** @var Response $response */
        if($signature == $params){

            return $response->write($echostr);

        }else{

            return $response->write($echostr);

        }




    }


}