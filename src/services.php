<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/23/18
 * Time: 11:44 AM
 * @param \Slim\Container $container
 * @return \Service\BillService
 */

$container[\Service\BillService::class] = function (\Slim\Container $container){
    return new \Service\BillService($container);
};