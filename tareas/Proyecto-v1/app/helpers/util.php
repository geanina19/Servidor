<?php

/*
 *  Funciones para limpiar la entrada de posibles inyecciones
 */

function limpiarEntrada(string $entrada): string
{
    $salida = trim($entrada); // Elimina espacios antes y después de los datos
    $salida = strip_tags($salida); // Elimina marcas
    return $salida;
}
// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada)
{

    foreach ($entrada as $key => $value) {
        $entrada[$key] = limpiarEntrada($value);
    }
}


//----------------------------------------------------------

function verificarExistenciaCorreo($correo)
{
    $db = AccesoDatosPDO::getModelo();
    $cli = $db->getCorreo($correo);

    if ($cli == true) {
        return true;
    } else {
        return false;
    }
}


function verificarExistenciaIp($ip)
{
    $db = AccesoDatosPDO::getModelo();
    $cli = $db->getIP($ip);
    if ($cli == true) {
        return true;
    } else {
        return false;
    }
}

function verificarExistenciaTelefono($telefono)
{
    $db = AccesoDatosPDO::getModelo();
    $cli = $db->getTelefono($telefono);
    if ($cli == true) {
        return true;
    } else {
        return false;
    }
}


function verificarIP($ip)
{
    $segmentos = explode('.', $ip);

    if (count($segmentos) !== 4) {
        return false;
    }

    foreach ($segmentos as $segmento) {
        if (!is_numeric($segmento) || $segmento < 0 || $segmento > 255) {
            return false;
        }
    }
    return true;
}

function verificarTelefono($telefono)
{
    // Dividir la cadena en partes
    $partes = explode('-', $telefono);

    // Comprobar si la división dio tres partes y si cada una es numérica
    if (
        count($partes) == 3 &&
        is_numeric($partes[0]) && strlen($partes[0]) == 3 &&
        is_numeric($partes[1]) && strlen($partes[1]) == 3 &&
        is_numeric($partes[2]) && strlen($partes[2]) == 4
    ) {
        return true;
    }

    return false;
}

function verificarImagen($imagen)
{
    // Verificar si existe el archivo
    if (!isset($imagen)) {
        return false;
    }

    // Obtener información del archivo
    $fileTmpPath = $imagen['tmp_name'];
    $fileSize = $imagen['size']; // Tamaño del archivo en bytes
    $fileName = $imagen['name'];

    // menor a 500 KB
    $maxSize = 500 * 1024; // 500 KB en bytes
    if ($fileSize > $maxSize) {
        return false;
    }

    // Validar extensión (JPG o PNG)
    $extensionesPermitidas = ['jpg', 'png'];
    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($extension, $extensionesPermitidas)) {
        return false;
    }

    return true; // Si pasa todas las validaciones
}

function cambiarNombreImagen($idCliente, $imagen)
{
    // Generar el nuevo nombre para la imagen
    $nuevoNombre = str_pad($idCliente, 8, '0', STR_PAD_LEFT); // Rellenar con ceros a la izquierda hasta 8 cifras

    // Obtener la extensión original de la imagen
    $extension = strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));

    // Crear el nuevo nombre con la extensión
    $nuevoNombreCompleto = $nuevoNombre . '.' . $extension;

    return $nuevoNombreCompleto;
}

function apiBandera($ipCliente)
{
    // Obtener el país asociado a la IP
    $ip = $ipCliente;
    $pais = "Desconocido";
    $codigoPais = "";
    $imageBandera = "No se encuentra bandera";

    // Hacer una petición a la API de ip-api.com
    $apiUrl = "http://ip-api.com/json/" . $ip;
    $respuesta = file_get_contents($apiUrl);
    $info = json_decode($respuesta, true);

    if ($info && $info['status'] === 'success') {
        $codigoPais = strtolower($info['countryCode']);


        if (!empty($codigoPais)) {
            // hay que poner esta url para que nos devuelva una iamgen, no olvidar .png (la extensión)
            $imageBandera = "https://flagcdn.com/144x108/" . $codigoPais . ".png";
        }
    }

    return $imageBandera;
}

function imagenCliente($id)
{
    // Formatear el ID del cliente con 8 dígitos, rellenando con ceros a la izquierda
    $nombreImagen = str_pad($id, 8, '0', STR_PAD_LEFT);

    // Ruta de la imagen en la carpeta uploads
    $rutaImagenJpg = "app/uploads/" . $nombreImagen . ".jpg";
    $rutaImagenPng = "app/uploads/" . $nombreImagen . ".png";

    // Comprobar si la imagen existe en la carpeta uploads
    if (file_exists($rutaImagenJpg)) {
        $imageUrl = $rutaImagenJpg;
    } elseif (file_exists($rutaImagenPng)) {
        $imageUrl = $rutaImagenPng;
    } else {
        $imageUrl = "https://robohash.org/" . $id;
    }

    return $imageUrl;
}

function generarPdf($id) {
    $db = AccesoDatosPDO::getModelo();
    $cli = $db->getCliente($id);

    // en la carpeta util están los métodos
    $imageUrl = imagenCliente($cli->id);

    $imageBandera = apiBandera($cli->ip_address);

    $mpdf = new \Mpdf\Mpdf();

    // contenido HTML para el PDF
    $html = '
    <h1>Detalles del Cliente</h1>
    <p><strong>ID:</strong> ' . htmlspecialchars($cli->id) . '</p>
    <p><strong>Nombre:</strong> ' . htmlspecialchars($cli->first_name) . '</p>
    <p><strong>Apellido:</strong> ' . htmlspecialchars($cli->last_name) . '</p>
    <p><strong>Correo:</strong> ' . htmlspecialchars($cli->email) . '</p>
    <p><strong>IP:</strong> ' . htmlspecialchars($cli->ip_address) . '</p>
    <div style="display: flex; justify-content: center">
        <table style="width: 100%; text-align: center; border-spacing: 10px;">
            <tr>
                <td style="vertical-align: middle;">
                    <label>Foto cliente:</label><br>
                    <img src="' . htmlspecialchars($imageUrl) . '" alt="Foto del Cliente" width="200">
                </td>
                <td style="vertical-align: middle;">
                    <label>Bandera:</label><br>
                    <img src="' . htmlspecialchars($imageBandera) . '" alt="Bandera del País" width="200">
                </td>
            </tr>
        </table>
    </div>
    ';

    $mpdf->WriteHTML($html);

    $mpdf->Output();
    // $mpdf->Output('cliente_' . $cli->id . '.pdf', 'I');

}

function localizacionGeografica($id) {
    $db = AccesoDatosPDO::getModelo();
    $cli = $db->getCliente($id);

    // en la carpeta util están los métodos
    $imageBandera = apiBandera($cli->ip_address);
}
