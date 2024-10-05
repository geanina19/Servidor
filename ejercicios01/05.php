<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Refresca la página cada 3 segundos-->
    <meta http-equiv="refresh", content="3">
    <link rel="stylesheet" href="05_2.css">
    <title>Ejer 05.1 ejer 1 mejorado con tabla</title>
</head>
<body>

    <!--Realizar un segunda versión del primer ejercicio donde la página de resultado tiene que mostrar una tabla con el siguiente  formato utilizando estilo.-->
    
    <?php

        $num1Random = random_int(1, 10);
        $num2Random = random_int(1,10);

        echo "1º Número : $num1Random <br>";
        echo "2º Número : $num2Random <br><br>";

        echo "<table>
                <tr>
                    <th class = 'textOperacion'>Operación </th>
                    <th class = 'textResultado'>Resultado </th>
                </tr>

                <tr>
                    <td>$num1Random + $num2Random</td>
                    <td class ='resultado'>" . ($num1Random + $num2Random) . "</td>
                </tr>

                <tr>
                    <td>$num1Random - $num2Random</td>
                    <td class ='resultado'>" . ($num1Random - $num2Random) . "</td>
                </tr>
                
                <tr>
                    <td>$num1Random * $num2Random</td>
                    <td class ='resultado'>" . ($num1Random * $num2Random) . "</td>
                </tr>
                
                <tr>
                    <td>$num1Random / $num2Random</td>
                    <td class ='resultado'>" . ($num1Random / $num2Random) . "</td>
                </tr>
                
                <tr>
                    <td>$num1Random % $num2Random</td>
                    <td class ='resultado'>" . ($num1Random % $num2Random) . "</td>
                </tr>
                
                <tr>
                    <td>$num1Random<sup>$num2Random</sup></td>
                    <td class ='resultado'>" . ($num1Random ** $num2Random) . "</td>
                </tr>
            </table>";

    ?>

    <hr>

    <?php show_source(__FILE__); ?>

</body>
</html>
<!--
echo "<table>";
            echo "<tr>";
                echo "<th>Operación</th>";
                echo "<th>Resultado</th>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>$num1Random + $num2Random</td>";
                echo "<td>" . $num1Random + $num2Random . "</td>";
                echo ;
-->