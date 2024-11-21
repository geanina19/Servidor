<?php
// Borra el elemento indicado de tabla de usuarios
// Reordena indexa la tabla
function accionBorrar($id)
{
    //<<<< COMPLETAR >>>>>>  
    // anotar en $_SESSION['msg'] un mensaje si el usuario ha sido eliminado o si no existe


    if (!isset($_SESSION['tuser'][$id])) {
        $mensaje = "No existe el usuario indicado.";
    } else {
        $mensaje = "Se ha borrado correctamente el usuario : " . $_SESSION['tuser'][$id][1];
        // Elimino de la tabla
        unset($_SESSION['tuser'][$id]);
    }

    $_SESSION['msg'] = $mensaje;
}

// Termina: Cierra sesión y vuelva los datos
function accionTerminar()
{
    volcarDatos($_SESSION['tuser']);
    session_destroy();
    $_SESSION['msg'] = " Todos los datos se han guardado ";
}


// Muestra un formularios con los datos de un usuario de la posición $id de la tabla
function accionDetalles($id)
{
    $login = $id;
    $usuario = $_SESSION['tuser'][$id];
    $clave  =   $usuario[0];
    $nombre   = $usuario[1];
    $comentario = $usuario[2];
    $orden = "Detalles";
    include_once "layout/formulario.php";
    exit();
}

// Muestra  el formularios con los datos permitiendo la modificación
function accionModificar($id)
{
    $login = $id;
    $usuario = $_SESSION['tuser'][$id];
    $clave  = $usuario[0];
    $nombre  = $usuario[1];
    $comentario = $usuario[2];
    $orden = "Modificar";
    include_once "layout/formulario.php";
    exit();
}

// Modifica el contenido de usuario
function accionPostModificar()
{
    $id = $_POST['login'];

    $nombre = $_POST['nombre'];
    $login = $_POST['login'];
    $clave = $_POST['clave'];
    $comentario = $_POST['comentario'];
    $orden = "Nuevo";

    if (empty($_POST['clave']) || empty($_POST['nombre']) || empty($_POST['comentario'])) {
        $_SESSION['msg'] = "Se debe completar todos los campos.";
        $msg = $_SESSION['msg'];
        include_once "layout/formulario.php";
    }

    if (isset($_SESSION['tuser'][$id])) {
        $_SESSION['tuser'][$id] = [$_POST['clave'], $_POST['nombre'], $_POST['comentario']];
        $_SESSION['msg'] = " Usuario con login $id actualizado";
    }
}


// Muestra  el formulario con los datos vacios para realizar una alta
function accionAlta()
{
    $nombre  = "";
    $login   = "";
    $clave   = "";
    $comentario = "";
    $orden = "Nuevo";
    include_once "layout/formulario.php";
    exit();
}

// Proceso los datos del formularios guardándolo en la sesión
// Debe evitar que se puedan introducir dos usuarios con el mismo login y
// que exista algún campo vacio.

function accionPostAlta()
{

    limpiarArrayEntrada($_POST); //Evito la posible inyección de código

    $id = $_POST['login'];

    $nombre = $_POST['nombre'];
    $login = $_POST['login'];
    $clave = $_POST['clave'];
    $comentario = $_POST['comentario'];
    $orden = "Nuevo";

    if (empty($_POST['login']) || empty($_POST['clave']) || empty($_POST['nombre']) || empty($_POST['comentario'])) {
        $_SESSION['msg'] = "Se debe completar todos los campos.";
        $msg = $_SESSION['msg'];
        include_once "layout/formulario.php";
    }

    if (isset($_SESSION['tuser'][$id])) {
        $_SESSION['msg'] = "El usuario ya existe.";
        $msg = $_SESSION['msg'];
        include_once "layout/formulario.php";
    } else {
        $nuevo = [$_POST['clave'], $_POST['nombre'], $_POST['comentario']];
        $_SESSION['tuser'][$id] = $nuevo;
        $_SESSION['msg'] = "Nuevo usuario añadido.";
    }
}
