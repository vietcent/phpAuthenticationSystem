<?php
$app->('/', function() use ($app){
  $app->render('home.php');
})->name('home');
