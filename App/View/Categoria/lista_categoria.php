<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Lista de Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/assets/img/icone-teste.PNG" rel="icon" type="image/png">
</head>

<body>

    <div>
        <?php include VIEWS . '/Includes/Menu.php' ?>

    </div>


    <h1> Lista de Categorias </h1>

    <a href="/categoria/cadastro"> Nova Categoria</a>

    <?= $model->getErrors() ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($model->rows as $categoria): ?> 
            <tr>
                <td> <?= $categoria->Id ?> </td>
                <td> <a href="/categoria/cadastro?id=<?= $categoria->Id ?>"><?= $categoria->Descricao ?></a> </td>
                <td> <a href="/categoria/delete?id=<?= $categoria->Id ?>">Remover</a> </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>