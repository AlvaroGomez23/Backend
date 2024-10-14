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
            
            $sqlContrasenya = "SELECT contrasenya FROM usuaris WHERE email = :email";
            $stmt2 = $conexio->prepare($sqlContrasenya);
            $stmt2->bindParam(":email", $email);
            $stmt2->execute();
            $contrasenyaBD = $stmt2->fetch(PDO::FETCH_ASSOC);


            if ($contrasenyaBD && password_verify($contrasenya, $contrasenyaBD['contrasenya'])) {
                echo "Hola";
            } else {
                echo "Adios";
            }



        } else {
            echo "No hi ha cap usuari amb el mail '$email' a la base de dades";
        }

    } catch (Exception $e){

    }

}



?>