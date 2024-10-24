

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 3 php</title>
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

        .divFormulario {
            line-height: 1.8; /* Aumenta el espacio entre líneas del formulario */
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

    </style>
</head>
<body>
    
    <div class="divGeneral">
        <div class="titulo">
            <h1>FORMULARIOS CON CONTROLES HTML5</h1>
        </div>
        <br>
        <form action="03.php" method="POST">
            <div class="divFormulario">
                <!--
                <label>NUMERO 1 (number) : </label><?= ?><br>
                <label>NUMERO 2 (range [10-100]) : </label><?= ?><br>
                <label>Estaciones (list) : </label><?= ?><br>
                <label>Color favorito (COLOR) : </label><?= ?><br>
                <label>Buscar (search) : </label><?= ?><br>
                <label>Nombre (text) : </label><?= ?><br>
                <label>Apellido (text) : </label><?= ?><br>
                <label>E-mail (email) : </label><?= ?><br>
                <label>Fecha de naciemiento : </label><?= ?><br>
                <label>Edad (number)(de 0 a 150) : </label><?= ?><br>
                <label>Página personal (url) : </label><?= ?><br>
                <label>Horario : De </label><?= ?><label> a </label><?= ?><br><br>
                -->
            </div>
        </form>
    </div>
    
</body>
</html>