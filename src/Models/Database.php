<?php

namespace App\Models;

class Database
{
    public static function getConnection()
    {
        $pdo = new \PDO("mysql:dbname=apiphppuro; host=127.0.0.1:3307", "felipe", "123456");

        return $pdo;
    }
}