<?php

namespace App\Controllers;

use App\Models\Post;

class PostController
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $busqueda = trim($_GET['busqueda'] ?? '');

        $publicaciones = $this->post->buscar($busqueda);

        require __DIR__ . '/../Views/posts/index.php';
    }

    public function show()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            http_response_code(400);
            echo "ID no válido";
            return;
        }

        $publicacion = $this->post->obtenerConDetalles($id);

        if (!$publicacion) {
            http_response_code(404);
            echo "Publicación no encontrada";
            return;
        }

        require __DIR__ . '/../Views/posts/show.php';
    }

public function create()
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?controller=auth&action=showLoginForm");
        exit;
    }

    $categorias = $this->post->obtenerCategorias();

    require __DIR__ . '/../Views/posts/create.php';
}

public function store()
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?controller=auth&action=showLoginForm");
        exit;
    }

    $titulo = trim($_POST['titulo'] ?? '');
    $cuerpo = trim($_POST['cuerpo'] ?? '');
    $id_categoria = (int) ($_POST['id_categoria'] ?? 0);

    if ($titulo == '' || $cuerpo == '' || $id_categoria <= 0) {
        echo "Todos los campos son obligatorios";
        return;
    }

    $this->post->insert([
        'titulo' => $titulo,
        'cuerpo' => $cuerpo,
        'id_categoria' => $id_categoria,
        'id_usuario' => $_SESSION['user_id']
    ]);

    header("Location: index.php?controller=post&action=index");
    exit;
    }

}
