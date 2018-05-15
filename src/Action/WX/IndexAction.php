<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/15/18
 * Time: 6:31 PM
 */

namespace Wx\Action;


use Action\ActionInterface;
use Contract\Container;
use Handler\WxJsHandler;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class IndexAction implements ActionInterface
{
    /**
     * @var WxJsHandler
     */
    private $wxHandler;

    /**
     * ActionInterface constructor.
     *
     * @param \Psr\Container\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->wxHandler = $container[Container::NAME_HANDLER_WX_JS];
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param array $args
     *
     * @return mixed
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        /** @var Request $request */
        $state = $request->getParam('code');

        /** @var Response $response */
        return $response->withRedirect($this->wxHandler->getSnsApiBaseUrl($state));
    }
}