<html>
<head>
<meta charset="UTF-8">
<title> Agenda App </title>
</head>
<body>
<form>
<fieldset>
  <legend>Su agenda personal</legend>
    <label for="nombre">Nombre:</label><br>
    <input type='text' name='nombre' size=20
    value ="Ramón">
    <input type='submit' name="orden" value="Consultar"><br>
    <label for="telefono">Teléfono:</label><br>
    <input type='tel' name='telefono' size=20
    value ="9394848">
    <input type='submit' name="orden" value="Añadir">
</fieldset>
</form>

 <?php 

    // Busca un dato dentro de un array si lo encuentra devuelve la clave y si no devuelve false
    function Buscar($dato,$arr){
        // Recorre el array y busca si la clave es igual al dato que pasamos por parametro
        foreach ($arr as $key => $value) {
            if ($key == $dato) {
                return $value;
            }
        }
        return false;
    }

    // Consulta los datos de la agenda
    function Consultar(){
        // Crea el array de contactos y abre el fichero donde estan guardados
        $contactos = [];
        $fich = @fopen("contactos.txt", 'r') or die("ERROR al abrir fichero de contactos");
    
    // Recorre el fichero de contactos guardando los contactos en el array
    while ($linea = fgets($fich)) {
        $partes = explode(',', trim($linea));
        $contactos[$partes[0]]= $partes[1];
        }
    fclose($fich);

    // Si encuentra el contacto en la agenda lo muestra por pantalla
    if (Buscar($_GET['nombre'],$contactos)!=false) {
        $num = Buscar($_GET['nombre'],$contactos);
        print_r("El telefono de ". $_GET['nombre'] ." es " . $num);
    }else {
        // Si no lo encuentra muestra el mensaje de error
        print_r("No se encuentra ". $_GET['nombre'] ." en la agenda");
    }

    }

    // Añade un contacto a la agenda
    function Añadir(){
        // Comprueba que el numero de telefono es un numero si es asi lo guarda en el archivo y muestra un mensaje
        if (is_numeric($_GET['telefono']) && $_GET['nombre']!= "") {
            $contacto = $_GET['nombre'].",".$_GET['telefono'];
            file_put_contents("contactos.txt", $contacto. "\n", FILE_APPEND);
            print_r("Se ha añadidio a ". $_GET['nombre'] ." a la agenda ");
        }else {
            // Si no, no lo guarda y muestra el mensaje de error
            print_r("El numero de telefono tiene que ser un numero");
        }
    }

    // Depende del boton que se pulse ejecuta una funcion u otra
    if (!empty($_GET['orden'])) {
        switch ($_GET['orden']) {
            case 'Consultar':
                Consultar();
                break;
            
            case 'Añadir':
                Añadir();
                break;
        }
    }
    
?>
</body>
</html>