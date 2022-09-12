<?php

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/path_constants.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// Create Container using PHP-DI
$container = require CONFIG_PATH . '/container.php';
$router = require CONFIG_PATH . '/routes.php';

// Set container to create App with on AppFactory
AppFactory::setContainer($container);
$app = AppFactory::create();


$router($app);

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $container->get(Twig::class)));

$app->run();
