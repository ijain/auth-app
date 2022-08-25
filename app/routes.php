<?php

declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->get('/', [RegisterController::class, 'show'])->setName('index');
    $app->get('/login', [LoginController::class, 'show'])->setName('login');
    $app->post('/post-login', [LoginController::class, 'login'])->setName('post-login');
    $app->get('/register', [RegisterController::class, 'show'])->setName('register');
    $app->post('/post-register', [RegisterController::class, 'store'])->setName('post-register');
    $app->get('/home', [HomeController::class, 'show'])->setName('home');

    $app->get('/logout', function (Request $request, Response $response) {
        setcookie('remember_user', '', -1, '/');

        return $response->withStatus(302)->withHeader('Location', '/');
    })->setName('logout');
};