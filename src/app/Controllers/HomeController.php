<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\Greeter;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class HomeController
{
    public function __construct(private Greeter $greeter, private readonly Twig $twig)
    {
    }

    public function index(Request $request, Response $response, $args): Response
    {
        return $this->twig->render($response, 'home/index.twig', [
            'greeting' => $this->greeter->greet(),
        ]);
    }

    public function error(Request $request, Response $response, $args): Response
    {
        return $this->twig->render($response, 'error/404.twig');
    }
}
