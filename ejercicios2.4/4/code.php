<?php

function formatoCorrecto($entrada) {

    $patron = '/^\{-?\d+(,-?\d+)*\}$/';


    if (preg_match($patron, $entrada)) {
        return true;  // El formato es correcto
    } else {
        return false; 
    }
}

function extraerNumeros($entrada) {
    if (formatoCorrecto($entrada)) {
        // Quitar los corchetes de la cadena
        $entradaSinCorchetes = trim($entrada, '{}');
        // Separar los números por coma y convertir a un array
        $numerosArray = explode(',', $entradaSinCorchetes);
        // Convertir cada elemento a un número entero
        $numerosArray = array_map('intval', $numerosArray);
        return $numerosArray; 
    } else {
        return []; 
    }
}
function numerosOrdenados($entrada)
{
    sort($entrada);
    return $entrada;



}


 $cadena = $_POST['numeros'];

 if($cadena == null || formatoCorrecto($cadena) == false) 
 {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    </head>
    <body>
        <p>NO HAS INSERTADO UN FORMATO CORRECTO</p>
    </body>
    </html>';
 }
 else

 {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    </head>
    <body>
        <p>Los numeros ordenados son '.implode(",",(numerosOrdenados(extraerNumeros($cadena)))).'</p>
    </body>
    </html>';
 }






?>
