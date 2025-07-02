<?php

namespace App\Models;

class Sessao
{
    private static $sessao = null;

    protected function __construct($login){
        start_session();
        $this->sessao =  [
            'logado' => $login
        ];

        $_SESSION = $this->sessao;
    }

    public function getSessao($login)
    {
        if(is_null($this->sessao)){
            new self($login);
        }
        return $this->sessao;
    }

}