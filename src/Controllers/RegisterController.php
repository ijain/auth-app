<?php

namespace App\Controllers;

use App\Core\Db;
use App\Models\RegisterModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer as View;
use Throwable;

class RegisterController extends Controller
{
    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     * @throws Throwable
     */
    public function show(Request $request, Response $response, array $args): Response
    {
        return (new View())->render($response, $this->settings['views'] . 'register.php', []);
    }

    public function store(Request $request, Response $response, array $args): Response
    {
        $conn = Db::getInstance();
        $db = $conn->getConnection();

        $data = $request->getParsedBody();
        $hash = isset($data['password']) ? \password_hash($data['password'], PASSWORD_DEFAULT) : null;

        $data['password'] = $hash;
        unset($data['password-confirm']);

        $register = new RegisterModel($db);
        $result = $register->create($data);

        $response->getBody()->write(json_encode($result));

        return $response;
    }
}