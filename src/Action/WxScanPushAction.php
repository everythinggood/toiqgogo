<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/24/18
 * Time: 3:48 PM
 */

namespace Action;


use Contract\Container;
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

    public function __construct(ContainerInterface $container)
    {
        $this->logger = $container[Container::NAME_LOGGER];
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        /** @var Request $request*/
        $this->logger->addInfo('WxScanPush',$request->getParams());

        $this->logger->addInfo('WxScanPush---XML:  '.$request->getBody()->getContents());

        return $response;
    }

}