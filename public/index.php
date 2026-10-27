<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;

$db = new Database();

$usuarios = $db->fetchAll("SELECT id_usuario, nombre FROM usuarios");

echo "Conexion correcta a MySQL";

echo "<pre>";
print_r($usuarios);
echo "</pre>";
