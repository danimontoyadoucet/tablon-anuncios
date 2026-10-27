<?php

namespace App\Models;

class Post extends BaseModel
{
    protected string $table = 'publicaciones';
    protected string $primaryKey = 'id_publicacion';

    public function buscar(string $busqueda): ?array
    {
        $sql = "SELECT p.*, c.nombre AS categoria,
                       u.nombre AS autor
                FROM publicaciones p
                JOIN categorias c ON p.id_categoria = c.id_categoria
                JOIN usuarios u ON p.id_usuario = u.id_usuario
                WHERE p.titulo LIKE :busqueda
                   OR c.nombre LIKE :categoria
                ORDER BY p.fecha_publicacion DESC";

        return $this->db->fetchAll($sql, [
            'busqueda' => "%$busqueda%",
            'categoria' => "%$busqueda%"
        ]);
    }

    public function obtenerConDetalles(int $id): ?array
    {
        $sql = "SELECT p.*, c.nombre AS categoria,
                       u.nombre AS autor
                FROM publicaciones p
                JOIN categorias c ON p.id_categoria = c.id_categoria
                JOIN usuarios u ON p.id_usuario = u.id_usuario
                WHERE p.id_publicacion = :id";

        return $this->db->fetchOne($sql, ['id' => $id]);
    }


    public function obtenerCategorias(): ?array {
        return $this->db->fetchAll("SELECT * FROM categorias");
    }

}
