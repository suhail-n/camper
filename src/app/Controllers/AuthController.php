<?php

declare(strict_types=1);

namespace App\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class AuthController
{

    public function __construct(private readonly Twig $twig)
    {
    }

    public function loginPage(Request $request, Response $response, $args): Response
    {
        return $this->twig->render($response, 'authentication/login.twig');
    }

    public function registerPage(Request $request, Response $response, $args): Response
    {
        return $this->twig->render($response, 'authentication/register.twig');
    }
}
