<?php

use Slim\Slim;
use Slim\Views\Twig;

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
  'view' => new Twig(),
  'templates.path' => INC_ROOT . '/app/views'
]);

$app->configureMode($app->config('mode'), function() use ($app){
  $app->config = Config::load(INC_ROOT . "app\config\{$app->mode}.php");
});

require 'database.php';
require 'routes.php';

$app->container->set('user', function(){
  return new User;
});

$view = $app->view();

$view->parserOptions = [
  'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions = [
  new TwigExtension
];
