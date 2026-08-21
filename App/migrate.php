<?php
require_once 'config.php'; // carrega $_ENV['db']

try {
    $dns = "mysql:host={$_ENV['db']['host']};port={$_ENV['db']['port']};dbname={$_ENV['db']['database']}";
    $pdo = new PDO(
        $dns,
        $_ENV['db']['user'],
        $_ENV['db']['pass'],
        [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );

    echo "Conectado ao banco com sucesso!\n";

} catch (PDOException $e) {
    echo "Erro na migração: " . $e->getMessage() . "\n";
    exit(1);
}
