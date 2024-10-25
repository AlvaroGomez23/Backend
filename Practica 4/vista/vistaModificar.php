<!-- ALVARO GOMEZ -->
<?php 
session_start();
if (!isset($_SESSION['nom'])) {
    header("Location: ./vistaUsuari.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estils.css"> <!-- Estils css -->
    <title>Document</title>
</head>
<body>
    <form class="formUsuari" method="post">
        <label for="nom">Nom actual:</label>
        <input class="inputUsuari" type="text" id="nom" name="nom" value="<?php echo $_POST['nom'] ?? '' ?>"> <!-- Input pel nom -->

        <label for="newNom">Nom a reemplaçar:</label>
        <input class="inputUsuari" type="text" id="newNom" name="newNom" value="<?php echo $_POST['newNom'] ?? '' ?>"> <!-- Input pel nom -->

        <label for="descripcio">Descripcio:</label>
        <textarea id="descripcio" name="descripcio" rows="4"><?php echo $_POST['descripcio'] ?? '' ?></textarea> <!-- Textare pel missatge -->
    
        <input class="inputUsuari" type="submit" value="Modificar Article">
        <?php

        require "../controlador/controladorGeneral.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            modificarArticle(); // Crida al controlador per tractar les dades
        }


        ?>
    </form>
    <form action="index.php">
        <input type="submit" value="Tornar"> <!-- Botó per tornar a la pàgina principal-->
    </form>
</body>
</html>