<?php

namespace App\Core;

class Csrf
{
    public static function validar(): void
    {
        $token = $_POST['csrf_token'] ?? '';

        if (
            !is_string($token) ||
            !isset($_SESSION['csrf_token']) ||
            !hash_equals($_SESSION['csrf_token'], $token)
        ) {
            http_response_code(403);
            exit("Token CSRF no válido");
        }
    }
}
