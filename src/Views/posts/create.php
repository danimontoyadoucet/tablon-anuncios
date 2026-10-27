
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear publicación</title>
</head>
<body>

    <h1>Nueva publicación</h1>

    <form action="index.php?controller=post&action=store" method="POST">

        <label>Título:</label>
        <input type="text" name="titulo" required>
        <br><br>

        <label>Contenido:</label>
        <textarea name="cuerpo" required></textarea>
        <br><br>

        <label>Categoría:</label>

        <select name="id_categoria" required>
            <option value="">Selecciona una categoría</option>

            <?php foreach ($categorias ?? [] as $categoria): ?>
                <option value="<?= (int) $categoria['id_categoria'] ?>">
                    <?= htmlspecialchars($categoria['nombre'], ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>

        </select>

        <br><br>

        <button type="submit">Publicar</button>

    </form>

    <p>
        <a href="index.php?controller=post&action=index">
            Volver a publicaciones
        </a>
    </p>

</body>
</html>
