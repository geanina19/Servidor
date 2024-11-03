

<?php 
// PRIMERA APROXIMACIÓN AL MODELO VISTA CONTROLADOR. 
// Funciones auxiliars Ej- usuarioOK
include_once 'app/funciones.php';

// Salida hacia buffer
ob_start(); 
$msg ="";


// Segun la orden 
if ( !isset($_REQUEST['orden']) ){
    include_once 'app/plantillas/entrada.php';
} 
else {
    switch ($_REQUEST['orden']){
        
        case "Entrar":
            // Chequear usuario
            if ( isset($_REQUEST['nombre']) && isset($_REQUEST['contraseña']) && 
                 usuarioOK(strtolower($_REQUEST['nombre']), strtolower($_REQUEST['contraseña']) ) ) {
               echo " Bienvenido <b>".$_REQUEST['nombre']."</b><br>";
               include_once  'app/plantillas/comentario.html';
            }
            else {
                $msg = " Usuario no válido. ";
                include_once 'app/plantillas/entrada.php';
            }
            break;
            
        case "Nueva opinión":
            echo " Nueva opinión <br>";
            include_once  'app/plantillas/comentario.html';
            break;
        case "Detalles": // Mensaje y detalles
            if (isset($_REQUEST['comentario']) && comentarioOk(strtolower($_REQUEST['comentario']))) {
                echo "Detalles de su opinión";
                include_once 'app/plantillas/comentariorelleno.php';
                include_once 'app/plantillas/detalles.php';
            } else {
                $msg = " El comentario no puede tener más de 300 caracteres. ";
                include_once 'app/plantillas/comentariorelleno.php';
            }
            
            break;
        case "Terminar": // Formulario inicial
            include_once 'app/plantillas/entrada.php';
    }
    
}

$contenido_php = ob_get_clean();

include_once "app/plantillas/principal.php";

?>

