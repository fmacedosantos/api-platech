<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\UserService;

class UserController
{
    public function login(Request $request, Response $response)
    {
        $body = $request::body();

        $userService = UserService::auth($body);

        if (isset($userService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'jwt' => $userService
        ], 200);
        return;
    }

    public function store(Request $request, Response $response)
    {
        $body = $request::body();

        $userService = UserService::create($body);

        if (isset($userService['error'])) {
            return $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'User registered successfully'
        ], 201);
        return;
    }
}