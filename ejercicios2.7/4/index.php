<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUNCIONES PROPIAS DE ARRAYS</title>
    <style>
       body {
            display: flex;
            align-items: center;
            height: 100%;
            margin: 20px;
            flex-direction: column;
        }

       

        .blue {
            color: blue;
        }

        .green{
            color: green;
        }
     
    
    </style>
</head>
<body>
    
    <h1 class="blue">range,array_filter,array_map,array_reduce y arsort</h1>

    <?php


    function cuadrado($var)
    {
        // Retorna siempre que el número entero sea impar
        return $var**2;
    }

    function par($var)
    {
        // Retorna siempre que el número entero sea par
        return !($var & 1);
    }

    function suma($carry, $item)
{
    $carry += $item;
    return $carry;
}

        $array_range = range(1,20);
        echo('<p class="green"> Array generado: '.implode(', ',$array_range ).' </p>');
        $pares = array_filter($array_range,"par");
        echo('<p class="green"> Numeros pares originales: '.implode(', ',$pares ).' </p>');
        $cuadrados = array_map("cuadrado",$pares);
        echo('<p class="green"> Numeros al cuadrado: '.implode(', ',$cuadrados ).' </p>');
        $suma = array_reduce($cuadrados,"suma");
        echo('<p class="green"> Suma de todos los numeros al cuadrado: '.$suma.' </p>');
        arsort($array_range);
        echo('<p class="green"> Lista ordenada en orden descendente: '.implode(', ',$array_range ).' </p>');
            
    ?>


    
</body>
</html>
