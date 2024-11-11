<?php

function obtenerDivisores($numero)
{
    $divisores = []; // Inicializar correctamente el array

    for ($i = 1; $i <= $numero; $i++) {
        if ($numero % $i == 0) {
            $divisores[] = $i; // Añadir divisor al array
        }
    }

    return $divisores;
}

$numeroRecibido = $_GET['numerodivido'];
echo $numeroRecibido;

if ($numeroRecibido) {
    $divisores = obtenerDivisores($numeroRecibido);

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    </head>
    <body>
        <p>Los divisores del número ' . $numeroRecibido . ' son: ' . implode(', ', $divisores) . '</p>
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
