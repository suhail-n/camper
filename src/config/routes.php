<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\CatchAllController;
use App\Controllers\HomeController;
use Slim\App;

return function (App $app) {
    $app->get('/', [HomeController::class, 'index']);
    $app->get('/login', [AuthController::class, 'loginPage']);
    $app->get('/register', [AuthController::class, 'registerPage']);
    $app->get('*', [HomeController::class, 'index']);
    $app->get('/{path:.*}', [CatchAllController::class, 'index']);
};
