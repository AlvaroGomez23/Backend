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
    <title>Practica 2</title>
</head>
<body>
    <div>
        <form action="vistaInserir.php">
            <input type="submit" value="Inserir"></input> <!-- Crida a la vista de inserir -->
        </form>
        <form action="vistaModificar.php">
            <input type="submit" value="Modificar"></input> <!-- Crida a la vista de modificar -->
        </form>
        <form action="vistaMostrar.php">
            <input type="submit" value="Consultar"></input> <!-- Crida a la vista de mostrar -->
        </form>
        <form action="vistaEliminar.php">
            <input type="submit" value="Eliminar"></input> <!-- Crida a la vista de eliminar -->
        </form>
        <form action="vistaArticles.php">
            <input type="submit" value="Mostrar Articles"></input> <!-- Crida a la vista de paginacio -->
        </form>
    </table>
</body>
</html>