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

    // Exemplo de migração: criar tabela 'usuarios'
    $sqlUsuarios = "
        CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            senha VARCHAR(255) NOT NULL,
            criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ";
    $pdo->exec($sqlUsuarios);
    echo "Tabela 'usuarios' criada ou já existente.\n";

    // Exemplo de migração: criar tabela 'livros'
    $sqlLivros = "
        CREATE TABLE IF NOT EXISTS livros (
            id INT AUTO_INCREMENT PRIMARY KEY,
            titulo VARCHAR(255) NOT NULL,
            autor VARCHAR(255) NOT NULL,
            ano INT NOT NULL,
            criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ";
    $pdo->exec($sqlLivros);
    echo "Tabela 'livros' criada ou já existente.\n";

    // Exemplo de migração: criar tabela 'emprestimos'
    $sqlEmprestimos = "
        CREATE TABLE IF NOT EXISTS emprestimos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario_id INT NOT NULL,
            livro_id INT NOT NULL,
            data_emprestimo DATE NOT NULL,
            data_devolucao DATE,
            FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
            FOREIGN KEY (livro_id) REFERENCES livros(id)
        );
    ";
    $pdo->exec($sqlEmprestimos);
    echo "Tabela 'emprestimos' criada ou já existente.\n";

} catch (PDOException $e) {
    echo "Erro na migração: " . $e->getMessage() . "\n";
    exit(1);
}
