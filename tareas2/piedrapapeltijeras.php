<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piedra, papel, tijera</title>
    <style>
        p, h1 {
            margin: 25px;
        }

        .contenedorManos {
            display: flex;
            justify-content: flex-start; /* Alinea los elementos a la izquierda */
            align-items: flex-start; /* Alinea los elementos en la parte superior */
            width: fit-content;
        }

        .mensaje, .titulo {
            font-style: bold;
        }

        .titulo {
            margin: 0;
            padding: 0 35px;
            text-align: left;

        }

        .jugador1, .jugador2 {
            font-size: 100px;
            margin: 0;
            padding: 0;
        }

        .cajaJugador1, .cajaJugador2 {
            display: flex;
            flex-direction: column;
        }
        
    </style>
</head>
<body>
    <h1>¡Piedra, papel, tijera!</h1>
    <p>Actualice la página para mostrar otra partida.</p>

    <?php

        define ('PIEDRA1',  "&#x1F91C;");
        define ('PIEDRA2',  "&#x1F91B;");
        define ('TIJERAS',  "&#x1F596;");
        define ('PAPEL',    "&#x1F91A;");

        $jugador1 = random_int(1, 3);
        $jugador2 = random_int(1, 3);

        $mensaje = "";

        if ($jugador1 == 1 && $jugador2 == 1) {
            $mensaje = "Empate";
        } elseif ($jugador1 == 2 && $jugador2 == 2) {
            $mensaje = "Empate";
        } elseif ($jugador1 == 3 && $jugador2 == 3) {
            $mensaje = "Empate";
        } elseif ($jugador1 == 1 && $jugador2 == 2) {
            $mensaje = "Ha ganado el jugador 1";
        } elseif ($jugador1 == 1 && $jugador2 == 3) {
            $mensaje = "Ha ganado el jugador 2";
        } elseif ($jugador1 == 2 && $jugador2 == 1) {
            $mensaje = "Ha ganado el jugador 2";
        } elseif ($jugador1 == 2 && $jugador2 == 3) {
            $mensaje = "Ha ganado el jugador 1";
        } elseif ($jugador1 == 3 &&  $jugador2 == 1) {
            $mensaje = "Ha ganado el jugador 1";
        } elseif ($jugador1 == 3 && $jugador2 == 2) {
            $mensaje = "Ha ganado el jugador 2";
        }


        function partida (&$jugador1, &$jugador2) {
            if ($jugador1 == 1) {
                $jugador1 = PIEDRA1;
            } else if ($jugador1 == 2) {
                $jugador1 = TIJERAS;
            } else {
                $jugador1 = PAPEL;
            }
            

            if ($jugador2 == 1) {
                $jugador2 = PIEDRA2;
            } else if ($jugador2 == 2) {
                $jugador2 = TIJERAS;
            } else {
                $jugador2 = PAPEL;
            }
            
            return $jugador1;
            return $jugador2;
        }

        partida($jugador1, $jugador2);

        

    ?>

    <div class="contenedorManos">
        <div class="cajaJugador1">
            <p class="titulo">Jugador 1</p>
            <p class="jugador1"><?= $jugador1 ?></p>
        </div>
        
        <div class="cajaJugador1">
            <p class="titulo">Jugador 2</p>
            <p class="jugador2"><?= $jugador2 ?></p>
        </div>
        
    </div>

    <p class="mensaje"><?= $mensaje ?></p>

</body>
</html>