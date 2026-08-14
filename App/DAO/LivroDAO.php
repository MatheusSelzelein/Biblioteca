<?php

namespace App\DAO;

use App\Model\Livro;
use Override;

final class LivroDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Livro $model): Livro
    {
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Livro $model): Livro
    {
        parent::$conexao->beginTransaction();

        $sql = "INSERT INTO livro (titulo,editora,ano, isbn, categoria_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Titulo);
        $stmt->bindValue(2, $model->Editora);
        $stmt->bindValue(3, $model->Ano);
        $stmt->bindValue(4, $model->Isbn);
        $stmt->bindValue(5, $model->Categoria_Id);
        $stmt->execute();
        $model->Id = parent::$conexao->lastInsertId();

        foreach ($model->Autores_Id as $item) {
            $sql = "INSERT INTO autor_livro (autor_id, livro_id) VALUES (?, ?)";
            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $item);
            $stmt->bindValue(2, $model->Id);
            $stmt->execute();
        }

        parent::$conexao->commit();

        return $model;
    }

    public function update(Livro $model): Livro
    {
        parent::$conexao->beginTransaction();

        $sql = "UPDATE livro SET titulo=?, editora=?, ano=?, isbn=?, categoria_id=? WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Titulo);
        $stmt->bindValue(2, $model->Editora);
        $stmt->bindValue(3, $model->Ano);
        $stmt->bindValue(4, $model->Isbn);
        $stmt->bindValue(5, $model->Categoria_Id);
        $stmt->bindValue(6, $model->Id);
        $stmt->execute();

        $sql = "DELETE FROM autor_livro WHERE livro_id=?";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Id);
        $stmt->execute();
        

        foreach ($model->Autores_Id as $item) {
            $sql = "INSERT INTO autor_livro (autor_id, livro_id) VALUES (?, ?)";
            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $item);
            $stmt->bindValue(2, $model->Id);
            $stmt->execute();
        }

        parent::$conexao->commit();

        return $model;
    }

    public function selectById(int $id): ?Livro
    {
        $sql = "SELECT * FROM livro WHERE id = ?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $model = $stmt->fetchObject("App\Model\Livro");

        $sql = "SELECT * FROM autor_livro WHERE livro_id = ?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $autor_livro = $stmt->fetchAll(DAO::FETCH_CLASS);

        $model->Autores_Id = [];
        
        foreach ($autor_livro as $item)
            $model->Autores_Id[] = $item->Autor_Id;

        

        return $model;
    }

    public function select(): array
    {
        $sql = "SELECT * FROM livro";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Livro");
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM livro WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}