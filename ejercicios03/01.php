<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: solid 1px;
            border-spacing: 0;
            /*border-collapse: collapse;*/
        }

        td {
            border: solid 1px;
            padding: 10px;
        }
    </style>
</head>
<body>

    <?php

        $arrayNumAleatorios = array();

        //Guarda numeros aleatorios en el array
        function generarArray(&$arrayNumAleatorios) {
            while (count($arrayNumAleatorios) < 20) {
                $numRandom = random_int(1, 10);
                $arrayNumAleatorios[] = $numRandom;
            }
            return $arrayNumAleatorios;
        }

        function numMaximo(){

        }

        generarArray($arrayNumAleatorios);
        //print_r($arrayNumAleatorios);
        
        //Pinta un numero del arrya en una columna
        function pintarNumArray($arrayNumAleatorios) {
            foreach ($arrayNumAleatorios as $num) {
                echo "<td>$num</td>"; 
            }
        }
        
        

    ?>

    <h1>Array de 20 posiciones</h1>
    <table>
        <tr>
            <?= pintarNumArray($arrayNumAleatorios)?>
        </tr>
    </table>

</body>
</html>

