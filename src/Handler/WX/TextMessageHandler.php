<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/17/18
 * Time: 11:48 AM
 */

namespace Handler\WX;


use EasyWeChat\Kernel\Contracts\EventHandlerInterface;
use EasyWeChat\Kernel\Messages\Text;

class TextMessageHandler implements EventHandlerInterface
{

    /**
     * @param null $payload
     * @return Text
     */
    public function handle($payload = null)
    {
        $content = $payload['Content'];

        $text = new Text($content);

        return $text;

    }
}