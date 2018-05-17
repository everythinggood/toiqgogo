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
use EasyWeChat\Kernel\Messages\Text;
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
//        $this->app->server->push(EventMessageHandler::class,Message::EVENT);

        $this->app->server->push(function ($message){

            if(array_key_exists('Ticket',$message)){
                $scene = str_replace('qrscene','',$message['EventKey']);
//                $ticket = $message['Ticket'];
//
                $user = $message['FromUserName'];

                $text = new Text("请点击【<a href=\"http://m.zhiwei99.com/addon/YiKaTong/GuanzhuGzh/up?state=412\">免费领取纸巾</a>] <br/> scene=".$scene);

                $this->app->customer_service->message($text)->to($user)->send();

            }

        },Message::EVENT);

        $syResponse = $this->app->server->serve();

        $factory = new DiactorosFactory();
        return $factory->createResponse($syResponse);


    }
}