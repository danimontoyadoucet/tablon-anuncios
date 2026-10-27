<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\PostController;
use App\Controllers\CommentController;

session_start();


if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


$controller = $_GET['controller'] ?? '';
$action = $_GET['action'] ?? '';

if ($controller == 'auth') {

    $auth = new AuthController();

    if ($action == 'showRegisterForm') {
        $auth->showRegisterForm();

    } elseif ($action == 'register' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $auth->register();

    } elseif ($action == 'showLoginForm') {
        $auth->showLoginForm();

    } elseif ($action == 'login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $auth->login();

    } elseif ($action == 'logout' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $auth->logout();

    } else {
        http_response_code(404);
        echo "Página no encontrada";
    }


}  elseif ($controller == 'post') {

    $postController = new PostController();

    if ($action == 'index') {
        $postController->index();

    } elseif ($action == 'show') {
        $postController->show();

    } elseif ($action == 'create') {
        $postController->create();

    } elseif ($action == 'store' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $postController->store();

    } elseif ($action == 'edit') {
        $postController->edit();

    } elseif ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $postController->update();

    } elseif ($action == 'destroy' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $postController->destroy();

    } else {
        http_response_code(404);
        echo "Página no encontrada";
    }


} elseif ($controller == 'comment') {

    $commentController = new CommentController();

    if ($action == 'store' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $commentController->store();

    } else {
        http_response_code(404);
        echo "Página no encontrada";
    }



} else {

    echo "<h1>Tablón de anuncios</h1>";

    if (isset($_SESSION['user_id'])) {

        echo "<p>Bienvenido: " . htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') . "</p>";

        echo '<form action="index.php?controller=auth&action=logout" method="POST">
                <button type="submit">Cerrar sesión</button>
              </form>';

    } else {

        echo '<a href="index.php?controller=auth&action=showLoginForm">Iniciar sesión</a>';
        echo " | ";
        echo '<a href="index.php?controller=auth&action=showRegisterForm">Registrarse</a>';

    }

    echo '<p><a href="index.php?controller=post&action=index">Ver publicaciones</a></p>';
}
