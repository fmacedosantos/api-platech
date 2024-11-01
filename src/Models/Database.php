<?php

namespace App\Models;

define("DB_NAME", "platech");
define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");

class Database
{

    public static function getConnection()
    {
        $pdo = new \PDO("mysql:dbname=".DB_NAME."; host=".HOST, USERNAME, PASSWORD);

        return $pdo;
    }
}