<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/17/18
 * Time: 10:51 AM
 */

namespace Wx\Action;


use Action\ActionInterface;
use Contract\Container;
use EasyWeChat\Kernel\Messages\Message;
use EasyWeChat\OfficialAccount\Application;
use Handler\WX\TextMessageHandler;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;

class WxMainAction implements ActionInterface
{
    /**
     * @var Application
     */
    private $app;

    /**
     * ActionInterface constructor.
     *
     * @param \Psr\Container\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->app = $container[Container::NAME_WX_APP];
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param array $args
     * @throws
     *
     * @return mixed
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {

        $this->app->server->push(TextMessageHandler::class,Message::TEXT);


        $syResponse = $this->app->server->serve();

        $factory = new DiactorosFactory();
        return $factory->createResponse($syResponse);


    }
}