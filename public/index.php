<?php

use App\Database\Mariadb;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$app = AppFactory::create();
$banco = new Mariadb();
require_once(__DIR__ . "/../rotas/api.php");
require_once(__DIR__ . "/../rotas/web.php");
$app->run();
