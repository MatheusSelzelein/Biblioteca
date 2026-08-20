<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/Assets/img/icone-teste.PNG" rel="icon" type="image/PNG">
</head>

<body>

    <div>
        <?php include VIEWS . '/Includes/Menu.php' ?>

    </div>


    <h1> Cadastro de Livro </h1>

    <?= $model->getErrors() ?>

    <form method="post" action="/livro/cadastro" class="p-5">

        <input name="id" type="hidden" value="<?= $model->Id ?>" />

        <div class="mb-3">
            <label for="titulo" class="form-label">Título: </label>
            <input type="text" value="<?= $model->Titulo ?>" class="form-control" name="titulo" id="titulo">
        </div>
        <div class="mb-3">
            <label for="editora" class="form-label">Editora: </label>
            <input type="text" value="<?= $model->Editora ?>" class="form-control" name="editora" id="editora">
        </div>
        <div class="mb-3">
            <label for="ano" class="form-label">Ano: </label>
            <input type="text" value="<?= $model->Ano ?>" class="form-control" name="ano" id="ano">
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN: </label>
            <input type="text" value="<?= $model->Isbn ?>" class="form-control" name="isbn" id="isbn">
        </div>
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria: </label>
            <select class="form-control" name="categoria_id" id="categoria_id">
                <option value="">Selecione uma categoria</option>
                <?php foreach ($model->rows_categorias as $item): ?>
                    <option value="<?= $item->Id ?>" <?= ($item->Id == $model->Categoria_Id) ? 'selected' : '' ?>> 
                        <?= $item->Descricao ?> 
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <p>Autores:</p>

        <div class="mb-3">
            
            <?php foreach ($model->rows_autores as $item): ?>
            <label>    
                <input type="checkbox" name="autores[]" value="<?= $item->Id ?>" <?= (in_array($item->Id, $model->Autores_Id)) ? 'checked' : '' ?>>
                <?= $item->Nome ?>
            </label>
            <br />  
            <?php endforeach; ?>
        
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>