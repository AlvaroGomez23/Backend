<!-- ALVARO GOMEZ -->

<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: ./vistaLogin.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/estilsTotsArticles.css"> <!-- Estils css (diferents als altres) -->
    <title>Articles Totals</title>
    
</head>
<body>

<header>
    <div class="logo">Hola! <?php echo $_SESSION['nom']  ?></div>
    <div class="signin-form">
        <form action="../vista/vistaInserir.php">
            <input type="submit" value="Inserir Article">
        </form>
    </div>
    <div class="signin-form">
        <form action="./vistaPerfil.php">
            <input type="submit" value="Perfil">
        </form>
        <p></p>
        <form action="../controlador/logout.php" method="post">
            <input type="submit" value="Log Out">
        </form>
</header>

<h1>Articles</h1>

<form method="get">
    <label for="qtArticles" class="labelArticles">Quantitat Articles (Per Pàgina):</label>
    <input type="number" id="articlesPerPagina" name="articlesPerPagina" class="inputArticles" value="<?php echo isset($_COOKIE['articlesPerPagina']) ? $_COOKIE['articlesPerPagina'] : 1; ?>"> <!-- Input per posar el numero d'articles -->
    <input type="submit" value="Modificar" class="inputArticles"> <!-- Botó per modificar la qt de articles -->
</form>

<?php

require "../controlador/controladorArticlesPersonals.php";

mostrarArticlesPersonals();

function vistaMostrarArticlesPersonals($articlesTotals, $articlesPerPagina, $articles, $paginaActual) { // Paràmetres necessaris per fer els càlculs i mostrar els articles
    if ($articles) {
        for ($i = 0; $i < count($articles); $i++) { // Bucle for per imprimir els diferents articles que pugin haver-hi a la pagina
            echo '<div class="articles">'; // "<div>" per els articles
            echo '<h2>' . htmlspecialchars($articles[$i]["nom"]) . '</h2>'; // Agafa el titol dels articles i els printa
            echo '<p>' . htmlspecialchars($articles[$i]["descripcio"]) . '</p>'; //  Agafa la descripcio dels articles i els printa
            echo '<p><br></p>';
            echo '<a href=vistaModificar.php>✏️</a>'.'<a href=vistaEliminar.php>🗑️</a>';
            echo '</div>';
            
        }
    }

    // Mostrar paginación
    $numPagines = ceil($articlesTotals / $articlesPerPagina); // Obtenir numero total de pàgines segons els articles
    echo '<div class="botons">'; // "<div>" per els botons
    
    // Botó per anar a la pàgina anterior
    if ($paginaActual > 1) {
        echo '<a href="?pagina=' . ($paginaActual - 1) . '&articlesPerPagina=' . $articlesPerPagina . '"><</a>';  // Genera l'enllaç de la pàgina anterior
    } else {
        echo '<button disabled><</button>'; // Si estem a la primera pàgina, el botó per anar a la pàgina anterior es desactiva
    }

    // Numeros que té la pàgina (Entre els botons d'avançar i tirar enrere)
    for ($i = 1; $i <= $numPagines; $i++) {
        if ($i == $paginaActual) {
            echo '<a class="active">' . $i . '</a>'; // Pàgina actual
        } else {
            echo '<a href="?pagina=' . $i . '&articlesPerPagina=' . $articlesPerPagina . '">' . $i . '</a>'; // Agafa l'enllaç de la página següent
        }
    }

    // Botón d'avançar de pàgina
    if ($paginaActual < $numPagines) {
        echo '<a href="?pagina=' . ($paginaActual + 1) . '&articlesPerPagina=' . $articlesPerPagina . '">></a>'; // "Genera" la seguent pàgina
    } else {
        echo '<button disabled>></button>'; // Si estem a l'ultima pàgina, es desactiva el botó de seguent
    }

    echo '</div>';

    
}

?>
<p></p>
<form action="index.php">
    <input type="submit" value="Tornar" class="inputArticles"> <!-- Botó per tornar a index -->
</form>
    
</body>
</html>