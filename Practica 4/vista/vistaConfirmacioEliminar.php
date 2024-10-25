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
    <title>Eliminar</title>
</head>
<body>
<form method="post" action> <!--Formulari redireccionat per confirmar la eliminació del article-->
    <label for="nom">Estàs segur que vols eliminar el seguent article?</label>
    <input class="inputUsuari" type="text" id="nom" name="nom" value="<?php echo $_POST['nom'] ?? '' ?>"> <!--Agafa el nom que se li hagi introduit-->
    <input class="inputUsuari" type="submit" name ="eliminar" value="Eliminar Article">
    <?php

        require "../controlador/controladorGeneral.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
            eliminarArticle(); //Crida al controlador
        }
    ?>
    </form>
    <form action="index.php">
        <input type="submit" value="Tornar"> <!-- Botó per tornar a la pàgina principal-->
    </form>
</body>
</html>