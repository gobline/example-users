<?php

return [
    Gobline\Pdo\LazyPdo::class => [
        'alias' => PDO::class,
        'construct' => [
            'arguments' => ['sqlite:db.sqlite'],
        ],
    ],
    Doctrine\ORM\EntityManager::class => [
        'construct' => [
            'factory' => App\Provider\EntityManagerFactory::class,
        ],
    ],
    App\Model\UserRepository::class => [
        'construct' => [
            'factory' => App\Provider\EntityRepositoryFactory::class,
            'arguments' => [1 => App\Model\User::class],
        ],
    ],
];
