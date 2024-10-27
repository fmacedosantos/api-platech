<?php

namespace App\Models;

define("DB_NAME", "platech");
define("HOST", "127.0.0.1:3307");
define("USERNAME", "felipe");
define("PASSWORD", "123456");

class Database
{

    public static function getConnection()
    {
        $pdo = new \PDO("mysql:dbname=".DB_NAME."; host=".HOST, USERNAME, PASSWORD);

        return $pdo;
    }
}