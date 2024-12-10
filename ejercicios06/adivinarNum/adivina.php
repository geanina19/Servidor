<?php
session_start();

if (!isset($_SESSION['oportunidades'])) {
    $_SESSION['oportunidades'] = 5;
    $_SESSION['numRandom'] = random_int(1, 20);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        switch ($_POST['accion']) {
            case 'Enviar':
                if (!empty($_POST['numUser']) && is_numeric($_POST['numUser'])) {


                    $numeroUser = $_POST['numUser'];
                    $numRandom = $_SESSION['numRandom'];

                    if ($_SESSION['oportunidades'] == 0) {
                        echo "El numero secreto es : " . $numRandom . "<br>";
                        echo "Ha perdido, se ha superado el número de intentos, no hay más oportunidades.";
                        exit;
                    } else {
                        if ($numeroUser == $numRandom) {
                            $msg = "<strong>¡ Ha acertado el número secreto. !</strong>";
                        } else {
                            if ($numeroUser < $numRandom) {
                                $_SESSION['oportunidades']--;
                                $msg = "Le quedan : " . $_SESSION['oportunidades'] . " intentos.<br>";
                                $msg .= "El numero secreto es mayor";
                            } else {
                                $_SESSION['oportunidades']--;
                                $msg = "Le quedan : " . $_SESSION['oportunidades'] . " intentos.<br>";
                                $msg .= "El numero secreto es menor";
                            }
                        }
                    }
            
                } else {
                    $msg = "Debe introducir un número.";
                }
                break;
            case 'Nueva partida':
                $msg = "Nueva partida comenzada.";
                session_destroy();
                break;

        }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina num</title>
</head>

<body>
    <h2>Adivina el número secreto entre 1 y 20, tienes 5 intentos</h2>
    <form action="adivina.php" method="POST">
        <label>Introduce un número : </label><input type="number" name="numUser" value="<?= isset($_POST['numUser']) ? $_POST['numUser'] : ""?>">
        <input type="submit" name="accion" value="Enviar">
        <input type="submit" name="accion" value="Nueva partida">

    </form>
    <br><br>
    <?= isset($msg) ? $msg : "" ?>
</body>

</html>