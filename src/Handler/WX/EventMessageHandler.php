<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/17/18
 * Time: 2:08 PM
 */

namespace Handler\WX;


use EasyWeChat\Kernel\Contracts\EventHandlerInterface;

class EventMessageHandler implements EventHandlerInterface
{

    /**
     * @param mixed $payload
     */
    public function handle($payload = null)
    {

        if(array_key_exists('Ticket',$payload)){
//            $scene = str_replace('qrscene','',$payload['EventKey']);
//            $ticket = $payload['Ticket'];
//
//            $user = $payload['FromUserName'];

        }

    }


}