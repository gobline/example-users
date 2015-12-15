<?php

return [
    Gobline\Router\RouteCollection::class => [
        'configure' => [
            'configurator' => Gobline\Router\Provider\Gobline\RouteCollectionConfigurator::class,
            'data' => [
                'routes' => [
                    [
                        'name' => 'reset',
                        'path' => '/reset',
                        'allows' => 'GET',
                        'values' => [
                            '_action' => App\ActionModel\ResetActionModel::class,
                            '_view' => [
                                'text/html' => getcwd().'/app/View/templates/reset.phtml',
                            ],
                        ]
                    ],
                    [
                        'name' => 'delete',
                        'path' => '/delete/:id',
                        'allows' => 'GET',
                        'values' => [
                            '_action' => App\ActionModel\DeleteActionModel::class,
                            '_view' => [
                                'text/html' => getcwd().'/app/View/templates/delete.phtml',
                            ],
                            '_layouts' => [
                                getcwd().'/app/View/layouts/main.phtml',
                                getcwd().'/app/View/layouts/action.phtml',
                            ],
                        ],
                    ],
                    [
                        'name' => 'edit',
                        'path' => '/edit/:id',
                        'allows' => ['GET', 'POST'],
                        'values' => [
                            '_action' => App\ActionModel\EditActionModel::class,
                            '_view' => [
                                'text/html' => getcwd().'/app/View/templates/edit.phtml',
                            ],
                            '_layouts' => [
                                getcwd().'/app/View/layouts/main.phtml',
                                getcwd().'/app/View/layouts/action.phtml',
                            ],
                        ],
                    ],
                    [
                        'name' => 'add',
                        'path' => '/add',
                        'allows' => ['GET', 'POST'],
                        'values' => [
                            '_action' => App\ActionModel\AddActionModel::class,
                            '_view' => [
                                'text/html' => getcwd().'/app/View/templates/add.phtml',
                            ],
                            '_layouts' => [
                                getcwd().'/app/View/layouts/main.phtml',
                                getcwd().'/app/View/layouts/action.phtml',
                            ],
                        ],
                    ],
                    [
                        'name' => 'info',
                        'path' => '/info/:id',
                        'allows' => 'GET',
                        'values' => [
                            '_action' => App\ActionModel\InfoActionModel::class,
                            '_view' => [
                                'text/html' => getcwd().'/app/View/templates/info.phtml',
                            ],
                            '_layouts' => [
                                getcwd().'/app/View/layouts/main.phtml',
                                getcwd().'/app/View/layouts/action.phtml',
                            ],
                        ],
                    ],
                    [
                        'name' => 'list',
                        'path' => '/list',
                        'allows' => 'GET',
                        'values' => [
                            '_action' => App\ActionModel\ListActionModel::class,
                            '_view' => [
                                'text/html' => getcwd().'/app/View/templates/list.phtml',
                            ],
                            '_layouts' => [
                                getcwd().'/app/View/layouts/main.phtml',
                                getcwd().'/app/View/layouts/list.phtml',
                            ],
                        ],
                    ],
                    [
                        'name' => 'home',
                        'path' => '/',
                        'allows' => 'GET',
                        'values' => [
                            '_view' => [
                                'text/html' => getcwd().'/app/View/templates/home.phtml',
                            ],
                        ]
                    ],
                ],
            ],
        ],
    ],
];
