<?php

$nombres = ["Juan","Pedro","María","Elena","Luis"];
$notas  = [7.5, 6.0, 7.8, 9.5, 3.5 ];
// Une los array en uno nuevo
$calificaciones = unir ($nombres, $notas);
// Creo un nuevo array
$datos = separar($calificaciones);
echo "<code><pre>";
print_r($calificaciones);
print_r($datos);
echo "</pre></code>";


// Une dos arrays en un array asociativo
function unir($nombres,$notas){
$mapa = [];
    // Recorre los arrays nombre y notas y los va añadiendo al array asociativo mapa
    for ($i=0; $i < count($nombres); $i++) { 
        $mapa[$nombres[$i]] = $notas[$i];
    }
return $mapa;
}


// Separa un array asociativo en un array de dos filas
function separar($mapa){
$arr = [];
$cont = 0;
// Recorre el array asociativo y lo voy separando por clave y valor
// Guarda cada elemento en su fila del array final
foreach ($mapa as $key => $value) {
    $arr[0][$cont] = $key;
    $arr[1][$cont] = $value;
    $cont++;
}

return $arr;
}

?>