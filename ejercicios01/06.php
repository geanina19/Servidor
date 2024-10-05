<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="06_2.css">
    <title>Ejer 06.1 tabla multiplicar</title>
</head>
<body>

    <!-- -->
    
    <?php

        $numRandom = random_int(1,10);

        echo "<div class = 'contenedor'>";

            echo "<div class = 'divTituloGrande'>";
                echo "<h1>TABLA DE MULTIPLICAR</h1>";
            echo "</div>";

            echo "<div class = 'divTabla'>";
                echo "<table>
                        <tr>
                            <th>Tabla del $numRandom</th>
                            <td> </td>
                        </tr>
                        
                        <tr>
                            <td>$numRandom x 1 = </td>
                            <td>" . ($numRandom * 1) . "</td>
                        </tr>

                        <tr>
                            <td>$numRandom x 2 = </td>
                            <td>" . ($numRandom * 2) . "</td>
                        </tr>

                        <tr>
                            <td>$numRandom x 3 = </td>
                            <td>" . ($numRandom * 3) . "</td>
                        </tr>

                        <tr>
                            <td>$numRandom x 4 = </td>
                            <td>" . ($numRandom * 4) . "</td>
                        </tr>

                        <tr>
                            <td>$numRandom x 5 = </td>
                            <td>" . ($numRandom * 5) . "</td>
                        </tr>

                        <tr>
                            <td>$numRandom x 6 = </td>
                            <td>" . ($numRandom * 6) . "</td>
                        </tr>

                        <tr>
                            <td>$numRandom x 7 = </td>
                            <td>" . ($numRandom * 7) . "</td>
                        </tr>

                        <tr>
                            <td>$numRandom x 8 = </td>
                            <td>" . ($numRandom * 8) . "</td>
                        </tr>

                        <tr>
                            <td>$numRandom x 9 = </td>
                            <td>" . ($numRandom * 9) . "</td>
                        </tr>

                        <tr>
                            <td>$numRandom x 10 = </td>
                            <td>" . ($numRandom * 10) . "</td>
                        </tr>";
                echo "</table>";

            echo "</div>";

        echo "</div>";

    ?>

</body>
</html>