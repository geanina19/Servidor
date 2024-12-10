<?php

define('NUMACCESOFICHERO', 'accesos.txt');

$totalAccesos = (int) file_get_contents(NUMACCESOFICHERO);

//Leer el valor de la cookie
$contadorCookie = 0;

if (isset($_COOKIE['cookie'])) {
    $contadorCookie = $_COOKIE['cookie'];
}

$contadorCookie++;

setcookie("cookie", $contadorCookie, time() + (3 * 30 * 24 * 60 * 60));

$totalAccesos++;

file_put_contents(NUMACCESOFICHERO, $totalAccesos);

echo "Se ha accedido al navigador : " . $contadorCookie . " veces. <br><br>";
echo "Se ha accedido al fichero : " . $totalAccesos . " veces.";
