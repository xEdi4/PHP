<?php

function usuarioOk($usuario, $contraseña): bool {
   return (strlen($usuario) >= 8 && $contraseña == strrev($usuario));
}

function contarPalabras($texto) {
   return str_word_count($texto);
}

function letraMasRepetida($texto) {
   // Convertir la cadena a minúsculas para considerar mayúsculas y minúsculas iguales
   $texto = strtolower($texto);

   // Eliminar espacios en blanco para considerar solo letras
   $texto = str_replace(' ', '', $texto);

   // Contar ocurrencias de cada carácter y almacenar los conteos en un array asociativo
   $conteo = array_count_values(str_split($texto));

   // Ordeno el array por el valor manteniendo la clave 
   asort($conteo);

   // Muestro el último que es el que tiene el valor más alto
   return array_key_last($conteo);
}

function palabraMasRepetida($texto) {
   // Obtengo el array de palabras
   $palabras = str_word_count($texto, 1);

   // Cuento cuando aparece cada palabra
   // Genera una tabla con clave palabra y valor las veces que aparece
   $palabrasVeces = array_count_values($palabras);

   // Ordeno el array por el valor manteniendo la clave 
   asort($palabrasVeces);

   // Muestro el último que es el que tiene el valor más alto
   return array_key_last($palabrasVeces);
}
