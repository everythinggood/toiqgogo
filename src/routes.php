<?php

//use Slim\Http\Request;
//use Slim\Http\Response;

// Routes
$app->get('/',\Action\FontMainViewAction::class);

$app->get('/testwx',\Action\TestWXAction::class);

$app->any('/wxSignature',\Action\WxSignATureAction::class);

$app->map(['GET','POST'],'/wxScanPush',\Action\WxScanPushAction::class);

$app->group('/wx',function(){

   $this->get('/index',\Wx\Action\IndexAction::class);

   $this->get('/scanInfo',\Wx\Action\WxScanInfoAction::class);

});