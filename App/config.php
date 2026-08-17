<?php

// 1 diretório base
// 2 onde estão as views
// 3 acesso ao banco de dados

//define o nome do diretorio base alimentando a constante BASE_DIR
define('BASE_DIR', dirname(__FILE__, 2));
//define o caminho da views
define('VIEWS', BASE_DIR . '/App/View');

//o $_env serve como array para armazenar os dados de conexao com o banco
$_ENV['db']['host'] = "altaria.proxy.rlwy.net";
$_ENV['db']['port'] = "59318";
$_ENV['db']['user'] = "root";
$_ENV['db']['pass'] = "DIkQRxUtJFIKyrFPGhAAsKxNQfSTqnJi";
$_ENV['db']['database'] = "biblioteca";