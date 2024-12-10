<?php
session_start();
include_once "minibanco.php";
include_once "ficheroSaldo.txt";

if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == "POST") {
    switch ($_POST['Orden']) {
        case 'Ingreso':
            ingresarDinero();
            break;

        case 'Reintegro':
            quitarDinero();
            break;

        case 'Ver saldo':
            verSaldo();
            break;

        case 'Terminar':
            $msg = "Sesión terminada.";
            header("Location: minibanco.php?msg=" . urlencode($msg));
            cargarSaldoFichero();
            session_destroy();
            break;

        default:
            # code...
            break;
    }
}



function ingresarDinero()
{
    if (!empty($_POST['importe'])) {
        if (is_numeric($_POST['importe']) && $_POST['importe'] > 0) {
            $_SESSION['saldo'] += $_POST['importe'];
            $msg = "Operación realizada.";
        } else {
            $msg = "Importe Erróneo o importe menor de 0.";
        }
    } else {
        $msg = "Debe introducir importe para añadirlo al saldo.";
    }

    header("Location: minibanco.php?msg=" . urlencode($msg));
}

function quitarDinero()
{
    if (!empty($_POST['importe'])) {
        if (is_numeric($_POST['importe']) && $_POST['importe'] <= $_SESSION['saldo'] && $_POST['importe'] >= 0) {
            $_SESSION['saldo'] -= $_POST['importe'];
            $msg = "Operación realizada.";
        } else {
            $msg = "Importe Erróneo o importe superior al saldo.";
        }
    } else {
        $msg = "Debe introducir importe para quitar dinero.";
    }

    header("Location: minibanco.php?msg=" . urlencode($msg));
}

function verSaldo()
{
    $msg = "Su saldo actual es " . $_SESSION['saldo'] . " Euros.";
    header("Location: minibanco.php?msg=" . urlencode($msg));
}

function cargarSaldoFichero()
{
    // Nombre del archivo
    $file = "ficheroSaldo.txt";

    // El contenido que quieres escribir
    $contenido = $_SESSION['saldo'];

    // Escribir al archivo (sobrescribe el contenido anterior)
    file_put_contents($file, $contenido);

    // Añadir contenido al final del archivo
    // file_put_contents($file, $contenido, FILE_APPEND);
}
