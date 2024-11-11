<?php

function figonachi($numero)
{
    if($numero== 0)
    {
        return 0;
    }
    elseif($numero== 1)
    {
        return 1;
    }
    else
    {
       return figonachi($numero-1) + figonachi($numero-2);
    }
}

$numeroRecibido = $_GET['numerodivido'];

if ($numeroRecibido) {

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    </head>
    <body>
        <p>El valor de la serie de figonachi nº  ' . $numeroRecibido . ' es: ' .figonachi($numeroRecibido) . '</p>
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
