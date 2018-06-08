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

    private $rule = [
        //模糊
        'blur'=>[
            '888'=>"请点击【<a href=\"http://m.zhiwei99.com/addon/YiKaTong/GuanzhuGzh/up?state=412\">免费领取纸巾</a>]"
        ],
        //精确匹配
        'extract'=>[

        ]
    ];

    /**
     * @param null $payload
     * @return Text | null
     */
    public function handle($payload = null)
    {
        $receive = $payload['Content'];

        $text = new Text();

        foreach ($this->rule['extract'] as $extractPattern=>$content){
            if($receive === $extractPattern){
                $text->set('content',$content);
                return $text;
            }
        }

        foreach ($this->rule['blur'] as $blurPattern=>$content){
            if(strpos($receive,$blurPattern) > -1){
                $text->setAttribute('content',$content);
                return $text;
            }
        }

    }


}