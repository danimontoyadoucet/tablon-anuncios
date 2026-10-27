<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showRegisterForm()
    {
        require __DIR__ . '/../Views/auth/register.php';
    }

    public function register()
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($nombre == '' || $email == '' || $password == '') {
            echo "Todos los campos son obligatorios";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "El email no es válido";
            return;
        }

        $db = new \App\Core\Database();

        $existe = $db->fetchOne(
            "SELECT id_usuario FROM usuarios WHERE email = :email",
            ['email' => $email]
        );

        if ($existe) {
            echo "Este correo ya está registrado";
            return;
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $this->user->insert([
            'nombre' => $nombre,
            'email' => $email,
            'password' => $passwordHash
        ]);

        header("Location: index.php?controller=auth&action=showLoginForm");
        exit;
    }

    public function showLoginForm()
    {
        require __DIR__ . '/../Views/auth/login.php';
    }

    public function login()
    {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $id = $this->user->findByEmail($email, $password);

        if ($id !== null) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            session_regenerate_id(true);

            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;

            header("Location: index.php");
            exit;
        }

        echo "Email o contraseña incorrectos";
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];
        session_destroy();

        header("Location: index.php");
        exit;
    }
}
