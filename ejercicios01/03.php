<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="03_2.css">
    <title>Ejer 03.1 de asteriscos</title>
    
</head>
<body>

    <!--Obtener un número al azar entre 1 y 9 y generar una pirámide con ese número de peldaños.
    Utilizar la marca <code></code> para que la visualización no se deforme por el tamaño de los 
    espacio o una estilo con tipo de letra monospace.-->
    
    <?php
    
        $numRandom = random_int(1, 9);

        //Mostrar el número random
        echo "El número random es : $numRandom <br><br>";

        echo "<code class='codification'>";
            for ($i = 1; $i <= $numRandom; $i++) {

                // Imprime espacios en blanco para centrar
                echo str_repeat(' ', $numRandom - $i);  

                // Imprime asteriscos, cuya cantidad aumenta a medida que se avanza en los escalones.
                echo str_repeat('*', 2 * $i - 1) . "\n";  

            }
        echo "</code>";

    ?>

    <hr>

    <?php show_source(__FILE__); ?>

</body>
</html>

