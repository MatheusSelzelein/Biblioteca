<?php

namespace App\Model;

use App\DAO\LivroDAO;
use Exception;

final class Livro extends Model
{
    public ?int $Id = null;

    public array $rows_categorias = [];
    public array $rows_autores = [];

    public $Categoria_Id;

    public $Autores_Id = [];

    public ?string $Titulo = null
    {
        set
        {
            if(strlen($value) < 3)
            {
                throw new Exception("O título do livro deve ter no mínimo 3 caracteres.");
            }
            $this->Titulo = $value;
        }

        get => $this->Titulo ?? null;
    }

    public ?string $Editora = null
    {
        set
        {
            if(empty($value))
            {
                throw new Exception("Preencha a editora do livro.");
            }
            $this->Editora = $value;
        }

        get => $this->Editora ?? null;
    }
    public ?string $Ano = null
    {
        set
        {
            if(strlen($value) < 3)
            {
                throw new Exception("O ano do livro deve ter no mínimo 3 caracteres.");
            }
            $this->Ano = $value;
        }

        get => $this->Ano ?? null;
    }

        public ?string $Isbn = null
    {
        set
        {
            if(strlen($value) < 3)
            {
                throw new Exception("O ISBN do livro deve ter no mínimo 3 caracteres.");
            }
            $this->Isbn = $value;
        }

        get => $this->Isbn ?? null;
    }

    function save() : Livro
    {
        return new LivroDAO()->save($this);
    }

    function getById(int $id) : ?Livro
    {
        return new LivroDAO()->selectById($id);
    }

    function getAllRows() : array
    {
        $this->rows = new LivroDAO()->select();
        return $this->rows;
    }

    function delete(int $id) : bool
    {
        return new LivroDAO()->delete($id);
    }
}