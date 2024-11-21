/**
 * Funciones auxiliares de javascripts 
 */
function confirmarBorrar(nombre, id) {
  if (confirm("¿Quieres eliminar el usuario:  " + nombre + "?")) {
    document.location.href = "?orden=Borrar&id=" + id;
  }
}

/**
 *  Muestra la clave del formulario, cambia de password a text
 */
function mostrarclave() {
  let contrasenia = document.getElementById('clave_id');
  let checkBox = document.getElementById('cambioContra');

  if (checkBox.checked) {
    contrasenia.type = "text";
  } else {
    contrasenia.type = "password";
  }
}

/**
 *  Pide confirmación de volcar los datos
 */
function confirmarVolcar() {
  if (confirm("¿Quieres guardar todos los cambios ?")) {
    document.location.href = "?orden=Terminar";
  }
}