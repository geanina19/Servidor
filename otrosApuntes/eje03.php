<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> las frutas </title>
</head>
<body>

<?php


$platano = "";
$fresa = "";
$naranja= "";
$melon= "";
$manzana= "";
$frutas = " ";

// Si ya tengo una cookie la guardo en frutas
if (isset($_COOKIE['galletadefrutas'])){
    $frutas = $_COOKIE['galletadefrutas'];
}

// Convierte el string frutas en un array
$frut = explode(",",$frutas);

// Si llega una peticion post guarda su contenido en la cookie y lo guarda en el array frut
if (!empty($_GET['listafrutas'])) {
    $galleta = implode(",",$_GET['listafrutas']);
    setcookie("galletadefrutas",$galleta);
    $frut = $_GET['listafrutas'];
}

// Recorre el array frut y si encuentra una fruta que este en el array la selecciona
foreach ($frut as $value) {
    switch ($value) {
        case 'Platano':
            $platano = "selected";
            break;
        
        case 'Fresa':
            $fresa = "selected";
            break;

        case 'Naranja':
            $naranja = "selected";
            break;

        case 'Melon':
            $melon = "selected";
            break;

        case 'Manzanas':
            $manzana = "selected";
            break;
    }
}


?>

<form>
<fieldset>
<legend>Sus frutas preferidas </legend>
<label for="nombre">Lista de frutas:</label><br>
<select name="listafrutas[]" multiple >
<option value="Platano" <?=$platano ?> >Platano</option>
<option value="Fresa" <?=$fresa ?> >Fresa</option>
<option value="Naranja" <?=$naranja ?> >Naranja</option>
<option value="Melon" <?=$melon ?>>Melon</option>
<option value="Manzana" <?=$manzana ?> >Manzana</option>
</select>
<input type="submit" value="Cambiar">
</fieldset>
</form>

</body>
</html>
