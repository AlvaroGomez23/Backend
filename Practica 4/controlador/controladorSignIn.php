<?php

require "../conexio.php";

function crearUsuari() {

    $dni = $_POST["dni"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $contrasenya = $_POST["contrasenya"];
    $contrasenyaDone = $_POST["contrasenyaDone"];
    $regexp = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";

    if(preg_match($regexp, $contrasenya)) {
        
        if ($contrasenya != $contrasenyaDone) {
            echo "Les contrasenyes no coincideixen";
        } else {
            require "../model/modelUsuaris.php";
            $contrasenya_encriptada = password_hash($contrasenya, PASSWORD_BCRYPT);
            crearUsuariModel($dni, $nom, $email,$contrasenya_encriptada);
        }

    } else {
        echo "La contrasenya és massa fluixa, introdueix una amb mínim 1 lletra majúscula, 1 lletra minuscula, 1 caràcter especial i 1 numero";
    }


}
?>