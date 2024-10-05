<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 01.2 pasar por referencia C</title>
</head>
<body>
    <?php

        //Realizar y probar una función en PHP  llamada elMayor  que reciba tres números: A,B y C. La función almacenará en C el valor que sea mayor A o B. 
        //En el caso sean iguales almacenará el valor 0 en C 
        //¿Qué parámetros se deberían pasar por valor o copia y cuales por referencia?

        $numA = random_int(1, 10);
        $numB = random_int(1, 10);
        $numC = 0;

        //& -> está haciendo referencia al espacio de almacenamiento de $numC
        /*como $C va a cambiar, para hacer que se guarde en $numC, ponemos & para que se referencie
        */
        function elMayor($A, $B, &$C) {
            if ($A > $B) {
                $C = $A;
            }
            else if ($A < $B) {
                $C = $B;
            }
            else {
                $C = 0;
            }
        }

        
        echo "El número A es : " . $numA . "<br><br>";
        echo "El número B es : " . $numB . "<br><br>";
        elMayor($numA, $numB, $numC);
        echo "El número C es : " . $numC . "<br><br>";

    ?>
</body>
</html>