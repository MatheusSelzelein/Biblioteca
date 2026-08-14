<?php
//encapsula o nome
namespace App\Controller;

use App\Model\{
    Emprestimo,
    Aluno,
    Livro,
    Exception
};

final class EmprestimoController extends Controller
{
    public static function index(): void
    {
        parent::isProtected();

        $model = new Emprestimo();

        try {

            $model->getAllRows();

        } catch (Exception $e) {

            $model->setError("Ocorreu um erro ao buscar os empréstimos: ");
            $model->setError($e->getMessage());
        }

        parent::render('/Emprestimo/lista_emprestimo.php', $model);

    }

    public static function cadastro(): void
    {
        parent::isProtected();

        $model = new Emprestimo();

        try {
            if (parent::isPost()) {

                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Data_Emprestimo = $_POST['data_emprestimo'];
                $model->Data_Devolucao = $_POST['data_devolucao'];
                $model->Livro_Id = $_POST['livro_id'];
                $model->Usuario_Id = LoginController::getUsuario()->Id;
                $model->Aluno_Id = $_POST['aluno_id'];
                $model->save();

                parent::redirect("/emprestimo");

            } else {

                if (isset($_GET['id'])) {
                    $model = $model->getById((int) $_GET['id']);
                }
            }

        } catch (Exception $e) {
            $model->setError($e->getMessage());
        }
        $model->rows_alunos = new Aluno()->getAllRows();
        $model->rows_livros = new Livro()->getAllRows();

        parent::render('/Emprestimo/form_emprestimo.php', $model);

    }

    public static function delete(): void
    {
        parent::isProtected();

        $model = new Emprestimo();
        try {
            $model->delete((int) $_GET['id']);
            parent::redirect("/emprestimo");

        } catch (Exception $e) {

            $model->setError("Ocorreu um erro ao excluir o empréstimo: ");
            $model->setError($e->getMessage());
        }

        parent::render('/Emprestimo/lista_emprestimo.php', $model);

    }

}