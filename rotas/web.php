<?php
use Slim\Views\PhpRenderer;

$app->get('/', function ($request, $response) {
    $renderer = new PhpRenderer(__DIR__ . '/../views/login');
    return $renderer->render($response, 'login.php');
});

$app->get('/esqueci-minha-senha', function ($request, $response) {
    $renderer = new PhpRenderer(__DIR__ . '/../views');
    return $renderer->render($response, 'login/recuperar_senha.php');
});

$app->get('/cadastrar', function ($request, $response) {
    $renderer = new PhpRenderer(__DIR__ . '/../views');
    return $renderer->render($response, 'login/cadastrar.php');
});

$app->get('/home', function ($request, $response) {
    $renderer = new PhpRenderer(__DIR__ . '/../views');
    return $renderer->render($response, 'tarefa/listar.php');
});
