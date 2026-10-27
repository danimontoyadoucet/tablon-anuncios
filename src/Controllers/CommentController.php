<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Post;

class CommentController
{
    private Comment $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }

    public function store()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=showLoginForm");
            exit;
        }

        $id_publicacion = filter_input(INPUT_POST, 'id_publicacion', FILTER_VALIDATE_INT);
        $contenido = trim($_POST['contenido'] ?? '');

        if (!$id_publicacion || $id_publicacion < 1 || $contenido == '') {
            echo "Todos los campos son obligatorios";
            return;
        }

        $post = new Post();

        if (!$post->getById($id_publicacion)) {
            http_response_code(404);
            echo "Publicación no encontrada";
            return;
        }

        $this->comment->insert([
            'id_publicacion' => $id_publicacion,
            'id_usuario' => $_SESSION['user_id'],
            'contenido' => $contenido
        ]);

        header("Location: index.php?controller=post&action=show&id=" . $id_publicacion);
        exit;
    }
}
