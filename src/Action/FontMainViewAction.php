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

class FontMainViewAction
{
    /**
     * @var Twig
     */
    private $view;


    public function __construct(ContainerInterface $container)
    {
        $this->view = $container[Container::NAME_VIEW];
    }


    public function index(ServerRequestInterface $request,ResponseInterface $response,array $args){
        $active = 'index';
        return $this->view->render($response,'/front/pages/index.phtml',compact('active'));
    }

    public function successList(ServerRequestInterface $request,ResponseInterface $response,array $args){
        $active = 'success';
        return $this->view->render($response,'/front/pages/success.phtml',compact('active'));
    }

    public function contact(ServerRequestInterface $request,ResponseInterface $response,array $args){
        $active = 'contact';
        return $this->view->render($response,'/front/pages/contact.phtml',compact('active'));
    }

    public function team(ServerRequestInterface $request,ResponseInterface $response,array $args){
        $active = 'team';
        return $this->view->render($response,'/front/pages/team.phtml',compact('active'));
    }

}