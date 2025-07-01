<?php

use App\Models\Tarefa;
use App\Models\Usuario;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get(
    '/usuario/{id}/tarefa',
    function (Request $request, Response $response, array $args) use ($banco) {
        $user_id = $args['id'];
        $tarefa = new Tarefa($banco->getConnection());
        $tarefas = $tarefa->getAllByUser($user_id);
        $response->getBody()->write(json_encode($tarefas));
        return $response->withHeader('Content-Type', 'application/json');
    }
);

// cadastra usuário
$app->post('/usuario', function (Request $request, Response $response, array $args) use ($banco) {
    $campos_obrigatórios = ['nome', "login", 'senha', "email"];
    $body = $request->getParsedBody();

    try {
        $usuario = new Usuario($banco->getConnection());
        $usuario->nome = $body['nome'] ?? '';
        $usuario->email = $body['email'] ?? '';
        $usuario->login = $body['login'] ?? '';
        $usuario->senha = $body['senha'] ?? '';
        $usuario->foto_path = $body['foto_path'] ?? '';
        foreach ($campos_obrigatórios as $campo) {
            if (empty($usuario->{$campo})) {
                throw new \Exception("o campo {$campo} é obrigatório");
            }
        }
        $usuario->create();
    } catch (\Exception $exception) {
        $response->getBody()->write(json_encode(['message' => $exception->getMessage()]));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
    }

    $response->getBody()->write(json_encode([
        'message' => 'Usuário cadastrado com sucesso!'
    ]));
    return $response->withHeader('Content-Type', 'application/json');
});

// listando usuário
$app->get(
    '/usuario/{id}',
    function (Request $request, Response $response, array $args) use ($banco) {
        $id = $args['id'];
        $usuario = new Usuario($banco->getConnection());
        $usuarios = $usuario->getUsuarioById($id);
        $response->getBody()->write(json_encode($usuarios));
        return $response->withHeader('Content-Type', 'application/json');
    }
);

// Atualizar usuário
$app->put(
    '/usuario/{id}',
    function (Request $request, Response $response, array $args) use ($banco) {
        $campos_obrigatórios = ['nome', "login", 'senha', "email"];
        $body = json_decode($request->getBody()->getContents(), true);

        try {
            $usuario = new Usuario($banco->getConnection());
            $usuario->id = $args['id'];
            $usuario->nome = $body['nome'] ?? '';
            $usuario->email = $body['email'] ?? '';
            $usuario->login = $body['login'] ?? '';
            $usuario->senha = $body['senha'] ?? '';
            $usuario->foto_path = $body['foto_path'] ?? '';
            foreach ($campos_obrigatórios as $campo) {
                if (empty($usuario->{$campo})) {
                    throw new \Exception("o campo {$campo} é obrigatório");
                }
            }
            $usuario->update();
        } catch (\Exception $exception) {
            $response->getBody()->write(json_encode(['message' => $exception->getMessage()]));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }

        $response->getBody()->write(json_encode([
            'message' => 'Usuário autalizado com sucesso!'
        ]));
        return $response->withHeader('Content-Type', 'application/json');
    }
);

// deletando usuário
$app->delete(
    '/usuario/{id}',
    function (Request $request, Response $response, array $args) use ($banco) {
        $id = $args['id'];
        $usuario = new Usuario($banco->getConnection());
        $usuario->delete($id);
        $response->getBody()->write(json_encode(['message' => 'Usuário excluído']));
        return $response->withHeader('Content-Type', 'application/json');
    }
);

$app->post('/login', function (Request $request, Response $response, array $args) use ($banco) {
    $campos_obrigatórios = ['login', "senha"];
    $body = json_decode($request->getBody()->getContents(), true);
    $login_fake = 'caixeta';
    $senha_fake = '123456';

    try {
        foreach ($campos_obrigatórios as $campo) {
            if (!isset($body[$campo]) || empty($body[$campo])) {
                throw new \Exception("Login ou senha não informado");
            }
        }

        if ($body['login'] !== $login_fake || $body['senha'] !== $senha_fake) {
            throw new \Exception("Login ou senha inválidos");
        }

        $response->getBody()->write(json_encode([
            'status' => true,
            'message' => 'Login realizado com sucesso!'
        ]));
        return $response->withHeader('Content-Type', 'application/json');
    } catch (\Exception $exception) {
        $response->getBody()->write(json_encode([
            'status' => false,
            'message' => $exception->getMessage()
        ]));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
    }
});
