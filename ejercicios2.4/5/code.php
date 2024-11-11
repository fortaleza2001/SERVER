<?php

function crearNumero() 
{
   return random_int(0,500);
   
}

function obtenerRango($numero) 
{
    if($numero<101)
    {
        return "{0,100}";
    }
    else if($numero< 201)
    {
        return "{101,200}";
    }
    else if($numero< 301)
    {
        return "{201,300}";
    }
    else if($numero< 401)
    {
        return "{301,400}";
    }
    else
    {
        return "{401,500}";
    }

}

    $n = crearNumero();
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    </head>
    <body>
        <p> El numero generado es '. $n.' y esta en el rango '.obtenerRango($n).'</p>
    </body>
    </html>';
 
 


?>
