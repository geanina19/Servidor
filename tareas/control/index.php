<?php
session_start();

include_once('app/funciones.php');

if (!isset($_SESSION['intentos'])) {
  $_SESSION['intentos'] = 0;
}


if (!empty($_GET['login']) && !empty($_GET['clave'])) {
  if (userOk($_GET['login'], $_GET['clave'])) {
    $_SESSION['intentos'] = 0;
    if (getUserRol($_GET['login']) == ROL_PROFESOR) {
      $contenido = verNotaTodas($_GET['login']);
    } else {
      $contenido = verNotasAlumno($_GET['login']);
    }
    include_once('app/resultado.php');
  }
  // userOK falso
  else {
    $_SESSION['intentos']++;
        
    if ($_SESSION['intentos'] < 5) {
        $contenido = "El número de usuario y la contraseña no son válidos";
        include_once('app/acceso.php');
    } else {
        include_once('app/errorIntentos.php');
        $_SESSION['intentos'] = 0;
    }
    
  }
} else {
  $contenido = " Introduzca su número de usuario y su contraseña";
  include_once('app/acceso.php');
}
