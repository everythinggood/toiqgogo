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
        "title"=>"",
        "data"=>[
            "content"=>[
                'value'=>'领取纸巾成功',
                'color'=>'#4d4d4d'
            ],
        ]

    ]);
    var_export($response);
} catch (\EasyWeChat\Kernel\Exceptions\InvalidArgumentException $e) {
    echo $e->getMessage();
}

echo "发送模板消息: ".PHP_EOL;

try {
    $response = $wxApp->template_message->send([
        'touser'=>'o0xto1NmaRm3ESdgiAiA0NaNg3WM',
        "template_id" => 'TM202341498',
        'data'=>[
            'first'=>[
                'DATA'=>'纸巾已经到达出纸巾口，请注意查看！'
            ],
            'keyword1'=>[
                'DATA'=>'维达纸巾一包',
            ],
            'keyword2'=>[
                'DATA'=>(new DateTime())->format('Y-m-d H:i:s')
            ],
            'remark'=>[
                'DATA'=>'如纸巾有问题或没有领取到，请电话联系400-001-222'
            ]
        ]
    ]);

    var_export($response);
} catch (\EasyWeChat\Kernel\Exceptions\InvalidArgumentException $e) {
}



