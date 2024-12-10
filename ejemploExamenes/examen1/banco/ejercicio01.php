<?php
session_start();

define('CUENTAFICHERO', 'misaldo.txt');


// NO está definido el token
if (!isset($_SESSION['token']) || $_SESSION['token'] != $_POST['token']) {
    header('Location: acceso.php?msg=Error+de+acceso 1');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    switch ($_POST['Orden']) {
        case 'Ingreso':
            ingresarDinero();
            break;
        case 'Reintegro':
            retirarDinero();
            break;
        case 'Ver saldo':
            verSaldo();
            break;
    }
}

function ingresarDinero()
{
    if (isset($_POST['importe']) && is_numeric($_POST['importe']) && $_POST['importe'] > 0) {
        $saldo = (int)file_get_contents(CUENTAFICHERO);
        $saldo += $_POST['importe'];
        file_put_contents(CUENTAFICHERO, $saldo);
        $msg = " Operación realizada.";
    } else {
        $msg = "Importe Erróneo o importe menor de 0";
    }
    header("Location: acceso.php?msg=" . urlencode($msg));
}

function retirarDinero()
{
    $saldo = (int)file_get_contents(CUENTAFICHERO);

    if (isset($_POST['importe']) && is_numeric($_POST['importe']) && $_POST['importe'] > 0 && $_POST['importe'] <= $saldo) {
        
        $saldo-= $_POST['importe'];
        file_put_contents(CUENTAFICHERO, $saldo);
        $msg = " Operación realizada.";
    } else {
        $msg = "Importe Erróneo o importe superior al saldo";
    }
    header("Location: acceso.php?msg=" . urlencode($msg));
}

function verSaldo() {
    $saldo = (int)file_get_contents(CUENTAFICHERO);
    $msg = "Su saldo actual es : " . $saldo . "";
    header("Location: acceso.php?msg=" . urlencode($msg));
}
