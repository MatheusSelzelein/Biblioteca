<?php
// chama o caminho para chamar a classe sem ter q nomear o arquivo sempre
use App\Controller\AlunoController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/' :
        echo "página inicial";
    break;

    case '/aluno' :
        AlunoController::listar();
    break;

    case '/aluno/cadastro' :
        AlunoController::cadastro();
    break;
}