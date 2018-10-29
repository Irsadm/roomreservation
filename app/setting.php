<?php

return [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => false,
        'db' => [
            'host'   => 'localhost',
            'name'   => 'hotel',
            'user'   => 'root',
            'pass'   => '13136767',
            'driver' => 'pdo_mysql',
            'charset' => 'UTF8'
        ],

        'view' =>  [
            'path' => __DIR__ . '/../views',
            'twig' => [
                'cache' => false,
                'debug' => true
            ]
        ],

        'lang' => [
            'default' => 'id'
        ],



]


 ?>
