<?php

return [
    'doctrine.orm' => [
        'serviceProvider' => '\\User\\Provider\\DoctrineOrmServiceProvider',
    ],

    'user' => [
        'serviceProvider' => '\\User\\ServiceProvider',
    ],
];
