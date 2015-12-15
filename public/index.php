<?php 

error_reporting(E_ALL);
header('content-type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Brussels');
chdir(dirname(__DIR__));

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    if (0 === error_reporting()) {
        return;
    } // error was suppressed with the @-operator
    throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
});


require './vendor/autoload.php';

use Gobline\Application\Facade;
use App\Form\UserForm;

$app = new Facade();

$app->setDebugMode(true);

set_exception_handler(function (\Exception $e) use ($app) {
    $app->getDispatcher()->handleException($app->getRequest(), $app->getResponse(), $e);
});

$app->getRegistrar()
    ->register(getcwd().'/config/services.php')
    ->register(getcwd().'/config/routes.php');

$app->getContainer()
    ->share(UserForm::class);

$app->run();
