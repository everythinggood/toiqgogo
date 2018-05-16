<?php
// DIC configuration


$container = $app->getContainer();

// view renderer
$container[\Contract\Container::NAME_RENDERER] = function (\Psr\Container\ContainerInterface $c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container[\Contract\Container::NAME_LOGGER] = function (\Psr\Container\ContainerInterface $c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container[\Contract\Container::NAME_SETTING] = function (\Psr\Container\ContainerInterface $c){
  return $c->get('settings');
};

$container[\Contract\Container::NAME_HTTP_CLIENT] = function (){
    $client = new \GuzzleHttp\Client();
    return $client;
};

$container[\Contract\Container::NAME_HANDLER_WX_JS] = function ($c){
    return new \Handler\WxJsHandler($c);
};

$container[\Contract\Container::NAME_HANDLER_PLANE] = function ($c){
    return new \Handler\PlaneHandler($c);
};





















//errorHandler
//$container['errorHandler'] = function ($c) {
//    return function ($request, $response, $exception) use ($c) {
//        /** @var \Monolog\Logger $logger */
//        $logger = $c[\Contract\Container::NAME_LOGGER];
//        $logger->error(strval($exception), (array)$request);
//        return $c['response']->withStatus(500)
//            ->withHeader('Content-Type', 'text/html')
//            ->write('Something went wrong!');
//    };
//};
//
//$container['phpErrorHandler'] = function ($c) {
//    return function ($request, $response, $error) use ($c) {
//        /** @var \Monolog\Logger $logger */
//        $logger = $c[\Contract\Container::NAME_LOGGER];
//        $logger->error(strval($error), (array)$request);
//        return $c['response']
//            ->withStatus(500)
//            ->withHeader('Content-Type', 'text/html')
//            ->write('Something went wrong!');
//    };
//};