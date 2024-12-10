<?php

$fichero = @fopen('fichero.txt', 'w');

fwrite($fichero, "Nuevo contenido del archivo.\n");
fwrite($fichero, "Más contenido.\n");
fwrite($fichero, "Aún más contenido.\n");
fwrite($fichero, "Nada que ver.\n");

fclose($fichero);

function contarCaracteres() {
    $fichero = @fopen('fichero.txt', 'r');

    $contadorCaracteres = 0;
    // Leer carácter por carácter hasta el final del archivo
    while (($caracter = fgetc($fichero)) !== false) {
        $contadorCaracteres++;
    }
    
    fclose($fichero);

    return $contadorCaracteres;
}

function contarLineas() {
    $fichero = @fopen('fichero.txt', 'r');

    $contadorLineas = 0;
    // Leer carácter por carácter hasta el final del archivo
    while (($linea = fgets($fichero)) !== false) {
        $contadorLineas++;
    }
    
    fclose($fichero); // Cerrar el archivo

    return $contadorLineas;
}

function mostrarContenido() {
    $fichero = @fopen('fichero.txt', 'r');

    $contenido = '';

    // Leer linea por linea hasta el final del archivo
    while (($linea = fgets($fichero)) !== false) {
        $contenido .= $linea . "<br>";
    }
    
    fclose($fichero);

    return $contenido;
}



echo "<strong>El archivo tiene : </strong>" . contarCaracteres() . " caracteres. <br><br>";

echo "<strong>El archivo contiene : </strong>" . contarLineas() . " líneas. <br><br>";

echo "<strong>El archivo contiene : </strong><br><br>" . mostrarContenido();