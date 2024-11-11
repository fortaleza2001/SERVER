<?php

function creartabla($numero) 
{
    $cadena ="{";

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
    $cadena .="}";
    return $cadena;
   
}

function creartabla2($numero) 
{
    $cadena ="{";
    $i =1;
    while($i<11)
    {
        if($i!=10)
        {
            $cadena .= $numero." X " .$i." = " .($numero*$i)." , \n";
        }
        else
        {
            $cadena .= $numero." X " .$i." = " .($numero*$i)."\n";
        }
        $i++;
    }
    $cadena .="}";
    return $cadena;
   
}


function creartabla3($numero) 
{
    $cadena ="{";
    $i =1;
    do
    {
        if($i!=10)
        {
            $cadena .= $numero." X " .$i." = " .($numero*$i)." , \n";
        }
        else
        {
            $cadena .= $numero." X " .$i." = " .($numero*$i)."\n";
        }
        $i++;
    }
    while($i< 11);
    $cadena .="}";
    return $cadena;
   
}

    $num = $_POST['numeroenviado'];


    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados</title>
    </head>
    <body>
        <p> Tabla 1 con for : '.creartabla($num).'</p>
        <p> Tabla 2 con while : '.creartabla2($num).'</p>
        <p> Tabla 3 con do while : '.creartabla3($num).'</p>
    </body>
    </html>';
 
 


?>
