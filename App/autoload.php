<?php
//cria o caminho para o diretorio da classe
spl_autoload_register(function ($nome_da_classe)
{
    $arquivo = BASE_DIR . "/" . $nome_da_classe . ".php";

    //echo $arquivo;
//verifica se o arquivo existe
    if(file_exists($arquivo))
        include $arquivo;
    else 
        throw new Exception("Arquivo não Encontrado");
});