<?php
use Slim\Views\PhpRenderer;

$app->get('/login', function ($request, $response) {
    $renderer = new PhpRenderer('/views/login/');
    return $renderer->render($response, 'login.php');
});

$app->get('/esqueci-minha-senha', function ($request, $response) {
    $renderer = new PhpRenderer('../views/login');
    return $renderer->render($response, 'recuperar_senha.php');
});

$app->get('/cadastrar', function ($request, $response) {
    $renderer = new PhpRenderer('../views/login');
    return $renderer->render($response, 'cadastrar.php');
});
