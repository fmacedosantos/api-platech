<?php

namespace App\Models;

use App\Models\Database;
use DateTime;

class Client extends Database
{
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO clients (applicant, company, phone, registerType, priceCar, priceMotorcycle)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['applicant'],
            $data['company'],
            $data['phone'],
            $data['registerType'],
            $data['priceCar'],
            $data['priceMotorcycle']
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    public static function fetch()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare('SELECT * FROM clients');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
