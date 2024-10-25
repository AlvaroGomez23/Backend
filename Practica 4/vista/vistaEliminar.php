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
    <form method="post" action="vistaConfirmacioEliminar.php"> <!-- Redirecciona a vistaConfirmació eliminar per eliminar el artilcle -->
    <label for="nom">Nom:</label>
    <input class="inputUsuari" type="text" id="nom" name="nom" value="<?php echo $_POST['nom'] ?? '' ?>"> <!-- Input pel nom -->
    <input class="inputUsuari" type="submit" value="Eliminar Article">
    </form>
    <form action="index.php">
        <input type="submit" value="Tornar"> <!-- Botó per tornar a la pàgina principal -->
    </form>
</body>
</html>