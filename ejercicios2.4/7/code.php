<?php

function creartabla($numero) 
{
    $cadena ="<p>{";

    for($i=1;$i<11;$i++)
    {
        if($i!=10)
        {
            $cadena .= $numero." X " .$i." = " .($numero*$i)." , \n";
        }
        else
        {
            $cadena .= $numero." X " .$i." = " .($numero*$i)."\n";
        }
        
    }
    $cadena .="}</p>\n";
    return $cadena;
}

function crearTablas()
{
    $tabla ="";
    for($i= 1;$i< 11;$i++)
    {
        $tabla .= creartabla($i);
    }

    return $tabla;
}



    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    </head>
    <body>
        '.crearTablas().'
    </body>
    </html>';
 
 


?>
