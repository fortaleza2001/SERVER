<?php

function esPar($numero)
{
   

    return $numero % 2 == 0;
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
        <p>El numero  ' . $numeroRecibido . ' es: ' .((esPar($numeroRecibido)==true) ? "  par" : "  impar" ). '</p>
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
