<?php

use Slim\Slim;
use Noodlehaus\Config;

use CodeCourse\User\User;

session_cache_limiter(false);
session_start();

// This displays errors instead of just a whitepage!
ini_set('display errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
  'mode' => file_get_contents(INC_ROOT . '/mode.php')
]);

$app->configureMode($app->config('mode'), function() use ($app){
  $app->config = Config::load(INC_ROOT . "app\config\{$app->mode}.php");
});

require 'database.php';

$app->container->set('user', function(){
  return new User;
});

var_dump($app->user);
