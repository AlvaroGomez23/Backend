<!-- ALVARO GOMEZ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estils.css"> <!-- Estils css -->
    <title>Document</title>
</head>
<body>
    <form method="post">
    <label for="id">Nom:</label>
    <input class="inputUsuari" type="text" id="nom" name="nom" value="<?php echo $_POST['nom'] ?? '' ?>"> <!-- Input pel nom -->
    <input class="inputUsuari" type="submit" value="Mostrar Article">
    <?php

        require "../controlador/controladorGeneral.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            mostrarArticle(); // Crida al controlador per tractar les dades per mostrar
        }
    ?>
    </form>
    <form action="index.php">
        <input type="submit" value="Tornar"> <!-- Botó per tornar a la pàgina principal-->
    </form>
</body>
</html>