<?php

namespace App\Model;

use App\DAO\AlunoDAO;

final class Aluno
{
    public $id, $nome, $ra, $curso;

    function save() : Aluno
    {
        return (new AlunoDAO())->save($this);
    }

    function getById(int $id) : ?Aluno
    {
        return (new AlunoDAO())->selectById($id);
    }

    function getAllRows() : array
    {
        return (new AlunoDAO())->select();
    }

    function delete(int $id) : bool
    {
        return (new AlunoDAO())->delete($id);
    }
}