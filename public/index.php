<?php 

error_reporting(E_ALL);
header('content-type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Brussels');
chdir(dirname(__DIR__));

require './vendor/autoload.php';

(new Mendo\Mvc\Bootstrap())
	->registerServices('services')
	->run();
