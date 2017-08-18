<?php

use app\Lib\Registry;

// We are bootstraping application

require __DIR__.'/../autoloader.php';

$config = require __DIR__.'/config/app.php';
$db = $config['database'];

$pdo = new \PDO(
    sprintf('mysql:dbname=%s;host=%s', $db['db'], $db['host']),
    $db['user'],
    $db['password']
);

Registry::set('pdo', $pdo);

Registry::set(
    'router',
    new \app\Lib\Router($config['routes'])
);

Registry::set('view', new \app\Lib\View());

$translator = new \app\Lib\Translator(
    $config['translationsFolder'],
    $config['language']
);

Registry::set('translator', $translator);

Registry::readOnly();
