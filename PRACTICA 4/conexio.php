<?php
//ALVARO GOMEZ
/***********************************************/
/************  CONNEXIÓ A LA BDD   *************/
/***********************************************/

$host = 'localhost'; //Host de la bd
$dbname = 'pt03_alvaro_gomez'; //Nom de la base de dades
$username = 'root';  // Username (Per defecte a xampp es root)
$password = '';      //Contrasenya 
try {
    //Instància PDO
    $conexio = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password) or die("Hi ha hagut un error al conectar-se a la BDD"); //Conexió a la bd 
    
    
} catch (PDOException $e) {
    // En cas d'error en la conexió mostrar un missatge d'error
    echo "Error en la conexió: " . $e->getMessage();
}



?>
