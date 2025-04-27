<?php
declare(strict_types=1);

namespace RegisterProducts\App\Http\Controllers;

class AuthController
{
    public function login(): void
    {
        require_once __DIR__ . '/../../Views/auth/login.php';
    }

    public function register(): void
    {
        require_once __DIR__ . '/../../Views/auth/register.php';
    }

    public function logout(): void
    {
        
    }

    public function signIn(): void
    {
        
    }
}
