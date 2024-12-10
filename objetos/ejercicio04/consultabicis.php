<?php

    include_once 'BiciElectrica.php';
    

    // Carga la tabla de bicis disponibles
    function cargabicis() {
        $bicicletas = [];
        $fichero = 'Bicis.csv';
        $ficheroAbierto = fopen($fichero, 'r');

        while (($datos = fgetcsv($ficheroAbierto)) !== false) {
            // Crear un nuevo objeto BiciElectrica con los datos leídos
            $bici = new BiciElectrica(
                $datos[0], // id
                $datos[1], // coordx
                $datos[2], // coordy
                $datos[3], // bateria
                $datos[4] // operativa
            );
            // Agrega la bicicleta al array
            $bicicletas[] = $bici; 

        }
        fclose($ficheroAbierto);

        return $bicicletas;
    }

    // Devuelve la bici con menor distancia a las coordenadas de usuario.
    function bicimascercana($coordx, $coordy, $tabla) {

        $biciCercana = null; // Inicializa la bicicleta más cercana
        $distanciaMinima = null; // Inicializa la distancia mínima como null

        foreach ($tabla as $bici) {
            if ($bici->operativa) {
                $distancia = $bici->distancia($coordx, $coordy);
                
                // Si no se ha encontrado ninguna bici cercana aún, o si la distancia actual es menor
                if ($distanciaMinima === null || $distancia < $distanciaMinima) {
                    $distanciaMinima = $distancia;
                    $biciCercana = $bici;
                }
            }
        }

        return $biciCercana;
    }
    
    // Programa principal
    $tabla = cargabicis();
    
    if (!empty($_GET['coordx']) && !empty($_GET['coordy'])) {
        $biciRecomendada = bicimascercana($_GET['coordx'], $_GET['coordy'], $tabla);
    }

    // Devuelve una cadena con la tabla html de bicis operativas
    function mostrartablabicis ($tabla) {
        $msg = '<table>';
        $msg .= '<tr>
                    <th>ID</th>
                    <th>Coord X</th>
                    <th>Coord Y</th>
                    <th>Bateria</th>
                </tr>';
    
        // Recorre el array de bicicletas
        foreach ($tabla as $bici) {
            if ($bici->operativa) { // Solo mostrar bicicletas operativas
                
                $msg .= '<tr>';
                $msg .= '<td>' . htmlspecialchars($bici->id) . '</td>'; // ID de la bicicleta
                $msg .= '<td>' . htmlspecialchars($bici->coordx) . '</td>'; // Coordenada X
                $msg .= '<td>' . htmlspecialchars($bici->coordy) . '</td>'; // Coordenada Y
                $msg .= '<td>' . htmlspecialchars($bici->bateria) . '%</td>'; // Batería
                $msg .= '</tr>';
            }
        }
    
        $msg .= '</table>';
        return $msg;
    }

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>MOSTRAR BICIS OPERATIVAS</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>

</head>

<body>
    <h1> Listado de bicicletas operativas </h1>
    <?= mostrartablabicis($tabla); ?>
    <?php if (isset($biciRecomendada)) : ?>
        <h2> Bicicleta disponible más cercana es <?= $biciRecomendada ?> </h2>
        <button onclick="history.back()"> Volver </button>
    <?php else : ?>
        <h2> Indicar su ubicación: <h2>
        <form>
            Coordenada X: <input type="number" name="coordx"><br>
            Coordenada Y: <input type="number" name="coordy"><br>
            <input type="submit" value=" Consultar ">
         </form>
    <?php endif ?>
</body>

</html>