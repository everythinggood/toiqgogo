<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 6/12/18
 * Time: 7:41 PM
 */

namespace Action\OfficialAccount;


use Action\ActionInterface;
use Contract\Container;
use Contract\Session;
use EasyWeChat\OfficialAccount\Application;
use Overtrue\Socialite\User;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Router;
use SlimSession\Helper;

class OauthCallbackAction implements ActionInterface
{

    /**
     * @var Application
     */
    private $app;
    /**
     * @var Helper
     */
    private $sHelper;
    /**
     * @var Router
     */
    private $router;

    /**
     * OauthCallbackAction constructor.
     * @param ContainerInterface $container
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->app = $container[Container::NAME_WX_APP];
        $this->sHelper = $container[Container::NAME_SESSION];
        $this->router = $container->get('router');
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param array $args
     *
     * @return mixed
     * @throws \Exception
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        /** @var Request $request */
        $state = $request->getParam('state');

        /** @var User $user */
        $user = $this->app->oauth->user();

        if(!$user) throw new \Exception("oauth callback can not get user!");

        $this->sHelper->set(Session::NAME_USER_INFO,$user->toArray());

        /** @var Response $response */
        return $response->withRedirect($this->router->pathFor("wx_index",['state'=>$state]));

    }
}