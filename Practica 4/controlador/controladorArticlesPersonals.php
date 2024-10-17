<?php

require "../conexio.php";

function mostrarArticlesPersonals(){

  
    require_once "../model/modelUsuaris.php";


    if (isset($_GET["articlesPerPagina"])) { // Comprova que s'hagi passat informació a través de la url
        $articlesPerPagina = (int)$_GET["articlesPerPagina"]; // En cas de que tingui un valor l'agafa
        setcookie('articlesPerPagina', $articlesPerPagina, time() + (86400 * 30), "/");
    } else {
        $articlesPerPagina = $_COOKIE['articlesPerPagina']; // Per defecte, al carregar la pàgina ens posarà 5 articles
    }
    
    if ($articlesPerPagina <= 0) { // Si el numero és inferior a 1, mostrarà missatge d'error ja que no es poden mostrar 0 articles
        echo "No es pot posar un numero menor a 1";
    } else { // Si passa la comprovació, mostrarà els articles
    
    if (isset($_GET["pagina"])) { // Comrpova que l'usuari està en una pàgina
        $paginaActual = (int)$_GET["pagina"]; // Assigna a la variable la pàgina en la que es troba l'usuari
    } else {
        $paginaActual = 1; // Si no troba la pàgina, per defecte serà 1
    }

    $iniciArticles = ($paginaActual > 1) ? ($paginaActual * $articlesPerPagina) - $articlesPerPagina : 0; // Ex. 3 > 1 --> 3 * 5 = 15 - 5 = 10 Començarà per l'article 10

    $articlesTotals = obtenirArticlesTotalsPersonal(); // Obté la quantitat d'articles totals

    $articles = obtenirArticlesPaginaPersonal($iniciArticles, $articlesPerPagina);  // Obté els articles de la pàgina actual
    
    include_once "../vista/vistaUsuari.php"; // Carrega la vista
    vistaMostrarArticlesPersonals($articlesTotals, $articlesPerPagina, $articles, $paginaActual); // Passa a la vista els paràametres necessaris per poder fer una paginació
    }
}


?>