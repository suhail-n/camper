<?php

declare(strict_types=1);

namespace App\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class CatchAllController
{
    public function __construct(private readonly Twig $twig)
    {
    }

    public function index(Request $request, Response $response, $args): Response
    {
        return $this->twig->render($response, 'error/404.twig');
    }
}
