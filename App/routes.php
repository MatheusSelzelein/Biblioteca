<?php
// chama o caminho para chamar a classe sem ter q nomear o arquivo sempre
use App\Controller\{
    AlunoController,
    InicialController,
    LoginController
};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/' :
        InicialController::index();
    break;

    case '/login':
        LoginController::index();
    break;

    case '/logout':
        LoginController::logout();

    case '/aluno' :
        AlunoController::listar();
    break;

    case '/aluno/cadastro' :
        AlunoController::cadastro();
    break;

    case '/aluno/delete' :
        AlunoController::delete();
    break;
}