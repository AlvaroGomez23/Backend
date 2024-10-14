<?php

require "../conexio.php";

function crearUsuari() {

    $dni = $_POST["dni"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $contrasenya = $_POST["contrasenya"];
    $contrasenyaDone = $_POST["contrasenyaDone"];


    if ($contrasenya != $contrasenyaDone) {
        echo "Les contrasenyes no coincideixen";
    } else {
        require "../model/modelUsuaris.php";
        $contrasenya_encriptada = password_hash($contrasenya, PASSWORD_BCRYPT);
        crearUsuariModel($dni, $nom, $email,$contrasenya_encriptada);
    }


}
?>