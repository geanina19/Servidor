<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nombre = htmlspecialchars($_REQUEST['nombre']);
        $alias = htmlspecialchars($_REQUEST['alias']);
        $edad = ($_REQUEST['edad']).trim('');
        $mensajeGeneral = '';
        $armas = array();
        $artesSeleccionado = $_REQUEST['artesMagicas'];
        $archivoSubido = $_FILES['archivo'];


        // validar los campos obligatorios por si se quita el required del html
        function validarCamposObligatorios($nombre, $alias, $edad) {
            $errores = array();

            // Validar que los campos no estén vacíos
            if (empty($nombre)) {
                $errores[] = "El campo 'Nombre' es obligatorio.";
            }

            if (empty($alias)) {
                $errores[] = "El campo 'Alias' es obligatorio.";
            }

            if (empty($edad)) {
                $errores[] = "El campo 'Edad' es obligatorio.";
            } elseif (!is_numeric($edad) || $edad <= 0) {
                $errores[] = "El campo 'Edad' debe ser un número positivo.";
            }

            return $errores;
        }

        $mensajeErrores = validarCamposObligatorios($nombre, $alias, $edad);

        // Si hay errores se vuelve a cargar captura.html
        if (!empty($mensajeErrores)) {
            // formulario con los errores de la validacion
            foreach ($mensajeErrores as $error) {
                echo "<p style='color:red;'>$error</p>";
            }

            include_once("captura.html");
            exit;
        }

        function obtenerArmasSeleccionadas() {
            
            // Verificamos que checkbox se han seleccionado
            if (isset($_REQUEST['maza'])) {
                $armas[] = 'Maza';
            }
            if (isset($_REQUEST['antorcha'])) {
                $armas[] = 'Antorcha';
            }
            if (isset($_REQUEST['martillo'])) {
                $armas[] = 'Martillo';
            }
            if (isset($_REQUEST['latigo'])) {
                $armas[] = 'Látigo';
            }
        
            // si se han seleccionado armas, se añaden al array de armas.
            if (empty($armas)) {
                return 'No se seleccionaron armas.';
            } else {
                return implode(', ', $armas);
            }
        }

        function respuestaArtesMagicas($artesSeleccionado) {
            switch ($artesSeleccionado) {
                case 'si':
                    return 'Sí';
                case 'no':
                    return 'No';
                default:
                    return 'No se especifica si practica artes mágicas o no.';
            }
        }
 
        function imagen() {
            $directorio = 'uploads/';
            $imgCalavera = 'calavera.png';
            $mensaje = '';
        
            // Verificamos si existe seleccionado algún archivo y si ese archivo tiene un nombre
            if (isset($_FILES['archivo']) && !empty($_FILES['archivo']['name'])) {
                // Obtenemos el nombre del archivo subido
                $archivoSubido = basename($_FILES['archivo']['name']);
                $rutaArchivo = $directorio . $archivoSubido;
                
                // Sacamos la extensión de un archivo
                $extension = pathinfo($archivoSubido, PATHINFO_EXTENSION);
                
                // 10 KB en bytes
                $tamanioMax = 10 * 1024; 
        
                // Aquí se debe acceder a $_FILES['archivo']['size'] para obtener el tamaño del archivo
                if ($_FILES['archivo']['size'] < $tamanioMax) {
                    if ($extension === 'png') {
                        // Movemos el archivo a la carpeta 'uploads'
                        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivo)) {
                            // Si el archivo se movió con éxito, mostramos el archivo subido
                            $mensaje = '<label>Imagen subida :</label><br><br>
                                        <img src="' . $directorio . $archivoSubido . '" alt="Imagen subida">';
                        } else {
                            // Si ocurre algún error al mover el archivo
                            $mensaje = '<label>No se subió ninguna imagen.</label><br><br>
                                        <img src="' . $imgCalavera . '" alt="Imagen de calavera"><br><br>
                                        <p>Error al subir la imagen.</p>';
                        }
                    } else {
                        // Si ocurre un error por extensión
                        $mensaje = '<label>No se subió ninguna imagen, solo se permite extensión .png.</label><br><br>
                                    <img src="' . $imgCalavera . '" alt="Imagen de calavera"><br><br>
                                    <p>Error al subir la imagen.</p>';
                    }
                } else {
                    // Si el archivo excede el tamaño permitido
                    $mensaje = '<label>No se subió ninguna imagen,<br> debe pesar menos de 10 kbytes.</label><br><br>
                                <img src="' . $imgCalavera . '" alt="Imagen de calavera"><br><br>
                                <p>Error al subir la imagen.</p>';
                }
            } else {
                // Si no se subió ningún archivo o hubo un error al subir
                $mensaje = '<label>No se subió ninguna imagen.</label><br><br>
                            <img src="' . $imgCalavera . '" alt="Imagen de calavera"><br><br>';
            }
        
            return $mensaje;
        }
        
        



?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultado del post</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0; 
                background-color: rgb(94, 91, 91);
            }

            label {
                font-weight: bold;
            }

            .divGeneral {
                border: 1px solid #000000;
                display: inline-block;
                background-color: #ffff00;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
                padding: 20px;
            }

            .divInformacion {
                display: flex; 
                justify-content: space-between; 
                align-items: flex-start; 
                gap: 20px; 
            }

            .divFormulario {
                line-height: 1.8;
                flex: 1;
            }

            .divImagen img {
                max-width: 150px;
                height: auto;
            }

            .titulo {
                text-align: center;
                padding: 5px;
                color: black;
            }
        </style>
    </head>
    <body>
        <div class="divGeneral">
            <div class="titulo">
                <h1>Datos del Jugador</h1>
            </div>
            <br>
            <form>
                <div class="divInformacion">
                    <div class="divFormulario">
                        <label>Nombre : </label><?=$nombre?><br>
                        <label>Alias : </label><?=$alias?><br>
                        <label>Edad : </label><?=$edad?><br>
                        <label>Armas seleccionadas : </label><br>
                        <?=obtenerArmasSeleccionadas()?><br>
                        <label>¿Practica artes mágicas? : </label><br>
                        <?=respuestaArtesMagicas($_REQUEST['artesMagicas'])?><br><br>
                    </div>
                    <div class="divImagen">
                        <?=imagen()?>
                    </div>
                </div>
            </form>
        </div>
    </body>
    </html>


<?php 
    } else {
        // Si la petición GET
        include_once("captura.html");
    }
?>
    
