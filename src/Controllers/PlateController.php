<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\PlateService;

class PlateController
{
    public function store(Request $request, Response $response)
    {
        $body = $request::body();

        $plateService = PlateService::create($body);

        if (isset($plateService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $plateService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'sucess' => true,
            'data' => $plateService
        ], 201);
    }
}