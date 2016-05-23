<?php
$app->('/', function() use ($app){
  echo 'Hello!';
})->name('home');
