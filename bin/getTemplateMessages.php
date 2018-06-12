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



