<?php

//session_start();
/**
 * Checks if the provided username and password are valid.
 *
 * @param string $username The username to validate.
 * @param string $password The password to validate.
 * @return bool Returns true if the username and password are valid, false otherwise.
 */
function accesoValido($username, $password): bool
{


    $fichero = @fopen('usuariosSinHash.dat', 'r');
    $fichero = @fopen('usuarios.dat', 'r');
    $usuarios = [];
    while ($linea = fgets($fichero)) {
        $partes = explode(',', trim($linea));
        $usuarios[$partes[0]] = $partes[1];
    }
    fclose($fichero);

    //$fichero = @fopen('usuarios.dat', 'r');

    //$usuarios[] = explode(',', $fichero);

    //fclose($fichero);

    // $compararContrasenias = password_verify($password, $usuarios[$username][1]);

    // COMPLETAR  +++++++++++++++++++++++++++++++
    if (array_key_exists($username,  $usuarios) && $usuarios[$username][1] == $password) {
        return true;
    } else {
        return false;
    }
}

/**
 * Records a new access for the given username.
 *
 * @param string $username The username for which to record the access.
 * @return int The result of the access recording operation.
 */
function anotarNuevoAcceso($username): int
{

    // COMPLETAR  +++++++++++++++++++++++++++++++

    // $_SESSION['numAccesos']
    return 0;
}

/**
 * Registers a user with a given username and time.
 *
 * @param string $username The username of the user to register.
 * @param int $time The time associated with the registration.
 */
function registra($username, $time)
{
    // COMPLETAR  +++++++++++++++++++++++++++++++
    // $fichero = @fopen('registro.log', 'w');
    //$fichero = 'registro.log';
    //$fichero = file_get_contents('registro.log');
    $ip = $_SERVER['REMOTE_ADDR'];
    // $fecha = date();

    $cadena = "$ip,$username,$time";

    //$array[] = [$ip,$username,$time];
    // $array[] = ['$ip','$username','$time'];

    // $cadena = implode(',', $array);

    // fwrite($fichero, $cadena);

    file_put_contents('registro.log', $cadena, FILE_APPEND);

    // fclose($fichero);

    return;
}
