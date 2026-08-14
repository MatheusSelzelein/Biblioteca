<?php

namespace App\DAO;

use App\Model\Emprestimo;
use PDO;
use Override;

final class EmprestimoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Emprestimo $model): Emprestimo
    {
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Emprestimo $model): Emprestimo
    {
        $sql = "INSERT INTO emprestimo (data_emprestimo,data_devolucao,livro_id,usuario_id, aluno_id) VALUES (?, ?, ?, ?, ?)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Data_Emprestimo);
        $stmt->bindValue(2, $model->Data_Devolucao);
        $stmt->bindValue(3, $model->Livro_Id);
        $stmt->bindValue(4, $model->Usuario_Id);
        $stmt->bindValue(5, $model->Aluno_Id);
        $stmt->execute();

        $model->Id = parent::$conexao->lastInsertId();

        return $model;
    }

    public function update(Emprestimo $model): Emprestimo
    {
        $sql = "UPDATE emprestimo SET data_emprestimo=?, data_devolucao=?, livro_id=?, aluno_id=? WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->Data_Emprestimo);
        $stmt->bindValue(2, $model->Data_Devolucao);
        $stmt->bindValue(3, $model->Livro_Id);
        $stmt->bindValue(5, $model->Aluno_Id);
        $stmt->bindValue(6, $model->Id);
        $stmt->execute();

        return $model;
    }

    public function selectById(int $id): ?Emprestimo
    {
        $sql = "SELECT * FROM emprestimo WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\Emprestimo");
    }

    public function select(): array
    {
        $sql = "SELECT * FROM emprestimo";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        $arr_emprestimo = $stmt->fetchAll(PDO::FETCH_CLASS, "App\Model\Emprestimo");

        foreach ($arr_emprestimo as $item) {
            
            $item->Dados_Aluno = new AlunoDAO()->selectById($item->Aluno_Id);
            $item->Dados_Livro = new LivroDAO()->selectById($item->Livro_Id);

        }

        
        return $arr_emprestimo;
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM emprestimo WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}