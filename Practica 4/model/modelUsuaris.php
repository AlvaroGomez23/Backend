<?php


require "../conexio.php";


function crearUsuariModel($dni, $nom, $email,$contrasenya) {

    global $conexio; // Variable global que conté la conexió

    try  { // FASE 1: Buscar que existeixi l'article

        $sql = "SELECT * FROM usuaris WHERE email = :email"; // Sentencia sql per veure si existeix algun article amb el nom que es demana
        $stmt = $conexio->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

    if ($stmt->rowCount() > 0) { // En cas de que es trobi algun camp i retorni la columna, llença un missatge de que ja existeix
        echo "L'usuari amb el nom '$email' ja existeix a la base de dades.<br>";

    } else { // Altrament l'article no existeix
        // FASE 2: Insertar l'article si no existeix
        $sqlInsert = "INSERT INTO usuaris (dni,nom,email,contrasenya) VALUES (:dni, :nom, :email, :contrasenya)"; // Sql per insertar l'article a la BDD
        $stmtInsert = $conexio->prepare($sqlInsert);
        $stmtInsert->bindParam(":dni", $dni);
        $stmtInsert->bindParam(":nom", $nom);
        $stmtInsert->bindParam(":email", $email);
        $stmtInsert->bindParam(":contrasenya", $contrasenya);
        $stmtInsert->execute(); // Reemplaçem els valors temporals pels introduits de l'usuari

        echo "L'usuari amb el mail '$email' s'ha afegit correctament.<br>"; // Missatge de confirmació
    }

    } catch (PDOException $e) {

        echo "Error al insertar les dades: " . $e->getMessage(); // Missatge d'error

    }

}



function iniciarSessioModel($email, $contrasenya) {

    global $conexio;

    try  { // FASE 1: Buscar que existeixi l'article

        $sql = "SELECT * FROM usuaris WHERE email = :email"; // Sentencia sql per veure si existeix algun article amb el nom que es demana
        $stmt = $conexio->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) { // En cas de que es trobi algun camp i retorni la columna, llença un missatge de que ja existeix
            
            $sqlContrasenya = "SELECT * FROM usuaris WHERE email = :email";
            $stmt2 = $conexio->prepare($sqlContrasenya);
            $stmt2->bindParam(":email", $email);
            $stmt2->execute();
            $usuariBD = $stmt2->fetch(PDO::FETCH_ASSOC);
            

            if ($usuariBD && password_verify($contrasenya, $usuariBD['contrasenya'])) {
                session_start();
                $_SESSION['email'] = $usuariBD['email'] ;
                $_SESSION['nom'] = $usuariBD['nom'];
                $_SESSION['idUsuari'] = $usuariBD['id'];
                header("Location: ./vistaUsuari.php");
                exit();
            } else {
                echo "Mail o contrasenya incorrectes";
            }



        } else {
            echo "No hi ha cap usuari amb el mail '$email' a la base de dades";
        }

    } catch (Exception $e){

    }

}

function obtenirArticlesTotalsPersonal() { // Obtenim TOTS els articles de la BDD

    global $conexio; // Variable global que conté la conexió
    $idUsuari = $_SESSION["idUsuari"];
    
    try {

        $sqlArticlesTotals = "SELECT COUNT(*) AS total FROM articles WHERE id_usuari = :idUsuari"; // Sentencia sql per obtenir tots els articles que hi hagi a la BDD
        $stmt = $conexio->prepare($sqlArticlesTotals);
        $stmt->bindParam(":idUsuari", $idUsuari);
        $stmt->execute(); // Executa la sentencia sql
        $articlesTotals = $stmt->fetch(PDO::FETCH_ASSOC)['total']; // Guarda la quantitat de articles que hi ha a la BDD
        return $articlesTotals;

    } catch (Exception $e) {
        // En cas d'error a la BD, mostra el missatge d'error per pantalla
        echo "No n'hi han articles am l'id '$idUsuari";
    }
}

function obtenirArticlesPaginaPersonal($iniciArticles, $articlesPerPagina) { // Obté els articles que s'han de mostrar a cada pàgina

    global $conexio; // Variable global que conté la conexió
    $idUsuari = $_SESSION["idUsuari"];
    
    try {

        $sql = "SELECT * FROM articles WHERE id_usuari = :idUsuari LIMIT :inici, :articlesPerPagina"; // Sentencia sql que delimitarà els articles que es mostraran per pantalla
        $stmt = $conexio->prepare($sql);
        $stmt->bindParam(":inici", $iniciArticles, PDO::PARAM_INT); // Assignem el valor a :inici
        $stmt->bindParam(":articlesPerPagina", $articlesPerPagina, PDO::PARAM_INT); // Assignem el valor a :articlesPerPagina
        $stmt->bindParam(":idUsuari", $idUsuari, PDO::PARAM_INT);
        $stmt->execute(); // Executem la sentència

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna en fomra d'array els articles que s'han de mostrar i no la quantitat

        return $articles; // Retornem la variable amb els articles

    } catch (Exception $e) {

         // En cas d'error a la BD, mostra el missatge d'error per pantalla
         echo "Error al obtenir les dades: " . $e->getMessage();
    }

}


function comprovarPswActual($pswActual) {
    session_start();
    global $conexio;
    $id_usuari = $_SESSION['idUsuari'];

    try {

        $sql = "SELECT * FROM usuaris WHERE id = :id_usuari";
        $stmt = $conexio->prepare($sql);
        $stmt->bindParam(":id_usuari",$id_usuari);
        $stmt->execute();
        $usuari = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) { 

            if ($usuari && password_verify($pswActual, $usuari['contrasenya'])) {
                return true;
            } else {
                return false;
            }

        }

    } catch (Exception $e) {

    }


}

function cambiarPswModel($pswNew) {
    
    global $conexio;
    $id_usuari = $_SESSION['idUsuari'];
    $pswEncriptada = password_hash($pswNew, PASSWORD_BCRYPT);

    try {
        $sql = "UPDATE usuaris SET contrasenya = :newPsw WHERE id = :id_usuari";
        $stmt = $conexio->prepare($sql);
        $stmt->bindParam(":newPsw", $pswEncriptada);
        $stmt->bindParam(":id_usuari", $id_usuari);
        $stmt->execute();

    } catch (Exception $e) {
        echo "Hi ha hagut un error al cambiar la contrasenya";
    }


}


?>