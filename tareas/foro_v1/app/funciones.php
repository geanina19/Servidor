<?php
function usuarioOk($usuario, $contraseña) :bool {

   if(strlen($usuario) >= 8) {

      if (trim($contraseña) == strrev(trim($usuario))) {
         return true;
      } else {
         return false;
      }
   } else {
      return false;
   }

}

function comentarioOk($comentario):bool {
   if (strlen($comentario) < 300) {
      return true;
   } else {
      return false;
   }
}

function letraRepetida($comentario) {
   
   // str_replace() -> elimina todos los espacios en blanco de toda la cadena, 
   // incluyendo los que están en medio de palabras.
   $comentario = strtolower(str_replace(' ', '', $comentario));

   $arrayLetras = [];

   for ($i = 0; $i < strlen($comentario); $i++) {

      $letra = $comentario[$i];

      if (isset($arrayLetras[$letra])) {
         $arrayLetras[$letra]++;
      } else {
           $arrayLetras[$letra] = 1;
      }
      
   }

   return $arrayLetras;
}

function letraMasRepetida($comentario) {
   $letraMax = '';
   $repeticiones = 0;

   // Buscar la letra más repetida
   foreach (letraRepetida($comentario) as $letra => $cantidad) {
         if ($cantidad > $repeticiones) {
            $repeticiones = $cantidad;
            $letraMax = $letra;
         }
   }

   echo($letraMax);
   
   // return $letraMax;
}

function letraMenosRepetida($comentario) {
   $letraMin = '';
   $repeticiones = 301;

   // Buscar la letra más repetida
   foreach (letraRepetida($comentario) as $letra => $cantidad) {
         if ($cantidad < $repeticiones) {
            $repeticiones = $cantidad;
            $letraMin = $letra;
         }
   }
   
   echo($letraMin);

   // return $letraMin;
}

function palabraRepetida($comentario) {
   $palabras = explode(" ", $comentario);
   $palabrasSinEspacios = array_filter($palabras);// quita palabras vacias

   $frecuencia = [];

   foreach ($palabrasSinEspacios as $palabra) {
      //$palabra = strtolower(trim($palabra));
      if (!empty($palabra)) {
         if (isset($frecuencia[$palabra])) {
            $frecuencia[$palabra]++;
         } else {
            $frecuencia[$palabra] = 1;
         }
      }
   }

   return $frecuencia;
   
}

function palabraMasRepetida($comentario) {
   $palabraMax = '';
   $repeticiones = 0;

   foreach (palabraRepetida($comentario) as $palabra => $cantidad) {
      if ($cantidad > $repeticiones) {
         $repeticiones = $cantidad;
         $palabraMax = $palabra;
      }
   }

   echo($palabraMax);

   // return $palabraMax;
}

function palabraMenosRepetida($comentario) {
   $palabraMin = '';
   $repeticiones = 301;

   foreach (palabraRepetida($comentario) as $palabra => $cantidad) {
      if ($cantidad < $repeticiones) {
         $repeticiones = $cantidad;
         $palabraMin = $palabra;
      }
   }

   echo($palabraMin);

   // return $palabraMin;
}