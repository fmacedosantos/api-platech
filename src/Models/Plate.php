<?php

namespace App\Models;

use App\Models\Database;
use DateTime;

class Plate extends Database
{
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $date = (new DateTime())->format('Y-m-d');

        $stmt = $pdo->prepare("
            INSERT INTO plates (plate, applicant, type, value, paymentMethod, date)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['plate'],
            $data["applicant"],
            $data['type'],
            $data['value'],
            $data['paymentMethod'],
            $date
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    public static function fetch()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare('SELECT * FROM plates');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}