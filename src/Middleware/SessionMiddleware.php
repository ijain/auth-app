<?php
declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Factory\ResponseFactory;

class SessionMiddleware implements Middleware
{
    /**
     * {@inheritdoc}
     */
    public function process(Request $request, RequestHandler $handler): Response
    {
        $publicRoutesArray = array(
            '/login',
            '/post-login',
            '/register',
            '/post-register',
            '/'
        );

        $route = $_SERVER['PATH_INFO'] ?? '/';
        $responseFactory = new ResponseFactory();
        $response = $responseFactory->createResponse(200);

        if (!isset($_COOKIE['remember_user']) && !in_array($route, $publicRoutesArray)) {
            return $response->withHeader('Location', '/login')->withStatus(302);
        } elseif (isset($_COOKIE['remember_user']) && in_array($route, $publicRoutesArray)) {
            return $response->withHeader('Location', '/home')->withStatus(302);
        }

        return $handler->handle($request);
    }
}
