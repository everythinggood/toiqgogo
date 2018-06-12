<?php

//use Slim\Http\Request;
//use Slim\Http\Response;

// Routes
$app->get('/',\Action\FontMainViewAction::class);

$app->get('/testwx',\Action\TestWXAction::class);


$app->group('/wx',function(){

    $this->any('/bootstrap',\Action\OfficialAccount\BootstrapAction::class);

    $this->get('/index',\Action\OfficialAccount\IndexAction::class)->setName('wx_index');

    $this->get('/qrCode',\Action\OfficialAccount\QrCodeGeneratorAction::class);

    $this->any('/main',\Action\OfficialAccount\FrontMainAction::class);

    $this->any('/oauthCallback',\Action\OfficialAccount\OauthCallbackAction::class);

});

$app->group('/test',function (){
   $this->get('/adCode',\Action\Test\TestViewAction::class.":adCode");
   $this->get('/offLine',\Action\Test\TestViewAction::class.":offLine");
   $this->get('/fail',\Action\Test\TestViewAction::class.":fail");
   $this->get('/success',\Action\Test\TestViewAction::class.":success");

});