<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilsUser.css">
    <title>Formulario de Login</title>
</head>
<body>

    <div class="login-container">
        <h2>Iniciar Sessió</h2>
        <form action="#" method="POST">
            <input type="text" name="email" class="input-field" placeholder="Email" required>
            <input type="password" name="contrasenya" class="input-field" placeholder="Contrasenya" required>
            <input type="submit" value="Login" class="login-btn">
            <?php

                require "../controlador/controladorLogIn.php";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    iniciarSessio();
                }

            ?>
        </form>
        <p></p>
        <form action="../vista/index.php">
            <input type="submit" value="Tornar" class="login-btn">
        </form>
        <a href="#" class="forgot-password">Contrasenya oblidada?</a>
        <div class="signup-link">
            No tens compte? <a href="../vista/vistaSignin.php">Enregistra't</a>
        </div>
    </div>

</body>
</html>