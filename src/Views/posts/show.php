
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
    ):  ?>

    <p>
        <a href="index.php?controller=post&action=edit&id=<?= (int) $publicacion['id_publicacion'] ?>">
            Editar publicación
        </a>
    </p>

    <?php endif; ?>


    <a href="index.php?controller=post&action=index">
        Volver a publicaciones
    </a>

</body>
</html>
