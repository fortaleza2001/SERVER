<?php

function diaSemana($numero)
{
    $dias = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
   

    return  $dias[$numero-1];
}
function esFestivo($numero)
{
   
    return $numero>=6;
}
$numeroRecibido = $_GET['numeroenviado'];

if ($numeroRecibido>=1 && $numeroRecibido<=7) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultado</title>
    </head>
    <body>
        <p> El dia de la semana es el '.(diaSemana($numeroRecibido)).' y '.(esFestivo($numeroRecibido)?'es festivo':'no es festivo').'</p>
    </body>
    </html>';
} else {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    </head>
    <body>
        <p>NO HAS INSERTADO UN VALOR VÁLIDO.</p>
    </body>
    </html>';
}
?>
