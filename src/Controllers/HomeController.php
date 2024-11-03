<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Models\Database;

class HomeController extends Database
{
    public function create(Request $request, Response $response)
    {
        $pdo = Database::getConnection();

        $queries = [
            'plates' => "
                CREATE TABLE IF NOT EXISTS plates (
                    id SERIAL PRIMARY KEY,
                    plate VARCHAR(7) NOT NULL UNIQUE,
                    applicant TEXT NOT NULL,
                    type TEXT NOT NULL,
                    value DECIMAL(8, 2) NOT NULL,
                    paymentMethod VARCHAR(25) NOT NULL,
                    date DATE NOT NULL
                )
            ",
            'users' => "
                CREATE TABLE IF NOT EXISTS users (
                    id SERIAL PRIMARY KEY,
                    cpf VARCHAR(14) UNIQUE NOT NULL,
                    password VARCHAR(255) NOT NULL
                )
            ",
            'clients' => "
                CREATE TABLE IF NOT EXISTS clients (
                    id SERIAL PRIMARY KEY,
                    applicant TEXT NOT NULL,
                    company TEXT NOT NULL,
                    phone VARCHAR(15) NOT NULL UNIQUE,
                    registerType VARCHAR(25) NOT NULL,
                    priceCar DECIMAL(8, 2) NOT NULL,
                    priceMotorcycle DECIMAL(8, 2) NOT NULL
                )
            "
        ];

        try {
            foreach ($queries as $table => $query) {
                $pdo->exec($query);
            }

            return $response::json([
                'error' => false,
                'success' => true,
                'message' => 'Tables created successfully or already exist.'
            ], 200);
        } catch (\PDOException $e) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => 'Failed to create tables: ' . $e->getMessage()
            ], 500);
        }
    }
}
