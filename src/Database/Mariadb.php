<?php

namespace App\Database;

class Mariadb
{
    private string $host = ""; // endereço do servidor
    private string $dbname = ""; // nome do banco
    private string $username = ""; // usuário do banco
    private string $password = ""; // senha do usuário do banco
    private ?\PDO $connection = null; // conexão com o banco

    public function __construct()
    {

        $this->host     = $_ENV['DB_HOST']     ?? throw new \RuntimeException('DB_HOST não definido');
        $this->dbname   = $_ENV['DB_NAME']     ?? throw new \RuntimeException('DB_NAME não definido');
        $this->username = $_ENV['DB_USER']     ?? throw new \RuntimeException('DB_USER não definido');
        $this->password = $_ENV['DB_PASS']     ?? throw new \RuntimeException('DB_PASS não definido');
        try {
            $this->connection = new \PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->username,
                $this->password,
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (\PDOException $erro) {
            die("Erro de conexão: " . $erro->getMessage());
        }
    }

    public function getConnection(): ?\PDO
    {
        return $this->connection;
    }
}
