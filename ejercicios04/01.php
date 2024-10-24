<?php

    function comprobarUser() {

        $arrayNombres = [
            'Pepe'=> 1234,
            'Maria'=> 'maria',
            'Dani'=> 'dani'
        ];
    
        $nombreUser = $_REQUEST['nombre'];
        $claveUser = $_REQUEST['clave'];
        $mensaje = '';
    
        if(empty($nombreUser) || empty($claveUser)) {
            $mensaje = 'Hay que completar todos los campos';
        } else {
            //el resultado de la clave $nombreUser del array $arrayNombres, por ejemplo muestra 1234, entonces comparamos ese valor con la clave introducida por el user
            if(array_key_exists($nombreUser, $arrayNombres) && $arrayNombres[$nombreUser] == $claveUser) {
                $mensaje = 'Bienvenido ' . $nombreUser . '.';
            } else {
                $mensaje = 'Usuario o clave incorrecta.';
            }
        }
        return $mensaje;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 1</title>
</head>
<body>
    <h1>Respuesta</h1>
    <p><?= comprobarUser() ?></p>
</body>
</html>