<?php

error_reporting(E_ALL);
header('content-type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Brussels');

require './vendor/autoload.php';

$container = new Pimple\Container();

(new Application\Provider\DoctrineOrmServiceProvider('entityManager'))
	->register($container);

$entityManager = $container['entityManager'];

return Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
