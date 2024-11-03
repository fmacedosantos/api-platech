<?php

namespace App\Services;

use App\Utils\Validator;
use App\Models\User;

class UserService
{
    public static function auth(array $data)
    {
        try {
            $fields = Validator::validate([
                'cpf'=> $data['cpf'] ?? '',
                'password'=> $data['password'] ?? ''
            ]);

            $user = User::authentication($fields);

            if (!$user) {
                return ['error' => 'CPF ou senha incorreto'];
            }

            $token = md5($user['id'] . time());
            $_SESSION['user_token'] = $token;

            return ['token' => $token, 'user' => $user];
        } 
        catch (\PDOException $e) {
            if ($e->getCode() === 1049) {
                return ['error' => 'Não foi possível conectar ao banco de dados.'];
            }
            return ['error' => $e->getMessage()];
        }
        catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
