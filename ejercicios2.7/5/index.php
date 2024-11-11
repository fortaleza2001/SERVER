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
    
    <h1 class="blue">Uso de funciones propias de strings</h1>

    <?php

        function palabra_larga($array)
        {
            $numero = null;
            $index=null;
            for($x =0;$x<count($array);$x++)
            {
                if($numero==null||strlen($array[$x]) >$numero)
                {
                    $numero =strlen($array[$x]);
                    $index = $x;
                }
            }

            return $array[$index];
        }


        function palabra_corta($array)
        {
            $numero = null;
            $index=null;
            for($x =0;$x<count($array);$x++)
            {
                if($numero==null||strlen($numero>$array[$x]))
                {
                    $numero =strlen($array[$x]);
                    $index = $x;
                }
            }

            return $array[$index];
        }


        function mas_5($var)
        {
            if(strlen($var)>5)
            {
                return $var;
            }
        }

        function inviertePalabras($array)
        {
            for($x=0;$x<count($array);$x++)
            {
                $array[$x] =strrev($array[$x]);
            }
            return $array;
        }


        $array_palabras = ["gato","perro","elefante","jirafa","tortuga","leon","tigre","loro","canguro","pinguino"];
        echo('<p class="green"> Array de strings: '.implode(', ',$array_palabras ).' </p>');
        $palabra_larga = palabra_larga($array_palabras);
        echo('<p class="green"> Palabra mas larga: '.$palabra_larga.' </p>');
        $palabra_corta = palabra_corta($array_palabras);
        echo('<p class="green"> Palabra mas corta: '.$palabra_corta.' </p>');
        $array_grande = array_filter($array_palabras,"mas_5");
        echo('<p class="green"> Array de strings con mas de 5 letras : '.implode(', ',$array_grande ).' </p>');
        $array_orden_ascendente = $array_palabras;
        sort($array_orden_ascendente);
        echo('<p class="green"> Array ordenado alfabeticamente : '.implode(', ',$array_orden_ascendente ).' </p>');
        $inverso=inviertePalabras($array_orden_ascendente);

        echo('<p class="green"> Array con palabras invertidas : '.implode(', ',$inverso ).' </p>');
    ?>


    
</body>
</html>
