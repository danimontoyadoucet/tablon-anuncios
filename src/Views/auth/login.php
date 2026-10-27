
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
</head>
<body>

    <h1>Iniciar sesión</h1>

    <form action="index.php?controller=auth&action=login" method="POST">

        <label>Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit">Entrar</button>

    </form>

    <p>
        ¿No tienes cuenta?
        <a href="index.php?controller=auth&action=showRegisterForm">
            Registrarse
        </a>
    </p>

</body>
</html>
