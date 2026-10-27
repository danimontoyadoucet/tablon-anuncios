<?php

namespace App\Models;

use App\Core\Database;

abstract class BaseModel
{
    protected Database $db;
    protected string $table;
    protected string $primaryKey;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll(): ?array
    {
        return $this->db->fetchAll("SELECT * FROM {$this->table}");
    }

    public function getById(int $id): ?array
    {
        return $this->db->fetchOne(
            "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id",
            ['id' => $id]
        );
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->query(
            "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id",
            ['id' => $id]
        );

        return $stmt->rowCount() > 0;
    }

    public function insert(array $data): bool
    {
        $columnas = implode(', ', array_keys($data));
        $parametros = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ($columnas) VALUES ($parametros)";

        $stmt = $this->db->query($sql, $data);

        return $stmt->rowCount() > 0;
    }

    public function update(int $id, array $data): bool
    {
        $campos = [];

        foreach ($data as $columna => $valor) {
            $campos[] = "$columna = :$columna";
        }

        $set = implode(', ', $campos);

        $sql = "UPDATE {$this->table} SET $set WHERE {$this->primaryKey} = :id";

        $data['id'] = $id;

        $stmt = $this->db->query($sql, $data);

        return $stmt->rowCount() > 0;
    }
}
