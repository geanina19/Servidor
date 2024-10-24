
<?php 

    $numero1 = "";
    $numero2 = "";
    $controlSeleccionado = "decimal";

    // Si se presiona el botón de borrar, vaciamos los campos numéricos
    if (isset($_REQUEST['borrarNum']) && $_REQUEST['borrarNum'] === 'borrarNumeros') {
        $numero1 = "";  // Limpiar num1
        $numero2 = "";  // Limpiar num2
        //el control seleccionado se mantenga
        if (isset($_REQUEST['controles'])) {
            $controlSeleccionado = $_REQUEST['controles'];  // Guardamos el valor del radio button seleccionado
        }
    } elseif (isset($_REQUEST['borrarTodo']) && $_REQUEST['borrarTodo'] === 'borrarTodoForm') {
        // Si se presiona el botón de borrar con reset, vaciamos los campos y restablecemos el control seleccionado
        $numero1 = "";
        $numero2 = "";
        $controlSeleccionado = "decimal"; // Restablecer a "decimal"
    } else {
        // Guardamos los números si se han enviado
        if (isset($_REQUEST['num1']) && isset($_REQUEST['num2'])) {
            $numero1 = $_REQUEST['num1'];
            $numero2 = $_REQUEST['num2'];
        }
        
        //el control seleccionado se mantenga
        if (isset($_REQUEST['controles'])) {
            $controlSeleccionado = $_REQUEST['controles'];  // Guardamos el valor del radio button seleccionado
        }
    }

    function borrarTodoForm() {
    
    }
    
    function sumar($numero1, $numero2) {
        return $numero1 + $numero2;
    }

    function restar($numero1, $numero2) {
        return $numero1 - $numero2;
    }

    function multiplicar($numero1, $numero2) {
        return $numero1 * $numero2;
    }

    function dividir($numero1, $numero2) {
        if ($numero2 == 0) {
            return "Error: No se puede dividir por cero";
        }
        return $numero1 / $numero2;
    }

    function convertirResultado($resultado, $control) {
        switch ($control) {
            case 'binario':
                return decbin($resultado);  // Convertir a binario
            case 'hexadecimal':
                return dechex($resultado);  // Convertir a hexadecimal
            default:
                return $resultado;  // Mantener en decimal
        }
    }

    function calcular() {
        $mensaje = "";

        if (isset($_REQUEST['num1']) && isset($_REQUEST['num2']) && isset($_REQUEST['operacion']) && isset($_REQUEST['controles'])) {

            // Convertimos los valores a enteros o flotantes
            $numero1 = floatval($_REQUEST['num1']);
            $numero2 = floatval($_REQUEST['num2']);
            $operacion = $_REQUEST['operacion'];
            $control = $_REQUEST['controles'];  // Obtener el radio seleccionado

            // Verificar si los campos están vacíos
            if($numero1 === "" || $numero2 === "") {
                $mensaje = '<strong>Complete todos los campos.</strong>';
            } else {
                // Realizar la operación matemática
                switch ($operacion) {
                    case 'suma':
                        $resultado = sumar($numero1, $numero2);
                        break;
                    case 'resta':
                        $resultado = restar($numero1, $numero2);
                        break;
                    case 'multiplicacion':
                        $resultado = multiplicar($numero1, $numero2);
                        break;
                    case 'division':
                        $resultado = dividir($numero1, $numero2);
                        break;
                    default:
                        $mensaje = 'Complete todos los campos.';
                        $resultado = null;
                }

                //si resultado es numero, hace la conversion
                if (is_numeric($resultado)) {
                    $mensaje = convertirResultado($resultado, $control);
                } else {
                    $mensaje = $resultado;  // Si hubo un error
                }
            }
        } else {
            $mensaje = "Introduce dos números";
        }

        return $mensaje;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 2 </title>
    <style>
        body {
            display: flex;
            justify-content: center; /* Centra horizontalmente el contenido */
            align-items: center; /* Centra verticalmente el contenido */
            margin: 0; /* Elimina márgenes por defecto */
            background-color: rgb(94, 91, 91);
        }

        .divGeneral {
            border: 1px solid #000000;
            display: inline-block;
            background-color: #ffffff; /* Color de fondo del div */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra para un efecto visual */
        }

        .divBotones {
            margin-top: 10px; /* Espacio entre los botones */
        }

        .titulo {
            text-align: center;
            background-color: blue;
            padding: 5px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            color: #ffffff;
        }

        .divFormulario {
            padding: 10px;
        }

        .divBotones, .divRadios {
            border: 1px solid #000000;
            padding: 10px;
        }

        .botonBorrarTodo {
            border-radius: 4px;
        }

    </style>
</head>
<body>
    
    <div class="divGeneral">
        <div class="titulo">
            <h1>Mini Calculadora</h1>
        </div>
        <br>
        <form method="POST">
            <div class="divFormulario">
                <label>Nº 1 : </label><input type="number" name="num1" value="<?= $numero1 ?>"><br>
                <label>Nº 2 : </label><input type="number" name="num2" value="<?= $numero2 ?>"><br><br>
                <div class="divBotones">
                    <button name="operacion" value="suma">+</button>
                    <button name="operacion" value="resta">-</button>
                    <button name="operacion" value="multiplicacion">*</button>
                    <button name="operacion" value="division">/</button>
                    <button name="borrarNum" value="borrarNumeros">Borrar</button>
                </div>
                <br>
                <div class="divRadios">
                    <input type="radio" name="controles" value="decimal" <?= $controlSeleccionado === 'decimal' ? 'checked' : '' ?> >Decimal
                    <input type="radio" name="controles" value="binario" <?= $controlSeleccionado === 'binario' ? 'checked' : '' ?> >Binario
                    <input type="radio" name="controles" value="hexadecimal" <?= $controlSeleccionado === 'hexadecimal' ? 'checked' : '' ?> >Hexadecimal
                </div>
                <button class="botonBorrarTodo" name="borrarTodo" value="borrarTodoForm">Borrar con reset</button><br>
                <p>El resultado es : <?= calcular()?></p>          
            </div>
        </form>
    </div>
    
</body>
</html>