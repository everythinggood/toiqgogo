<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/15/18
 * Time: 3:59 PM
 */

namespace Action;


use Contract\Container;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Request;
use Slim\Views\PhpRenderer;

class TestWXAction implements ActionInterface
{
    /**
     * @var Logger
     */
    private $logger;
    /**
     * @var PhpRenderer
     */
    private $view;

    public function __construct(ContainerInterface $container)
    {
        $this->view = $container[Container::NAME_RENDERER];
        $this->logger = $container[Container::NAME_LOGGER];
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {

        /** @var Request $request */
        $this->logger->addInfo('[Action:TestWX] request parameters',$request->getParams());

        return $this->view->render($response,'/font/index.phtml');

    }

}