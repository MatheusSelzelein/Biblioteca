<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Emprestimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/Assets/img/icone-teste.PNG" rel="icon" type="image/PNG">
</head>

<body>

    <div>
        <?php include VIEWS . '/Includes/Menu.php' ?>

    </div>


    <h1> Cadastro de Emprestimo </h1>

    <?= $model->getErrors() ?>

    <form method="post" action="/emprestimo/cadastro" class="p-5">

        <input name="id" type="hidden" value="<?= $model->Id ?>" />


        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno: </label>
            <select class="form-control" name="aluno_id" id="aluno_id">
                <option value="">Selecione um aluno</option>
                <?php foreach ($model->rows_alunos as $item): ?>
                    <option value="<?= $item->Id ?>" <?= ($item->Id == $model->Dados_Aluno?->Id) ? 'selected' : '' ?>>
                        <?= $item->Nome ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="livro_id" class="form-label">Livro: </label>
            <select class="form-control" name="livro_id" id="livro_id">
                <option value="">Selecione um livro</option>
                <?php foreach ($model->rows_livros as $item): ?>
                    <option value="<?= $item->Id ?>" <?= ($item->Id == $model->Dados_Livro?->Id) ? 'selected' : '' ?>>
                        <?= $item->Titulo ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_emprestimo" class="form-label">Data do Empréstimo: </label>
            <input type="date" value="<?= $model->Data_Emprestimo ?>" class="form-control" name="data_emprestimo"
                id="data_emprestimo">
        </div>

        <div class="mb-3">
            <label for="data_devolucao" class="form-label">Data da Devolução: </label>
            <input type="date" value="<?= $model->Data_Devolucao ?>" class="form-control" name="data_devolucao"
                id="data_devolucao">
        </div>



        <button type="submit" class="btn btn-success">Salvar</button>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>