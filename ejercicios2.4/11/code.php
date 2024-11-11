<?php

function esPerfecto($numero)
{
    $suma =0;

    for ($i= 1; $i <= $numero; $i++) {
        if($numero % $i==0)
        {
            $suma+= $i;
        }
        
    }

    return ($numero==($suma-$numero));

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
} 
else {
   
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    </head>
    <body>
        <p>El número ' . $numeroRecibido . ' ' . ((esPerfecto($numeroRecibido)==true) ? 'es perfecto.' : 'no es perfecto.' ). '</p>
    </body>
    </html>';
}
?>
