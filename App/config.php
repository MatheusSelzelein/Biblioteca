<?php

// 1 diretório base
// 2 onde estão as views
// 3 acesso ao banco de dados

//define o nome do diretorio base alimentando a constante BASE_DIR
define('BASE_DIR', dirname(__FILE__, 2));
//define o caminho da views
define('VIEWS', BASE_DIR . '/App/View');

//o $_env serve como array para armazenar os dados de conexao com o banco
$_ENV['db']['host'] = getenv('DB_HOST');
$_ENV['db']['port'] = getenv('DB_PORT');
$_ENV['db']['user'] = getenv('DB_USER');
$_ENV['db']['pass'] = getenv('DB_PASS');
$_ENV['db']['database'] = getenv('DB_NAME');