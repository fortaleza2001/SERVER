<?php

function esPrimo($numero)
{
    

    for ($i= 2; $i < $numero; $i++) {
        if($numero%$i==0)
        {
            return false;
        }
    }
    return true;

}

$numeroRecibido = $_GET['numeroenviado'];

if ($numeroRecibido==null || $numeroRecibido<=0) {

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
} else {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    </head>
    <body>
        <p>El número ' . $numeroRecibido . ' ' . ((esPrimo($numeroRecibido)==true) ? 'es primo.' : 'no es primo.' ). '</p>
    </body>
    </html>';
}
?>
