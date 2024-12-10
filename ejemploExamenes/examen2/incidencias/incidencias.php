<?php

$numInceidencias = 0;
if (isset($_COOKIE['numIncidencias'])) {
    $numInceidencias = $_COOKIE['numIncidencias'];
}

if ($numInceidencias > 3) {
    echo "Superado el límite de incidencias. \n";
    echo "Espere 2 min para introducir otra incidencia.";
    exit;
}

$numInceidencias++;

//crea el cookie o modificar -> setcookie(nombreCookie, valor, cuandoCaduca)
setcookie("numIncidencias", $numInceidencias, time() + 120);

// Para eliminar una cookie
// setcookie("numIncidencias", "", time() - 3600);


$nombre = htmlspecialchars($_POST['nombre']);
$resumen = htmlspecialchars($_POST['resumen']);
$prioridad = $_POST['prioridad'];
$fecha = date("d:m:Y H:i");
$ip = $_SERVER['REMOTE_R'];

$linea = $fecha . ',' . $nombre . ',' . $resumen . ',' . $prioridad . ',' . $ip . "\n";

if (!empty($nombre) || !empty($resumen) || !empty($prioridad)) {
    $resu = @file_put_contents('incidencias.txt', $linea, FILE_APPEND);
    $_POST['nombre'] = "";
    $_POST['resumen'] = "";
    if ($resu) {
        echo "Muchas gracias, $nombre, se ha anotado su incidencia.";
    } else {
        echo "Error no se ha podido anotar su incidencia";
    }
} else {
    echo "Debe completar todos los campos";
}

