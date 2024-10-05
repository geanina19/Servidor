<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 04.1 de microsegundos</title>
</head>
<body>

    <!--Generar números al azar entre 1 y 10 hasta que se generen 3 veces 
    el valor 6 de forma consecutiva en ese caso se mostrará cuantos número se han generado. 
    Para obtener los segundos utilizamos la función microtime(true) para obtener la fecha actual en segundos.-->

    <?php

        // Inicializamos variables

        // Contador de números generados
        $contadorNumeros = 0;

        // Contador de 6 consecutivos
        $contador6Seguidos = 0;

        // Número de veces que debe aparecer el 6 seguido
        $max6Seguidos = 3;

        // Empezamos a contar el tiempo de ejecución
        $inicioTiempo = microtime(true);

        // Bucle para generar números aleatorios hasta que aparezcan 3 veces el 6 seguido
        /* Usamos el "<" para que en el momento que detecte 3 de 6, el progrma se pare, con el "<=" se ejecutara una vuelta más 
        aunque ya se hayan encontrado 3 nums de 6 */
        while ($contador6Seguidos < $max6Seguidos) {
            // Generamos un número aleatorio entre 1 y 10
            $numero = random_int(1, 10);
            
            // Incrementamos el contador de números generados
            $contadorNumeros++;

            // Verificamos si el número generado es 6
            if ($numero === 6) {
                // Si es 6, aumentamos el contador de 6 consecutivos
                $contador6Seguidos++;
            } else {
                // Si no es 6, reiniciamos el contador de 6 consecutivos
                $contador6Seguidos = 0;
            }
        }

        // Terminamos de contar el tiempo de ejecución
        $finTiempo = microtime(true);
        
        // Calculamos el tiempo total en milisegundos
        $tiempoEjecucion = ($finTiempo - $inicioTiempo) * 1000;

        // Mostramos el resultado
        echo "<p>Han salido tres 6 seguidos tras generar $contadorNumeros números en " . number_format($tiempoEjecucion, 3) . " milisegundos.</p>";


    ?>

    <hr>

    <?php show_source(__FILE__); ?>

</body>
</html>