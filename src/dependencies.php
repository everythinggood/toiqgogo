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

$container[\Contract\Container::NAME_SETTING] = function (\Psr\Container\ContainerInterface $c,$index){
  return $c->get('settings')[$index];
};

$container[\Contract\Container::NAME_ENV] = function (){
    $env = new \Dotenv\Dotenv(__DIR__.'/../');
    $env->load();
    return $env;
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


