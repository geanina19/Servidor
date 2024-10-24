<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego cinco dados</title>
    <style>
        .contenedorJugador1 {
            display: flex;
            align-items: center;
        }

        .contenedorJugador2 {
            display: flex;
            align-items: center;
            margin-top: 1px;
        }

        table {
            margin-left: 10px;
            /*border: solid 1px black;*/
            margin: 0%;
            text-align: center;
        }

        .contenedorTabla1 {
            background-color: #ff0000;
            margin-left: 3px;
            margin-right: 3px;
        }

        .contenedorTabla2 {
            background-color: #0000ff;
            margin-left: 3px;
            margin-right: 3px;
        }

        td {
            font-size: 50px;
        }

        .columnasDados {
            background-color: #ff0000;
        }

        .jugadores {
            font-size: 15px;
        }

        label {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <?php 
        /*El juego simula la partida entre dos jugadores el rojo y el azul, cada jugador realiza una tirada de 6 datos, 
        ganando el jugador que más puntos tiene, eliminado la puntuación de dos datos: un dado con el valor más alto y 
        otro dado con el valor más bajo.*/

        define ('LADO1',  "&#9856;");
        define ('LADO2',  "&#9857;");
        define ('LADO3',  "&#9858;");
        define ('LADO4',    "&#9859;");
        define ('LADO5',    "&#9860;");
        define ('LADO6',    "&#9861;");

        $arrayDados1 = array();
        $arrayDados2 = array();

        function generarCincoDados(&$arrayDados1, &$arrayDados2) {

            while (count($arrayDados1) < 5) {
                $numRnadom1 = random_int(1,6);
                $arrayDados1[] = $numRnadom1;
            }

            while (count($arrayDados2) < 5) {
                $numRnadom2 = random_int(1,6);
                $arrayDados2[] = $numRnadom2;
            }

            return $arrayDados1;
            return $arrayDados2;
        }

        generarCincoDados($arrayDados1, $arrayDados2);

        function pintarNumArray($arrayDados) {
            foreach ($arrayDados as $num) {
                switch ($num) {
                    case 1: echo "<td>" . LADO1 . "</td>"; break;
                    case 2: echo "<td>" . LADO2 . "</td>"; break;
                    case 3: echo "<td>" . LADO3 . "</td>"; break;
                    case 4: echo "<td>" . LADO4 . "</td>"; break;
                    case 5: echo "<td>" . LADO5 . "</td>"; break;
                    case 6: echo "<td>" . LADO6 . "</td>"; break;
                } 
            }
        }

        /*
        // Función para pintar cualquier array usando hash map
        function pintarNumArray($arrayDados) {
            $dadosMap = [
                1 => LADO1,
                2 => LADO2,
                3 => LADO3,
                4 => LADO4,
                5 => LADO5,
                6 => LADO6
            ];

            foreach ($arrayDados as $num) {
                echo "<td>" . $dadosMap[$num] . "</td>";
            }
        }
        */

        function calcularPuntos($arrayDados) {
            /*Cálculo: 
                1-> sumar todos los números del array
                2-> sumar el número más ato y el más bajo
            Resultado:
                -> restar el numero total con la suma del mayor y el menor
            */
            $mayor = max($arrayDados);
            $menor = min($arrayDados);
            $sumarTodo = array_sum($arrayDados);

            $quitar = $mayor + $menor;

            $resultado = $sumarTodo - $quitar;

            return $resultado;
        }

        function ganador($arrayDados1, $arrayDados2) {
            $jugador1 = calcularPuntos($arrayDados1);
            $jugador2 = calcularPuntos($arrayDados2);
            $mensaje = "";

            if ($jugador1 < $jugador2) {
                $mensaje = "Ha ganado el Jugador 2";
            } else {
                $mensaje = "Ha ganado el Jugador 1";
            }

            return $mensaje;

        }
    
    ?>

    <h1>Cinco dados</h1>
    <p>Actualice la página para mostrar una nueva tirada.</p>
    <div class="todosLosDados">
        <div class="contenedorJugador1">
            <label class="jugadores"> Jugador 1 </label>
            <div class="contenedorTabla1">
                <table>
                    <tr>
                        <?= pintarNumArray($arrayDados1)?>
                    </tr>
                </table>
            </div>
            <label><?= calcularPuntos($arrayDados1); ?> puntos</label>
        </div>

        <div class="contenedorJugador2">
            <label class="jugadores"> Jugador 2 </label>
            <div class="contenedorTabla2">
                <table>
                    <tr>
                        <?= pintarNumArray($arrayDados2)?>
                    </tr>
                </table>
            </div>
            <label><?= calcularPuntos($arrayDados2); ?> puntos</label>
        </div>
    </div>
    
    <label>Resultado </label><?= ganador($arrayDados1, $arrayDados2);?>

</body>
</html>