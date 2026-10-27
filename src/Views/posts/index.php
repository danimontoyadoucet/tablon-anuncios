
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Publicaciones</title>
</head>
<body>

    <h1>Tablón de anuncios</h1>

    <a href="index.php">Inicio</a>


    <?php if (isset($_SESSION['user_id'])): ?>

        <p>
            <a href="index.php?controller=post&action=create">
                Crear publicación
            </a>
        </p>

    <?php endif; ?>


    <h2>Publicaciones</h2>

    <form action="index.php" method="GET">
        <input type="hidden" name="controller" value="post">
        <input type="hidden" name="action" value="index">

        <input type="text" name="busqueda"
               placeholder="Buscar publicación"
               value="<?= htmlspecialchars($busqueda, ENT_QUOTES, 'UTF-8') ?>">

        <button type="submit">Buscar</button>
    </form>

    <hr>

    <?php if ($publicaciones): ?>

        <?php foreach ($publicaciones as $publicacion): ?>

            <h3>
                <?= htmlspecialchars($publicacion['titulo'], ENT_QUOTES, 'UTF-8') ?>
            </h3>

            <p>
                Autor:
                <?= htmlspecialchars($publicacion['autor'], ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Categoría:
                <?= htmlspecialchars($publicacion['categoria'], ENT_QUOTES, 'UTF-8') ?>
            </p>

            <a href="index.php?controller=post&action=show&id=<?= $publicacion['id_publicacion'] ?>">
                Ver publicación
            </a>

            <hr>

        <?php endforeach; ?>

    <?php else: ?>

        <p>No se han encontrado publicaciones.</p>

    <?php endif; ?>

</body>
</html>
