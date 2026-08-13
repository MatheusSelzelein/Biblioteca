<?php

namespace App\Model;

use App\DAO\AutorDAO;

final class Autor extends Model
{
    public ?int $Id = null;
    public ?string $Nome 
    {
        set
        {
            if(strlen($value) < 3)
            {
                throw new \Exception("O nome do autor deve ter no mínimo 3 caracteres.");
            }
            $this->Nome = $value;
        }

        get => $this->Nome ?? null;
    }

    public ?string $CPF = null
    {
        set
        {
            if(empty($value))
            {
                throw new \Exception("Preencha o CPF do autor.");
            }
            $this->CPF = $value;
        }

        get => $this->CPF ?? null;
    }

    public ?string $Data_Nascimento = null
    {
        set
        {
        
            if(empty($value))
            {
                throw new \Exception("Preencha a data de nascimento do autor.");
            }
            $this->Data_Nascimento = $value;
        }

        get => $this->Data_Nascimento ?? null;
    }


    function save() : Autor
    {
        return new AutorDAO()->save($this);
    }

    function getById(int $id) : ?Autor
    {
        return new AutorDAO()->selectById($id);
    }

    function getAllRows() : array
    {
        $this->rows = new AutorDAO()->select();
        return $this->rows;
    }

    function delete(int $id) : bool
    {
        return new AutorDAO()->delete($id);
    }
}