<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['enviar']) {
        if (!empty($_POST['ruta'])) {
            $ruta = $_POST['ruta'];
            if (is_dir($ruta)) {
                // Abrir el directorio
                $directorio = opendir($ruta);
                
                // Array para guardar la información de los archivos
                $infoArchivos = [];

                // Leer el contenido del directorio
                while (($archivo = readdir($directorio)) !== false) {
                    // Omitir los directorios especiales "." y ".."
                    if ($archivo != "." && $archivo != "..") {
                        $rutaArchivo = $ruta . "/" . $archivo;
                        
                        // Obtener el tipo y tamaño del archivo
                        $tipo = is_file($rutaArchivo) ? mime_content_type($rutaArchivo) : "Directorio";
                        $tamano = is_file($rutaArchivo) ? filesize($rutaArchivo) : 0;
                        
                        // Guardar la información del archivo en el array
                        $infoArchivos[] = [
                            'nombre' => $archivo,
                            'tipo' => $tipo,
                            'tamano' => $tamano
                        ];
                    }
                }

                // Cerrar el directorio
                closedir($directorio);

                // Función para comparar el tamaño de los archivos
                function compararTamanio($a, $b) {
                    return $a['tamano'] <=> $b['tamano'];
                }

                // Ordenar los archivos por tamaño de menor a mayor
                usort($infoArchivos, 'compararTamanio');

                // Mostrar la información de los archivos en una tabla
                $msg = "<strong>El directorio contiene</strong> : <br><br>";
                $msg .= "<table border='1' cellpadding='5' cellspacing='0'>";
                $msg .= "<tr>";
                $msg .= "<th style='text-align: center;'>Archivos</th>";
                $msg .= "<th style='text-align: center;'>Tipo</th>";
                $msg .= "<th style='text-align: center;'>Tamaño</th>";
                $msg .= "</tr>";

                foreach ($infoArchivos as $archivo) {
                    $msg .= "<tr>";
                    $msg .= "<td>" . $archivo['nombre'] . "</td>";
                    $msg .= "<td>" . $archivo['tipo'] . "</td>";
                    $msg .= "<td>" . ($archivo['tamano'] == 0 ? "Directorio" : $archivo['tamano'] . " bytes") . "</td>";
                    $msg .= "</tr>";
                }

                $msg .= "</table>";

            } else {
                $msg = "Introduzca la ruta de un directorio, no de un fichero.";
            }
        } else {
            $msg = "Por favor, indique una ruta de un directorio.";
        }
    } else {
        $msg = "No se ha enviado nada.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver información de directorio</title>
</head>
<body>
    <form action="verdirinfo.php" method="POST">
        <label>Ruta del directorio:</label>
        <input type="text" name="ruta" id="ruta" value="<?= isset($_POST['ruta']) ? $_POST['ruta'] : "" ?>" size="50">
        <br><br>
        <input type="submit" name="enviar" id="enviar" value="Enviar">
    </form>
    <br>
    <?= $msg ?>
</body>
</html>
