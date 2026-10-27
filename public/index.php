<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Models\User;

$user = new User();

$usuarios = $user->getAll();

echo "<pre>";
print_r($usuarios);
echo "</pre>";
