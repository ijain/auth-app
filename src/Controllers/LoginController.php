<?php

namespace App\Controllers;

use App\Core\Db;
use App\Models\LoginModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Psr7\Cookies;
use Slim\Views\PhpRenderer as View;
use Throwable;

class LoginController extends Controller
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
        return (new View())->render($response, $this->settings['views'] . 'login.php', []);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     * @throws Throwable
     */
    public function login(Request $request, Response $response, array $args): Response
    {
        $conn = Db::getInstance();
        $db = $conn->getConnection();

        $data = $request->getParsedBody();
        $login = new LoginModel($db);
        $auth = $login->getEntry($data);

        if (empty($auth) || !\password_verify($data['password'], $auth['password'])) {
            return (new View())->render($response, $this->settings['views'] . 'login.php', ['error' => 'Invalid login.']);
        }

        setcookie('remember_user', $data['username'], time() + 2 * 24 * 60 * 60);

        return $response->withStatus(302)->withHeader('Location', '/home');
    }
}