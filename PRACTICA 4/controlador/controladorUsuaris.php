<?php

function crearUsuari() {

    
    $contrasenya = $_POST["contrasenya"];
    $contrasenyaDone = $_POST["contrasenyaDone"];


    if ($contrasenya != $contrasenyaDone) {
        echo "Les contrasenyes no coincideixen";
    } else {
        require "../model/modelUsuaris.php";
        crearUsuariModel();
    }


}




?>