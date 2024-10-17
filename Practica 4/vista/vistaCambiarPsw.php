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
        <h2>Cambiar Contrasenya</h2>
        <form action="#" method="POST">
            <input type="password" name="actualPsw" class="input-field" placeholder="Contrasenya Actual" required>
            <input type="password" name="newPsw" class="input-field" placeholder="Nova Contrasenya" required>
            <input type="password" name="newPswVerificar" class="input-field" placeholder="Repeteix la nova contrasenya" required>
            <input type="submit" value="cambiar Contrasenya" class="login-btn">
            <?php

                /*require "../controlador/controladorLogIn.php";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    iniciarSessio();
                }*/

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