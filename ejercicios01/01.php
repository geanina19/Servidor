<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 01.1 de operadores</title>
</head>
<body>

    <!--Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10 y mostrar su suma, su resta, su división, su multiplicación, módulo y potencia-->

    <?php 
    
        $num1 = random_int(1, 10);
        $num2 = random_int(1, 10);


        echo "1º Número : $num1 <br>";
        echo "2º Número : $num2 <br><br>";

        echo "Suma : <br>";
        echo "$num1 + $num2 = ". $num1 + $num2 . "<br><br>";

        echo "Resta : <br>";
        echo "$num1 - $num2 = ". $num1 - $num2 . "<br><br>";

        echo "División : <br>";
        echo "$num1 / $num2 = ". $num1 / $num2 . "<br><br>"; // te devuelve el cociente

        echo "Multiplicación : <br>";
        echo "$num1 * $num2 = ". $num1 * $num2 . "<br><br>";

        echo "Módulo / División que devuelve la resta : <br>";
        echo "$num1 % $num2 = ". $num1 % $num2 . "<br><br>"; // División que devuelve la resta 

        echo "Potencia : <br>";
        echo "$num1 ** $num2 = ". $num1 ** $num2 . "<br><br>";

    ?>

    <hr>

    <?php show_source(__FILE__); ?>

</body>
</html>