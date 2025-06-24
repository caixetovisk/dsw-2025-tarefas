<?php

use App\Database\Mariadb;
use App\Models\Tarefa;
use App\Models\Usuario;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$banco = new Mariadb();
require_once("./rotas/api.php");
require_once("./rotas/web.php");
$app->run();