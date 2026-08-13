<?php

namespace App\Model;

use App\DAO\AlunoDAO;

final class Aluno extends Model
{
    public ?int $Id = null;
    public ?string $Nome 
    {
        set
        {
            if(strlen($value) < 3)
            {
                throw new \Exception("O nome do aluno deve ter no mínimo 3 caracteres.");
            }
            $this->Nome = $value;
        }

        get => $this->Nome ?? null;
    }

    public ?string $Ra = null
    {
        set
        {
            if(empty($value))
            {
                throw new \Exception("Preencha o RA do aluno.");
            }
            $this->Ra = $value;
        }

        get => $this->Ra ?? null;
    }
    public ?string $Curso = null
    {
        set
        {
            if(strlen($value) < 3)
            {
                throw new \Exception("O nome do curso deve ter no mínimo 3 caracteres.");
            }
            $this->Curso = $value;
        }

        get => $this->Curso ?? null;
    }

    function save() : Aluno
    {
        return new AlunoDAO()->save($this);
    }

    function getById(int $id) : ?Aluno
    {
        return new AlunoDAO()->selectById($id);
    }

    function getAllRows() : array
    {
        $this->rows = new AlunoDAO()->select();
        return $this->rows;
    }

    function delete(int $id) : bool
    {
        return new AlunoDAO()->delete($id);
    }
}