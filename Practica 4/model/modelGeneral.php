<?php
//ALVARO GOMEZ
require "../conexio.php";

function inserirArticleModel ($nom, $descripcio) { // Funció per insertar els articles
    
    global $conexio; // Variable global que conté la conexió
    $idUsuari = $_SESSION['idUsuari'];

    try  { // FASE 1: Buscar que existeixi l'article

        $sql = "SELECT * FROM articles WHERE nom = :nom"; // Sentencia sql per veure si existeix algun article amb el nom que es demana
        $stmt = $conexio->prepare($sql);
        $stmt->execute([":nom"=>$nom]);

    if ($stmt->rowCount() > 0) { // En cas de que es trobi algun camp i retorni la columna, llença un missatge de que ja existeix
        echo "L'article amb el nom '$nom' ja existeix a la base de dades.<br>";

    } else { // Altrament l'article no existeix
        // FASE 2: Insertar l'article si no existeix
        $sqlInsert = "INSERT INTO articles (nom, descripcio, id_usuari) VALUES (:nom, :descripcio, :id_usuari)"; // Sql per insertar l'article a la BDD
        $stmtInsert = $conexio->prepare($sqlInsert);
        $stmtInsert->execute([":nom"=>$nom, ":descripcio"=>$descripcio, ":id_usuari"=>$idUsuari]); // Reemplaçem els valors temporals pels introduits de l'usuari

        echo "L'article amb el nom '$nom' s'ha afegit correctament.<br>"; // Missatge de confirmació
    }

    } catch (PDOException $e) {

        echo "Error al insertar les dades: " . $e->getMessage(); // Missatge d'error

    }

}


function modificarArticleModel ($nom, $newNom, $descripcio) {

    global $conexio; // Variable global que conté la conexió

    try  { // FASE 1: Buscar l'article amb el nom que es vol modificar

        $sql = "SELECT * FROM articles WHERE nom = :nom"; // Sentencia sql per trobar l'article
        $stmt = $conexio->prepare($sql);
        $stmt->execute([":nom" => $nom]);

        if ($stmt->rowCount() > 0) { //En cas de que existeixi, retorna la columna per tant, el nom que estem buscant existeix
            //FASE 2: Si existeix actualizar el nom i la descripció
            $sqlUpdate = "UPDATE articles SET nom = :newNom, descripcio = :newDescripcio WHERE nom = :nom"; // Sentencia sql per actualitzar-ho
            $stmtUpdate = $conexio->prepare($sqlUpdate);
            $stmtUpdate->execute([":newNom" => $newNom, ":newDescripcio" => $descripcio, ":nom" => $nom]);

            echo "L'article amb el nom '$nom' s'ha actualitzat correctament"; // Missatge de confirmació

        } else {
            echo "No existeix cap article amb el nom '$nom'";
        }

    } catch (Exception $e) {
        // Si un nom està repetit, la bd enviara un error de duplicate entry
        echo "El nom que estas intentant cambiar ja  existeix, torna a intentar-ho amb un altre";
    } catch (PDOException $e) {
        echo "Error, ".$e->getMessage();
    }
}


function eliminarArticleModel ($nom) {

    global $conexio; // Variable amb la conexió

    try  { // FASE 1: Buscar si existeix l'article

        $sql = "SELECT * FROM articles WHERE nom = :nom"; // Sentencia sql per trobar si existeix
        $stmt = $conexio->prepare($sql);
        $stmt->execute([":nom"=>$nom]);

    if ($stmt->rowCount() > 0) { // Si l'article existeix, retorna la columna, per tant la condició es true
        // FASE 2: Elimina l'article de la BDD
        $sqlDelete = "DELETE FROM articles WHERE nom = :nom";
        $stmtDelete = $conexio->prepare($sqlDelete);
        $stmtDelete->execute([":nom" => $nom]);
        echo "L'article amb el nom '$nom' s'ha eliminat"; // Missatge de confirmació
    } else { // Si no existeix, llença un missatge de que no hi ha
        
        echo "L'article '$nom' no existeix.";

    }

    } catch (PDOException $e) {

        // Si hi ha algun error al la BDD es mostra per pantalla
        echo "Error al eliminar les dades: " . $e->getMessage();

    }
    


}

function mostrarArticleModel ($nom) {

    global $conexio; // Variable que conté la conexió

    try  { // FASE 1: Trobar que l'article existeixi

        $sql = "SELECT * FROM articles WHERE nom = :nom"; // Sentencia sql per trobar que existeix
        $stmt = $conexio->prepare($sql);
        $stmt->execute([":nom"=>$nom]);

    if ($stmt->rowCount() > 0) { // Si troba l'article, retorna la columna i es compleix la condició
        // FASE 2: Mostrar l'article en cas de que existeixi
        $sqlSelect = "SELECT nom, descripcio FROM articles WHERE nom = :nom"; // Sentencia sql per agafar el nom i la desc del article de la BDD
        $stmtSelect = $conexio->prepare($sqlSelect);
        $stmtSelect->execute([":nom"=>$nom]);
        $prv = $stmt->fetch(PDO::FETCH_ASSOC); // Agafa el nom i la descripció i els assigna a la variable

        echo "Nom: ".$prv["nom"]."<br>"."Descripcio: ".$prv["descripcio"]; // Mostrar la informació al client amb un determinat format

    } else {
       // Si l'article no existeix, envia missatge.
        echo "Aquest article no existeix";
    }

    } catch (PDOException $e) {

        // En cas d'error a la BD, mostra el missatge d'error per pantalla
        echo "Error al mostrar les dades: " . $e->getMessage();

    }


}


function obtenirArticlesTotals() { // Obtenim TOTS els articles de la BDD

    global $conexio; // Variable global que conté la conexió
    
    try {

        $sqlArticlesTotals = "SELECT COUNT(*) AS total FROM articles"; // Sentencia sql per obtenir tots els articles que hi hagi a la BDD
        $stmt = $conexio->prepare($sqlArticlesTotals);
        $stmt->execute(); // Executa la sentencia sql
        $articlesTotals = $stmt->fetch(PDO::FETCH_ASSOC)['total']; // Guarda la quantitat de articles que hi ha a la BDD

        return $articlesTotals;

    } catch (Exception $e) {
        // En cas d'error a la BD, mostra el missatge d'error per pantalla
        echo "Error al obtenir les dades: " . $e->getMessage();
    }
}

function obtenirArticlesPagina($iniciArticles, $articlesPerPagina) { // Obté els articles que s'han de mostrar a cada pàgina

    global $conexio; // Variable global que conté la conexió
    
    try {

        $sql = "SELECT * FROM articles LIMIT :inici, :articlesPerPagina"; // Sentencia sql que delimitarà els articles que es mostraran per pantalla
        $stmt = $conexio->prepare($sql);
        $stmt->bindParam(":inici", $iniciArticles, PDO::PARAM_INT); // Assignem el valor a :inici
        $stmt->bindParam(":articlesPerPagina", $articlesPerPagina, PDO::PARAM_INT); // Assignem el valor a :articlesPerPagina
        $stmt->execute(); // Executem la sentència

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna en fomra d'array els articles que s'han de mostrar i no la quantitat

        return $articles; // Retornem la variable amb els articles

    } catch (Exception $e) {

         // En cas d'error a la BD, mostra el missatge d'error per pantalla
         echo "Error al obtenir les dades: " . $e->getMessage();
    }

}

function comprovarUsuariModel($idUsuari, $nom) {

    global $conexio;

    try {
        
        $sql = "SELECT * FROM articles WHERE nom = :nom";
        $stmt = $conexio->prepare($sql);
        $stmt->bindParam(":nom", $nom);
        $stmt->execute();
        $articleUser = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($articleUser && $articleUser['id_usuari'] == $idUsuari) {
            return true;
        } else {
            return false;
        }

    } catch (Exception $e) {

    }

}

?>