<?php
require_once ('dat/datos.php');
/**
 *  Devuelve true si el código del usuario y contraseña se 
 *  encuentra en la tabla de usuarios
 *  @param $login : Código de usuario
 *  @param $clave : Clave del usuario
 *  @return true o false
 */
function userOk($login,$clave):bool {
    global $usuarios;

    // cada elemento (subarray) del array $usuarios y lo asigna temporalmente a $user
    if(array_key_exists($login,  $usuarios) &&  $usuarios[$login][1] == $clave) {
        return true;
    } else {
        return false;
    }

}

/**
 *  Devuelve el rol asociado al usuario
 *  @param $login: código de usuario
 *  @return ROL_ALUMNO o ROL_PROFESOR
 */
function getUserRol($login){
    global $usuarios;

    if (array_key_exists($login, $usuarios)) {
        return $usuarios[$login][2];
    }

    return null;
}

/**
 *  Muestra las notas del alumno indicado.
 *  @param $codigo: Código del usuario
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */

function verNotasAlumno($codigo):String{
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $nombre = "";

    if (array_key_exists($codigo, $usuarios)) {
        $nombre = $usuarios[$codigo][0];
    }

    $msg .= " Bienvenido/a alumno/a: ". $nombre;
    $msg .= "<hr style='border: 1.5px solid black;'>";
    $msg .= "<table style='border: none;'>";
        $msg .= "<tr style='border: none;'>";
            $msg .= "<th style='text-align: center; border: none;'>Módulo</th>";
            $msg .= "<th style='border: none;'>Nota</th>";
        $msg .= "</tr>";
        for ($i = 0; $i < count($nombreModulos); $i++) {
            $msg .= "<tr style='border: none;'>";
                $msg .= "<td style='border: none;'>" . $nombreModulos[$i] . "</td>";
                $msg .= "<td style='border: none;'>" . $notas[$codigo][$i] . "</td>";
            $msg .= "</tr>";
        }

    $msg .= "</table>";
    return $msg;
}

/**
 *  Muestra las notas de todos alumnos. 
 *  @param $codigo: Código del profesor
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */

function verNotaTodas($codigo): String {
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $nombre = "";

    if (array_key_exists($codigo, $usuarios)) {
        $nombre = $usuarios[$codigo][0];
    }

    $msg .= " Bienvenido Profesor: ". $nombre;
    $msg .= "<hr style='border: 1.5px solid black;'>";
    $msg .= "<table style='border: 1px solid black;'>";
        $msg .= "<tr>";
            $msg .= "<th style='text-align: center;'>Nombre</th>";
            
            for ($i = 0; $i < count($nombreModulos); $i++) {
                $msg .= "<th style='text-align: center;'>" . $nombreModulos[$i] . "</th>";
                
            }
            
        $msg .= "</tr>";

        foreach ($usuarios as $codigo => $user) {
            if ($user[2] == ROL_ALUMNO) {
                $msg .= "<tr>";
                $msg .= "<td style='border: 1px solid black;'>" . $user[0] . "</td>";
    
                foreach ($notas[$codigo] as $nota) {
                       $msg .= "<td style='border: 1px solid black;'>$nota</td>";
                }
                
                $msg .= "</tr>";
            }
        }
    $msg .= "</table>";
    return $msg;
}

