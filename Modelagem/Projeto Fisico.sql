CREATE DATABASE CRUDMVC;
USE CRUDMVC;

-- ===========================
-- TABELA AUTOR    ***********
-- ===========================
CREATE TABLE Autor (
    Id INT AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    CPF CHAR(11) UNIQUE,
    Data_Nascimento DATE,
    PRIMARY KEY (Id)
);

-- ===========================
-- TABELA CATEGORIA   ********
-- ===========================
CREATE TABLE Categoria (
    Id INT AUTO_INCREMENT,
    Descricao VARCHAR(100),
    PRIMARY KEY (Id)
);

-- ===========================
-- TABELA LIVRO    ***********
-- ===========================
CREATE TABLE Livro (
    Id INT AUTO_INCREMENT,
    Titulo VARCHAR(200) NOT NULL,
    Editora VARCHAR(150) NOT NULL,
    Ano YEAR NOT NULL,
	Isbn VARCHAR(100) UNIQUE,
    Categoria_Id INT NOT NULL,
    PRIMARY KEY (Id),

    FOREIGN KEY (Categoria_Id)
        REFERENCES Categoria(Id)
);

-- ===========================
-- RELAÇÃO AUTOR x LIVRO
-- (N:N)           ***********
-- ===========================
CREATE TABLE Autor_Livro (
    Autor_Id INT NOT NULL,
    Livro_Id INT NOT NULL,

    PRIMARY KEY (Autor_Id, livro_Id),

    FOREIGN KEY (autor_Id)
        REFERENCES Autor(Id)
        ON DELETE CASCADE,

    FOREIGN KEY (livro_id)
        REFERENCES Livro(id)
        ON DELETE CASCADE
);

-- ===========================
-- TABELA USUARIO    *********
-- ===========================
CREATE TABLE Usuario (
    id INT AUTO_INCREMENT,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150) UNIQUE,
    senha VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
);

-- ===========================
-- TABELA ALUNO    ***********
-- ===========================
CREATE TABLE Aluno (
    id INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    ra INT UNIQUE,
    curso VARCHAR(100),
    PRIMARY KEY (id)
);

-- ===========================
-- TABELA EMPRESTIMO   *******
-- ===========================
CREATE TABLE Emprestimo (
    id INT AUTO_INCREMENT,
    data_emprestimo DATE NOT NULL,
    data_devolucao DATE,

    livro_id INT NOT NULL,
    usuario_id INT NOT NULL,
    aluno_id INT NOT NULL,
    
	PRIMARY KEY (id),
    
    FOREIGN KEY (livro_id)
        REFERENCES Livro(id),

    FOREIGN KEY (usuario_id)
        REFERENCES Usuario(id),

    FOREIGN KEY (aluno_id)
        REFERENCES Aluno(id)
);