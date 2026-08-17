<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/assets/img/icone-teste.PNG" rel="icon" type="image/png">
    </head>

<body>

    <div>
        <?php include VIEWS . '/Includes/Menu.php' ?>

    </div>


    <h1> Cadastro de Autores </h1>

    <?= $model->getErrors() ?>

    <form method="post" action="/autor/cadastro" class="p-5">

        <input name="id" type="hidden" value="<?= $model->Id ?>" />

        <div class="mb-3">
            <label for="nome" class="form-label">Nome: </label>
            <input type="text" value="<?= $model->Nome ?>" class="form-control" name="nome" id="nome">
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF: </label>
            <input type="text" value="<?= $model->CPF ?>" class="form-control" name="cpf" id="cpf">
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento: </label>
            <input type="date" value="<?= $model->Data_Nascimento ?>" class="form-control" name="data_nascimento" id="data_nascimento">
        </div>


        <button type="submit" class="btn btn-success">Salvar</button>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>