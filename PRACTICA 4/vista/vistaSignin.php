<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilsUser.css">
    <title>Formulario de signin</title>

</head>
<body>

    <div class="signin-container">
        <h2>Registrar-Se</h2>
        <form action="#" method="POST">
            <input type="text" name="username" class="input-field" placeholder="Nom d'usuari" required>
            <input type="password" name="password" class="input-field" placeholder="Contrasenya" required>
            <input type="submit" value="Sign In" class="signin-btn">
        </form>
        <p></p>
        <form action="../vista/index.php">
            <input type="submit" value="Tornar" class="login-btn">
        </form>
        <div class="signup-link">
            Ja tens compte? <a href="../vista/vistaLogin.php">Inicia la sessió aqui</a>
        </div>
    </div>

</body>
</html>