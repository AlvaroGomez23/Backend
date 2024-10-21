<?php

require "../conexio.php";

function cambiarPsw() {

require "../model/modelUsuaris.php";
// Variables de les contrasenyes
$pswActual = $_POST["pswActual"];
$pswNew = $_POST["pswNew"];
$pswVerify = $_POST["pswVerify"];
$regexp = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/"; // Regexp per contrasenya segura

    if(preg_match($regexp, $pswNew)) { // Comprovació de que la contrasenya coincideixi amb la regexp
    if (comprovarPswActual($pswActual)) { // Comprova la contrasenya que té assingada l'usuari
        if($pswNew == $pswVerify) { // Comprova que les dues contrasenyes coincideixin
            cambiarPswModel($pswNew); // Canvia la contrasenya
            echo "Contrasenya cambiada amb èxit!";
        }
    }

    } else {
        echo "Contrasenya poc segura, introdueix una de nova";
    }

}


?>