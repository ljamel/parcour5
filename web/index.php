<?php
/**
 * Created by PhpStorm.
 * User: lamri
 * Date: 13/10/2017
 * Time: 10:32
 */


require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../app/app.php';
require __DIR__.'/../app/routes.php';

$app->run();
