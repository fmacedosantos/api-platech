<?php

namespace App\Models;

use App\Models\Database;

class User extends Database
{
    public static function authentication(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT * FROM users
            WHERE cpf = ? and password = ?
        ");

        $stmt->execute([$data['cpf'], $data['password']]);

        if ($stmt->rowCount() < 1) {
            return false;
        }

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        return [
            'id' => $user['id'],
            'cpf' => $user['cpf'],
        ];
    }
}