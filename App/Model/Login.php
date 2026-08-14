<?php

namespace App\Model;

use App\DAO\LoginDAO;

final class Login
{
    public $Email, $Senha, $Nome, $Id;

    public function logar() : ?Login
    {
        return new LoginDAO()->autenticar($this);
    }

}