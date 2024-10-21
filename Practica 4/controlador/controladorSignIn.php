<?php

require "../conexio.php";

function crearUsuari() {

    // Variables introduides per l'usuari al formulari
    $dni = $_POST["dni"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $contrasenya = $_POST["contrasenya"];
    $contrasenyaDone = $_POST["contrasenyaDone"];
    $regexp = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/"; // Regexp per contrasenya segura

    if(preg_match($regexp, $contrasenya)) { // Comprovació de que la contrasenya coincideixi amb la regexp
        
        if ($contrasenya != $contrasenyaDone) { // Condicionals per indicar a l'usuari si ho està fent bé
            echo "Les contrasenyes no coincideixen";
        } else {
            require "../model/modelUsuaris.php";
            $contrasenya_encriptada = password_hash($contrasenya, PASSWORD_BCRYPT); // Si coincideixien, s'encripta la contrasenya i es crida al model per inserir l'usuari a la base de dades
            crearUsuariModel($dni, $nom, $email,$contrasenya_encriptada);
        }

    } else {
        echo "La contrasenya és massa fluixa, introdueix una amb mínim 1 lletra majúscula, 1 lletra minuscula, 1 caràcter especial, 1 numero i ha de ser mínim de 8 caràcters";
    }


}
?>