<?php

namespace App\Models;

use App\Models\Database;

class User extends Database
{
    public static function authentication(array $data)
 {
    $pdo = self::getConnection();

    error_log("CPF enviado: " . $data['cpf']);
    error_log("Senha enviada: " . $data['password']);

    $stmt = $pdo->prepare("
        SELECT * FROM users
        WHERE cpf = ? and password = ?
    ");

    $stmt->execute([$data['cpf'], $data['password']]);

    if ($stmt->rowCount() < 1) {
        error_log("Nenhum usuário encontrado com essas credenciais.");
        return false;
    }

    $user = $stmt->fetch(\PDO::FETCH_ASSOC);

    return [
        'id' => $user['id'],
        'cpf' => $user['cpf'],
    ];
 }
}
