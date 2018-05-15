<?php

//use Slim\Http\Request;
//use Slim\Http\Response;

// Routes
$app->get('/',\Action\FontMainViewAction::class);

$app->get('/index',\Action\FontMainViewAction::class);

$app->any('/wxSignature',\Action\WxSignATureAction::class);

$app->map(['GET','POST'],'/wxScanPush',\Action\WxScanPushAction::class);