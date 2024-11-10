<?php 

session_start();

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case "Anotar":
            anotarPedido();
            $compraRealizada = pedido();
            include_once('compra.php');
        break;
        
        case "Borrar":
            quitarPedido();
            $compraRealizada = pedido();
            include_once('compra.php');
        break;

        case "Terminar":
            $compraRealizada = pedido();
            include_once('despedida.php');
            session_destroy();
        break;
    }
} else {
    if (!isset($_REQUEST['cliente'])) {
        include_once('bienvenida.php');
    } else {
        if (trim($_REQUEST['cliente']) == "") {
            include_once('bienvenida.php');
        } else {
            $_SESSION['cliente'] = $_REQUEST['cliente'];
            $compraRealizada = pedido();
            include_once('compra.php');
        }
    }
}

function anotarPedido() {
    $cantidad = $_POST['cantidad'];
    $fruta = $_POST['fruta'];

    if (!isset($_SESSION['frutas'])) {
        $_SESSION['frutas'] = [];
    }

    if ($cantidad > 0) {
        // añade a la clave ya existente la cantidad
        if (isset($_SESSION['frutas'][$fruta])) {
            // si el valor de por ejemplo platano es 4, a 4 se le suma $cantidad 
            $_SESSION['frutas'][$fruta] += $cantidad;
        } else {
            // crea una clave con su valor cantidad introducido si no existe la clave
            $_SESSION['frutas'][$fruta] = $cantidad;
        }
    }
    
}

function quitarPedido() {
    $cantidad = $_POST['cantidad'];
    $fruta = $_POST['fruta'];

    if ($cantidad > 0) {
        // añade a la clave ya existente la cantidad
        if (isset($_SESSION['frutas'][$fruta])) {
            // si el valor de por ejemplo platano es 4, a 4 se le suma $cantidad 
            $_SESSION['frutas'][$fruta] -= $cantidad;

            // si la cantidad de una fruta es 0 o menos, se elimina esa clave(la fruta)
            if ($_SESSION['frutas'][$fruta] <= 0) {
                unset($_SESSION['frutas'][$fruta]);
            }
        }
    }
}

function pedido() {
    if (isset($_SESSION['frutas'])) {
        $compraRealizada = "Este es su pedido : <br>";
        $compraRealizada .= "<table style='border: 1px solid black;'>";
                                
        foreach ($_SESSION['frutas'] as $fruta => $cantidad) {
            $compraRealizada .= "<tr>
                                    <td style='font-weight: bold; padding-right: 10px;'>$fruta</td>
                                    <td>$cantidad</td>
                                </tr>";
        }
        
        $compraRealizada .= "</table>";
    } else {
        $compraRealizada = "";
    }
    
    return $compraRealizada;
}
