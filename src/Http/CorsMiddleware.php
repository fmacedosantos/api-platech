<?php

namespace App\Http;

class CorsMiddleware
{
    public static function handle()
    {
        header("Access-Control-Allow-Origin: https://fmacedosantos.github.io");

        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

        header("Access-Control-Allow-Headers: Authorization, Content-Type");

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(204);
            exit;
        }
    }
}
