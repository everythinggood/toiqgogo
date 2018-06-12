<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 6/12/18
 * Time: 11:18 PM
 */

require __DIR__.'/../vendor/autoload.php';

$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

/** @var \EasyWeChat\OfficialAccount\Application $wxApp */
$wxApp = $app->getContainer()[\Contract\Container::NAME_WX_APP];

echo "支持的行业列表：".PHP_EOL;
var_export($wxApp->template_message->getIndustry());

echo "所有的模板列表：".PHP_EOL;
var_export($wxApp->template_message->getPrivateTemplates());

echo "发送一次性订阅消息：".PHP_EOL;
try {
    $response = $wxApp->template_message->sendSubscription([
        "touser" => 'o0xto1NmaRm3ESdgiAiA0NaNg3WM',
        "template_id"=>'JbFJCqHCCnhZR93qJctfUbD--R_XjrdEarvXFXGXjeI',
        "url"=>'http://toiqgogo.com',
        "scene"=>100,
        "data"=>[
            "title"=>['广州智谷科技有限公司'],
            "content"=>['领取纸巾成功'],
            "time"=>['2018-06-12']
        ]

    ]);
    echo $response;
} catch (\EasyWeChat\Kernel\Exceptions\InvalidArgumentException $e) {
    echo $e->getMessage();
}



