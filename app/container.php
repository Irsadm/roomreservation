<?php

use Slim\Container;

$container = $app->getContainer();

$container['db'] = function ($c) {
    $setting = $c->get('settings')['db'];
    $config = new \Doctrine\DBAL\Configuration();
    $connectionParams = array(
        'dbname'   => $setting['name'],
        'user'     => $setting['user'],
        'password' => $setting['pass'],
        'host'     => $setting['host'],
        'driver'   => $setting['driver'],
    );

        $connection = \Doctrine\DBAL\DriverManager::getConnection
        ($connectionParams, $config);
        
        return $connection;

};

$container['view'] = function (Container $container) {
    $settings = $container->get('settings')['view'];

    $view = new \Slim\Views\Twig($settings['path'], $settings['twig']);
    $view->addExtension(new Slim\Views\TwigExtension(
    $container->router,
    $container->request->getUri()
    ));

    return $view;
};


 ?>
