<?php

$params = require 'params.php';

return [
    'language' => $params['lang'],
    'translationsFolder' => __DIR__.'/../translations',
    'database' => [
        'host' => $params['db_host'],
        'db' => $params['db_name'],
        'user' => $params['db_user'],
        'password' => $params['db_pass'],
    ],
    'routes' => [
        'default' => [
            'path' => '^/$',
            'controller' => \app\Controller\HomeController::class,
            'method' => 'GET',
        ],
        'users_list' => [
            'path' => '^/users/$',
            'controller' => \app\Controller\UserController::class,
            'action' => 'list', // indexAction
            'method' => 'GET',
        ],
        'users_item' => [
            'path' => '^/users/(\w+)',
            'controller' => \app\Controller\UserController::class,
            'action' => 'item', // itemAction
            'method' => 'GET',
        ],
        'user_add_form' => [
            'path' => '^/user/add',
            'controller' => \app\Controller\UserController::class,
            'action' => 'addUser', // itemAction
            'method' => 'GET',
        ],
        'user_add_insert' => [
            'path' => '^/user/add',
            'controller' => \app\Controller\UserController::class,
            'action' => 'add', // itemAction
            'method' => 'POST',
        ],
        'user_edit' => [
            'path' => '^/user/edit/(\d+)',
            'controller' => \app\Controller\UserController::class,
            'action' => 'edit', // itemAction
            'method' => 'GET',
        ],
        'user_delete' => [
            'path' => '^/user/delete/(\d+)',
            'controller' => \app\Controller\UserController::class,
            'action' => 'delete', // itemAction
            'method' => 'GET',
        ],
        'admin_register_form' => [
            'path' => '^/register[/]?$',
            'controller' => \app\Controller\AdminController::class,
            'action' => 'registerAdminForm', // itemAction
            'method' => 'GET',
        ],
        'admin_register' => [
            'path' => '^/register[/]?$',
            'controller' => \app\Controller\AdminController::class,
            'action' => 'registerAdmin', // itemAction
            'method' => 'POST',
        ],
        'admin_login_form' => [
            'path' => '^/login[/]?$',
            'controller' => \app\Controller\AdminController::class,
            'action' => 'loginFormAdmin', // itemAction
            'method' => 'GET',
        ],
        'admin_login' => [
            'path' => '^/login[/]?$',
            'controller' => \app\Controller\AdminController::class,
            'action' => 'loginAdmin', // itemAction
            'method' => 'POST',
        ],
        'admin_logout' => [
            'path' => '^/logout[/]?$',
            'controller' => \app\Controller\AdminController::class,
            'action' => 'logoutAdmin', // itemAction
            'method' => 'GET',
        ],
        'products_list' => [
            'path' => '^/products/$',
            'controller' => \app\Controller\ProductController::class,
            'action' => 'list',
            'method' => 'GET',
        ],
        'products_item' => [
            'path' => '^/products/(\d+)$',
            'controller' => \app\Controller\ProductController::class,
            'action' => 'item',
            'method' => 'GET',
        ],
        'products_add_form' => [
            'path' => '^/products/add',
            'controller' => \app\Controller\ProductController::class,
            'action' => 'addForm',
            'method' => 'GET',
        ],
        'products_add_insert' => [
            'path' => '^/products/add',
            'controller' => \app\Controller\ProductController::class,
            'action' => 'add',
            'method' => 'POST',
        ],
        'products_edit' => [
            'path' => '^/products/edit/(\d+)',
            'controller' => \app\Controller\ProductController::class,
            'action' => 'edit', // itemAction
            'method' => 'GET',
        ],
        'products_delete' => [
            'path' => '^/products/delete/(\d+)',
            'controller' => \app\Controller\ProductController::class,
            'action' => 'delete', // itemAction
            'method' => 'GET',
        ],
    ]
];