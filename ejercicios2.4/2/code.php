<?php

function longitudCircunferencia($radio)
{
   

    return  M_PI *2 * $radio ;
}
function areaCircunferencia($radio)
{
   

    return M_PI *($radio**2) ;
}
$numeroRecibido = $_GET['numeroenviado'];

if ($numeroRecibido) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultado</title>
    </head>
    <body>
        <p>El Valor de una circunferencia de radio   ' . $numeroRecibido . ' es:  Area = ' .number_format(areaCircunferencia($numeroRecibido),2). ' y para la longitud = '.number_format(longitudCircunferencia($numeroRecibido),2).' .</p>
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
