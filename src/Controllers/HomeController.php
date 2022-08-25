<?php

namespace App\Controllers;

use Slim\Views\PhpRenderer as View;
use Throwable;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;

class HomeController extends Controller
{
    /**
     * @throws Throwable
     */
    public function show(Request $request, Response $response, array $args): Response
    {
        return (new View())->render($response, $this->settings['views'] . 'home.php', ['username' => $_COOKIE['remember_user']]);
    }
}
