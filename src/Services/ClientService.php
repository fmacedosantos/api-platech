<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public static function create(array $data)
    {
        try {
            $success = Client::save($data);
            
            if (!$success) {
                return ['error' => 'Erro ao cadastrar o cliente.'];
            }
            
            return ['message' => 'Cliente cadastrado com sucesso!'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function fetch()
    {
        try {
            return Client::fetch();
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
