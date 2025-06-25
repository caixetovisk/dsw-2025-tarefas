<?php

use App\Database\Mariadb;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$banco = new Mariadb();
require_once(__DIR__ . "/../rotas/api.php");
require_once(__DIR__ . "/../rotas/web.php");
$app->run();