<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Refresca la página cada 3 segundos-->
    <meta http-equiv="refresh", content="3">
    <link rel="stylesheet" href="07_2.css">
    <title>Ejer 07.1 tamanio fila generado</title>
</head>
<body>
    
    <!--Elegir tres valores entre 100 y 500 y pintar tres barras de color rojo, verde y azul del tamaño indicado.-->

    <?php

        $numRojo = random_int(100, 500);
        $numVerde = random_int(100, 500);
        $numAzul = random_int(100, 500);

        echo "<div class = 'divRojo' style='width: " . $numRojo . "px'>
                <p> Rojo($numRojo) </p>
            </div>";

        echo "<div class = 'divVerde' style='width: " . $numVerde . "px'>
                <p> Verde($numVerde) </p>
            </div>";

        echo "<div class = 'divAzul' style='width: " . $numAzul . "px'>
                <p> Azul($numAzul) </p>
            </div>";

    ?>

    <hr>

    <?php show_source(__FILE__); ?>

</body>
</html>