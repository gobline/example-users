<?php

return [
    'error.redirector' => null,

    'routers.defaultModule' => 'user',

    'view.renderer.html.layouts.routeMap' => [
        'user/list' => ['index', 'list'],
        'user/add' => ['index', 'add'],
        'user/edit' => ['index', 'action'],
        'user/info' => ['index', 'action'],
        'user/alert' => ['index', 'action'],
    ],

    'acl.routes.definitions' => [
        'roles' => [
            'unauthenticated' => [],
        ],
        'resources' => [
            'user/' => [
                'rules' => [
                    [
                        'role' => 'unauthenticated',
                    ],
                ],
            ],
        ],
    ],
];
