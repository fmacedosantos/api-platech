<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\ClientService;

class ClientController
{
    public function store(Request $request, Response $response)
    {
        $body = $request::body();

        $clientService = ClientService::create($body);

        if (isset($clientService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $clientService['error']
            ], 400);
        }

        return $response::json([
            'error' => false,
            'success' => true,
            'data' => $clientService
        ], 201);
    }

    public function fetch(Request $request, Response $response)
    {
        $clientService = ClientService::fetch();

        if (isset($clientService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $clientService['error']
            ], 400);
        }

        return $response::json([
            'error' => false,
            'success' => true,
            'data' => $clientService
        ], 200);
    }
}
