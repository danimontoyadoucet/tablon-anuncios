
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar publicación</title>
</head>
<body>

    <h1>Editar publicación</h1>

    <form action="index.php?controller=post&action=update" method="POST">

        <input type="hidden" name="id"
               value="<?= (int) $publicacion['id_publicacion'] ?>">

        <label>Título:</label>
        <input type="text" name="titulo"
               value="<?= htmlspecialchars($publicacion['titulo'], ENT_QUOTES, 'UTF-8') ?>"
               required>

        <br><br>

        <label>Contenido:</label>
        <textarea name="cuerpo" required><?= htmlspecialchars($publicacion['cuerpo'], ENT_QUOTES, 'UTF-8') ?></textarea>

        <br><br>

        <label>Categoría:</label>

        <select name="id_categoria" required>

            <?php foreach ($categorias ?? [] as $categoria): ?>

                <option value="<?= (int) $categoria['id_categoria'] ?>"
                    <?= $categoria['id_categoria'] == $publicacion['id_categoria'] ? 'selected' : '' ?>>

                    <?= htmlspecialchars($categoria['nombre'], ENT_QUOTES, 'UTF-8') ?>

                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <button type="submit">Guardar cambios</button>

    </form>

    <p>
        <a href="index.php?controller=post&action=show&id=<?= (int) $publicacion['id_publicacion'] ?>">
            Cancelar
        </a>
    </p>

</body>
</html>
