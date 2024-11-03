<?php

namespace App\Models;

class Database
{
    public static function getConnection()
    {
        $dbName = getenv('DB_NAME');
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');
        
        // Conectar ao banco de dados
        $pdo = new \PDO("mysql:dbname=$dbName;host=$host;port=$port", $username, $password);

        return $pdo;
    }
}
