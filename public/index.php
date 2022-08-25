<?php

use App\Core\Db;
use App\Middleware\SessionMiddleware;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;
use App\Core\DotEnv;
use DI\ContainerBuilder;

require_once dirname(__DIR__) . '/vendor/autoload.php';
(new DotEnv(dirname(__DIR__) . '/.env'))->load();

// Instantiate PHP-DI ContainerBuilder
$containerBuilder = new ContainerBuilder();

// Build PHP-DI Container instance
$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();

$routes = require dirname(__DIR__) . '/app/routes.php';
$routes($app);

$conn = Db::getInstance();
$db = $conn->getConnection();

$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->add(new SessionMiddleware());
$app->addErrorMiddleware(true, true, true);

$app->run();
