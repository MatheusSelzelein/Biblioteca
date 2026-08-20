<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/Assets/img/icone-teste.PNG" rel="icon" type="image/PNG">
</head>

<body>

    <div>
        <?php include VIEWS . '/Includes/Menu.php' ?>

    </div>


    <h1> Cadastro de Categoria </h1>

    <?= $model->getErrors() ?>

    <form method="post" action="/categoria/cadastro" class="p-5">

        <input name="id" type="hidden" value="<?= $model->Id ?>" />

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição: </label>
            <input type="text" value="<?= $model->Descricao ?>" class="form-control" name="descricao" id="descricao">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>