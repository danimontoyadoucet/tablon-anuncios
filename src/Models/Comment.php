<?php

namespace App\Models;

class Comment extends BaseModel
{
    protected string $table = 'comentarios';
    protected string $primaryKey = 'id_comentario';

    public function obtenerPorPublicacion(int $id): ?array
    {
        $sql = "SELECT c.*, u.nombre AS autor
                FROM comentarios c
                JOIN usuarios u ON c.id_usuario = u.id_usuario
                WHERE c.id_publicacion = :id
                ORDER BY c.fecha_comentario ASC";

        return $this->db->fetchAll($sql, ['id' => $id]);
    }
}
