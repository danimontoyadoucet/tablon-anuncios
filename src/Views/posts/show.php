
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver publicación</title>
</head>
<body>

    <h1>
        <?= htmlspecialchars($publicacion['titulo'], ENT_QUOTES, 'UTF-8') ?>
    </h1>

    <p>
        Autor:
        <?= htmlspecialchars($publicacion['autor'], ENT_QUOTES, 'UTF-8') ?>
    </p>

    <p>
        Categoría:
        <?= htmlspecialchars($publicacion['categoria'], ENT_QUOTES, 'UTF-8') ?>
    </p>

    <p>
        Fecha:
        <?= htmlspecialchars($publicacion['fecha_publicacion'], ENT_QUOTES, 'UTF-8') ?>
    </p>

    <hr>

    <p>
        <?= nl2br(htmlspecialchars($publicacion['cuerpo'], ENT_QUOTES, 'UTF-8')) ?>
    </p>

    <hr>


    
    <?php if (
        isset($_SESSION['user_id']) &&
        $_SESSION['user_id'] == $publicacion['id_usuario']
    ):   ?>

        <p>
            <a href="index.php?controller=post&action=edit&id=<?= (int) $publicacion['id_publicacion'] ?>">
                Editar publicación
            </a>
        </p>

        <form action="index.php?controller=post&action=destroy" method="POST">

            <input type="hidden" name="id"
                value="<?= (int) $publicacion['id_publicacion'] ?>">

            <button type="submit">Eliminar publicación</button>

        </form>

    <?php endif; ?>


<hr>

    <h2>Comentarios</h2>

    <?php if ($comentarios): ?>

        <?php foreach ($comentarios as $comentario): ?>

            <p>
                <strong>
                    <?= htmlspecialchars($comentario['autor'], ENT_QUOTES, 'UTF-8') ?>
                </strong>
            </p>

            <p>
                <?= nl2br(htmlspecialchars($comentario['contenido'], ENT_QUOTES, 'UTF-8')) ?>
            </p>

            <p>
                Fecha:
                <?= htmlspecialchars($comentario['fecha_comentario'], ENT_QUOTES, 'UTF-8') ?>
            </p>

            <hr>

        <?php endforeach; ?>

    <?php else: ?>

        <p>Esta publicación todavía no tiene comentarios.</p>

    <?php endif; ?>


    <?php if (isset($_SESSION['user_id'])): ?>

        <h3>Añadir comentario</h3>

        <form action="index.php?controller=comment&action=store" method="POST">


            <input type="hidden" name="csrf_token"
                value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">


            <input type="hidden" name="id_publicacion"
               value="<?= (int) $publicacion['id_publicacion'] ?>">

            <textarea name="contenido" required></textarea>

            <br><br>

            <button type="submit">Enviar comentario</button>

        </form>

    <?php else: ?>

        <p>
            <a href="index.php?controller=auth&action=showLoginForm">
                Inicia sesión
            </a>
            para escribir un comentario.
        </p>

    <?php endif; ?>





    <a href="index.php?controller=post&action=index">
        Volver a publicaciones
    </a>

</body>
</html>
