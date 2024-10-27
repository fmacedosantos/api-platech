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
                return ['error' => 'We couldn\'t authenticate you.'];
            }

            return $user;
        } 
        catch (\PDOException $e) {

            if ($e->getCode() === 1049) {
                return ['error' => 'We couldn\'t connect to the database.'];
            }

            return ['error' => $e->getMessage()];
        }
        catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}