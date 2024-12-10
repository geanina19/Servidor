<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['enviar']) {
        if (!empty($_POST['ruta'])) {
            $ruta = $_POST['ruta'];
            if (is_dir($ruta)) {

                // Abrir el directorio
                $directorio = opendir($ruta);

                $infoArchivos = [];
                $totalLineas = 0;

                // Leer el contenido del directorio
                while (($archivo = readdir($directorio)) !== false) {
                    // Omitir los directorios especiales "." y ".."
                    $rutaArchivo = $ruta . "/" . $archivo;

                    // Obtener la extensión del archivo
                    $extension = pathinfo($archivo, PATHINFO_EXTENSION);

                    // Filtrar solo los archivos con la extensión .php
                    if (is_file($rutaArchivo) && $extension == 'php') {


                        $fichero = @fopen($rutaArchivo, 'r');
                        if ($fichero) { // Verificar si el archivo se ha abierto correctamente
                            $contadorLineas = 0;

                            // Leer línea por línea hasta el final del archivo
                            while (($linea = fgets($fichero)) !== false) {
                                $contadorLineas++;
                            }

                            // Sumar el número de líneas al total
                            $totalLineas += $contadorLineas;

                            // Cerrar el archivo
                            fclose($fichero);
                            
                            // Guardar la información del archivo en el array
                            $infoArchivos[] = [
                                'nombre' => $archivo,
                                'lineas' => $contadorLineas
                            ];
                        } else {
                            // Si el archivo no se pudo abrir, se puede agregar un mensaje de error
                            $infoArchivos[] = [
                                'nombre' => $archivo,
                                'lineas' => 'Error al abrir el archivo'
                            ];
                        }
                    }
                }

                // Cerrar el directorio
                closedir($directorio);

                // Mostrar la información de los archivos en una tabla
                $msg = "<strong>El directorio contiene</strong> : <br><br>";
                $msg .= "<table border='1' cellpadding='5' cellspacing='0'>";
                $msg .= "<tr>";
                $msg .= "<th style='text-align: center;'>Archivos</th>";
                $msg .= "<th style='text-align: center;'>Líneas de código</th>";
                $msg .= "</tr>";

                foreach ($infoArchivos as $archivo) {
                    $msg .= "<tr>";
                        $msg .= "<td>" . $archivo['nombre'] . "</td>";
                        $msg .= "<td>" . $archivo['lineas'] . "</td>";
                    $msg .= "</tr>";
                }

                $msg .= "</table><br><br>";

                $msg .= "<strong>Total de líneas directorio</strong> : " . $totalLineas;
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
    <title>Ver extención de un archivo</title>
</head>

<body>
    <form action="contarprogramas.php" method="POST">
        <label>Ruta del directorio:</label>
        <input type="text" name="ruta" id="ruta" value="<?= isset($_POST['ruta']) ? $_POST['ruta'] : "" ?>" size="50">
        <br><br>
        <input type="submit" name="enviar" id="enviar" value="Enviar">
    </form>
    <br>
    <?= $msg ?>
</body>

</html>