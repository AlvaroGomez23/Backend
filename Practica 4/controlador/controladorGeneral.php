<?php
// ALVARO GOMEZ
require "../conexio.php"; // Fitxer de la conexió

function inserirArticle() { // Inserir l'article a la BDD

    $nom = $_POST["nom"]; //Agafar les dades nom i descripció
    $descripcio = $_POST["descripcio"];
    $nom = trim($nom); // Eliminar possibles espais que hi hagi al camp nom

    if (empty($nom)) { // Si el nom està buit o s'ha inserit un espai, llença un missatge de que no es pot inserir un nom buit
        echo "Introdueix un nom que existeixi";
    } else { // Si el nom es correcte, procedeix a insertar-ho a la BD
        require_once "../model/modelGeneral.php";
        inserirArticleModel($nom, $descripcio); //Enviar les dades al model per fer el tractament
    }

}

function modificarArticle() { // Modificar l'article de la BDD

    
    $nom = $_POST["nom"]; // Agafar el nom actual del article
    $newNom = $_POST["newNom"]; // Agafar el nom que es vol cambiar 
    $descripcio = $_POST["descripcio"]; // Descripció per modificar
    $newNom = trim($newNom);

    if (empty($newNom)) { // Si el nom nou es vol modificar a un espai o buit, llença un missatge alertant que no es pot modificar per un espai buit
       echo "El nom no pot ser un espai en blanc o estar buit";
    } else { // Si el nom es correcte, modifica l'article
        require_once "../model/modelGeneral.php";
        modificarArticleModel($nom, $newNom, $descripcio); // Enviar els parametres al model
    }

}

function mostrarArticle() { // Mostrar l'article de la BDD

    require_once "../model/modelGeneral.php";
    $nom = $_POST["nom"]; // Agafar el nom per mostrar el article 
    
    mostrarArticleModel($nom); // Enviar els parametres al model

}

function eliminarArticle() { // Elimnar l'article de la BDD


    require_once "../model/modelGeneral.php";
    $nom = $_POST["nom"]; // Agafar el nom per eliminar el article
    eliminarArticleModel($nom); // Enviar els parametres al model

}

function mostrarTotsArticles(){

  
    require_once "../model/modelGeneral.php";


    if (isset($_GET["articlesPerPagina"])) { // Comprova que s'hagi passat informació a través de la url
        $articlesPerPagina = (int)$_GET["articlesPerPagina"]; // En cas de que tingui un valor l'agafa
    } else {
        $articlesPerPagina = 5; // Per defecte, al carregar la pàgina ens posarà 5 articles
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

    $articlesTotals = obtenirArticlesTotals(); // Obté la quantitat d'articles totals

    $articles = obtenirArticlesPagina($iniciArticles, $articlesPerPagina);  // Obté els articles de la pàgina actual
    
    include_once "../vista/index.php"; // Carrega la vista
    vistaMostrarArticles($articlesTotals, $articlesPerPagina, $articles, $paginaActual); // Passa a la vista els paràametres necessaris per poder fer una paginació
}

}


?>