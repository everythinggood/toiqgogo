<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/17/18
 * Time: 2:08 PM
 */

namespace Handler\WX;


use EasyWeChat\Kernel\Contracts\EventHandlerInterface;
use EasyWeChat\Kernel\Messages\Text;
use EasyWeChat\OfficialAccount\Application;

class EventMessageHandler implements EventHandlerInterface
{
    /**
     * @var Application
     */
    private $app;

    /**
     * EventMessageHandler constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param null $message
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\RuntimeException
     */
    public function handle($message = null)
    {
        //扫码事件
        if(array_key_exists('Ticket',$message)){
            $scene = str_replace('qrscene','',$message['EventKey']);
            $user = $message['FromUserName'];

            $text = new Text(" <br/> scene=".$scene);

            $this->app->customer_service->message($text)->to($user)->send();

        }

    }


}