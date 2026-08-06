<?php 

namespace  App\DAO;

use PDO;

abstract class DAO extends PDO
{
    protected static ?PDO $conexao = null;

    public function __construct()
    {
       $dns = "mysql:host={$_ENV['db']['host']};port={$_ENV['db']['port']};dbname={$_ENV['db']['database']}";

        if(self::$conexao == null)
            
        {        
            self::$conexao = new PDO(
            $dns,
            $_ENV['db']['user'],
            $_ENV['db']['pass'],
            [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
            ]
            );
        }
    }
}