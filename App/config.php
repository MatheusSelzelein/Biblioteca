<?php

// 1 diretório base
// 2 onde estão as views
// 3 acesso ao banco de dados

//define o nome do diretorio base alimentando a constante BASE_DIR
define('BASE_DIR', dirname(__FILE__, 2));
//define o caminho da views
define('VIEWS', BASE_DIR . '/View');

//o $_env serve como array para armazenar os dados de conexao com o banco
$_ENV['db']['host'] = "localhost:3307";
$_ENV['db']['user'] = "root";
$_ENV['db']['pass'] = "Math@2026";
$_ENV['db']['database'] = "biblioteca";