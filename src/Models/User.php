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
            WHERE cpf = ?
        ");

        $stmt->execute([$data['cpf']]);

        if ($stmt->rowCount() < 1) {
            return false;
        }

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!password_verify($data['password'], $user['password'])) {
            return false;
        }

        return [
            'id' => $user['id'],
            'cpf' => $user['cpf'],
        ];
    }

    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            INSERT INTO users (cpf, password)
            VALUES (?, ?)
        ");

        $stmt->execute([
            $data['cpf'],
            $hashedPassword
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }
}
