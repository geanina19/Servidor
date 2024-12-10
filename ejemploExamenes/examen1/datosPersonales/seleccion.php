<?php 
session_start();

$_SESSION['lenguajes'] = [];

if (isset($_POST['lenguajes'])) {
    $_SESSION['lenguajes'] = $_POST['lenguajes'];
}

if (isset($_POST['nombre'])) {
    $_SESSION['nombre'] = $_POST['nombre'];
} else {
    $_SESSION['nombre'] = "";
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Selección de personal</title>
</head>

<body>
    <h2> Datos de candidato: Paso 2º </h2>
    <form action="seleccion.php" method="POST">
        <fieldset>
            <legend>Datos Profesionales </legend>
            Nombre : <input type="text" name="nombre" value="<?=$_SESSION['nombre']?>"></br>
            Lenguajes de programación:<br>
            <select name="lenguajes[]" multiple="multiple" size=6>
                <option value="Java" <?= in_array('Java', $_SESSION['lenguajes']) ? "selected" : "" ?>>Java</option>
                <option value="Javacripts" <?= in_array('Javacripts', $_SESSION['lenguajes']) ? "selected" : "" ?>>Javascripts</option>
                <option value="Php" <?= in_array('Php', $_SESSION['lenguajes']) ? "selected" : "" ?>>Php</option>
                <option value="Python" <?= in_array('Python', $_SESSION['lenguajes']) ? "selected" : "" ?>>Python</option>
                <option value="Perl" <?= in_array('Perl', $_SESSION['lenguajes']) ? "selected" : "" ?>>Perl</option>
                <option value="C#" <?= in_array('C#', $_SESSION['lenguajes']) ? "selected" : "" ?>>C#</option>
            </select><br>
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</body>

</html>




