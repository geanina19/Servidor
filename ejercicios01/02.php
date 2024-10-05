<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="02_2.css">
    <title>Ejer 02.1 escalera</title>

</head>
<body>

    <!--Obtener un número al azar entre 1 y 9 y generar una la escalera numérica del tamaño indicado alternando colores entre rojo y azul-->

    <?php

        $numRandom = random_int(1, 9);

        //Mostrar el número random
        echo "El número random es : $numRandom <br><br>";

        for ($i = 1; $i <= $numRandom; $i++) {

            //Alternar los colores
            /*Si el resto de 2 es 0 quiere decir que es par, por lo tanto se pinta del primer color, que es el rojo ...
            ... si es impar, se pintará de color azul*/
            $color = ($i % 2 == 0) ? 'red' : 'blue';

            //
            echo "<p class='$color'>";
                for ($j = 1; $j <= $i; $j++) {
                    echo "$i";
                }
            echo "</p>";
        }
    
    ?>

    <hr>

    <?php show_source(__FILE__); ?>


</body>
</html>