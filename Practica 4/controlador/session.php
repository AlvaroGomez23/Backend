<?php

if (isset($_SESSION['LAST_ACTIVITY'])) {
    // Comprobar si la última actividad fue hace más de 40 minutos
    if (time() - $_SESSION['LAST_ACTIVITY'] > 0.5 * 60) {
        // Si ha pasado el tiempo, destruir la sesión
        session_unset();     // Liberar todas las variables de sesión
        session_destroy();   // Destruir la sesión
    }
}

?>