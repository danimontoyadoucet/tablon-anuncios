<?php

namespace App\Models;

class User extends BaseModel
{
    protected string $table = 'usuarios';
    protected string $primaryKey = 'id_usuario';

    public function findByEmail(string $email, string $password): ?int
    {
        $usuario = $this->db->fetchOne(
            "SELECT * FROM usuarios WHERE email = :email",
            ['email' => $email]
        );

        if ($usuario && password_verify($password, $usuario['password'])) {
            return (int) $usuario['id_usuario'];
        }

        return null;
    }
}
