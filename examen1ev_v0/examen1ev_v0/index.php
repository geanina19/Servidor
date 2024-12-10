<?php
include_once 'funciones.php';
session_start();

//echo '<H1> NO HAGO NADA &#128542; </H1>';

include_once "acceso.php";

if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = "";
}

if (isset($_POST['username'])) {
    $_SESSION['nombre'] = $_POST['username'];
}

if (isset($_POST['time'])) {
    $_SESSION['tiempo'] = time() + $_POST['time'];
}

$_SESSION['numAccesos'] = 0;

file_put_contents('registro.log', (int)$_SESSION['numAccesos'], FILE_APPEND);



// COMPLETAR  +++++++++++++++++++++++++++++++
if ( isset($_SESSION['tiempolimite']) ){
    $_SESSION['tiempolimite'] = $_POST['time'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['time'])) {
        if (accesoValido($_POST['username'], $_POST['password']) == true) {
            registra($_POST['username'],$_SESSION['tiempo']);
            anotarNuevoAcceso($_POST['username']);
            $_SESSION['numAccesos']++;
            include_once ('bienvenido.php');
        } else {
            anotarNuevoAcceso($_POST['username']);
            $_SESSION['numAccesos']++;
            $msg = "No coincide nombre y contraseña.";
            include_once 'acceso.php';
        }
    } else {
        $msg = "Debe completar todos los campos.";

    }
}
