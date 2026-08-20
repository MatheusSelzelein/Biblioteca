<?php
// chama o caminho para chamar a classe sem ter q nomear o arquivo sempre
use App\Controller\{
    AlunoController,
    InicialController,
    LoginController,
    AutorController,
    CategoriaController,
    LivroController,
    EmprestimoController
};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/Assets/css/library.css':
    case '/Assets/js/library.js':
        $arquivo = BASE_DIR . '/App' . $url;
        if (is_file($arquivo)) {
            header('Content-Type: ' . (substr($url, -4) === '.css' ? 'text/css; charset=UTF-8' : 'application/javascript; charset=UTF-8'));
            header('Cache-Control: public, max-age=3600');
            readfile($arquivo);
        } else {
            http_response_code(404);
        }
        exit;

    case '/Assets/img/imagem-background.jfif':
        $imagem = BASE_DIR . '/App/Assets/img/imagem-background.jfif';
        if (is_file($imagem)) {
            header('Content-Type: image/jpeg');
            header('Cache-Control: public, max-age=86400');
            readfile($imagem);
        } else {
            http_response_code(404);
        }
        exit;

    case '/Assets/img/icone-teste.PNG':
        $arquivo = BASE_DIR . '/App/Assets/img/icone-teste.PNG';
        if (is_file($arquivo)) {
            header('Content-Type: image/PNG');
            readfile($arquivo);
        } else {
            http_response_code(404);
        }
        exit;

    case '/':
        InicialController::index();
        break;

    case '/login':
        LoginController::index();
        break;

    case '/logout':
        LoginController::logout();

    case '/aluno':
        AlunoController::index();
        break;

    case '/aluno/cadastro':
        AlunoController::cadastro();
        break;

    case '/aluno/delete':
        AlunoController::delete();
        break;

    case '/autor':
        AutorController::index();
        break;

    case '/autor/cadastro':
        AutorController::cadastro();
        break;

    case '/autor/delete':
        AutorController::delete();
        break;

    case '/categoria':
        CategoriaController::index();
        break;

    case '/categoria/cadastro':
        CategoriaController::cadastro();
        break;

    case '/categoria/delete':
        CategoriaController::delete();
        break;

    case '/livro':
        LivroController::index();
        break;

    case '/livro/cadastro':
        LivroController::cadastro();
        break;

    case '/livro/delete':
        LivroController::delete();
        break;

    case '/emprestimo':
        EmprestimoController::index();
        break;

    case '/emprestimo/cadastro':
        EmprestimoController::cadastro();
        break;

    case '/emprestimo/delete':
        EmprestimoController::delete();
        break;

}