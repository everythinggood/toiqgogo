<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/24/18
 * Time: 10:45 AM
 */

namespace Action;


use Contract\Container;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class FontMainViewAction implements ActionInterface
{
    /**
     * @var Twig
     */
    private $view;


    public function __construct(ContainerInterface $container)
    {
        $this->view = $container[Container::NAME_VIEW];
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        return $this->view->render($response,'/font/index.phtml');
    }

}