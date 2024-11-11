<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays numericos</title>
</head>
<style>
    .green{
        color: green;
    }
</style>
<body>
    <b>Implementacion de funciones arrays:</b>

    <?php
        function generarArrayAleatorio($longitud,$maximo,$minimo)
        {
            if(is_int($maximo)==false || is_int($longitud)==false ||is_int($minimo)==false  || ($minimo>$maximo || $minimo<0 || $maximo<0 ||$longitud<0)) 
            {
                $mensaje = "Función generarArrayAleatorio ejecutada con parametros incorrectos ";
                echo "<script>console.log('".$mensaje."');</script>";
                return null;
            }

            $respuesta = [];

            for($i=0;$i<$longitud;$i++)
            {
                $respuesta[$i] = random_int($minimo,$maximo);
            }

            return $respuesta;
        }

        function eliminarRepetidos($array)
        {
            if(is_array($array)==false)
            {
                $mensaje = "Función eliminarRepetidos ejecutada con parametros incorrectos ";
                echo "<script>console.log('".$mensaje."');</script>";
                return null;
            }

           return array_unique($array);

        }

        function calcularMedia($array)
        {
            if(is_array($array)==false)
            {
                $mensaje = "Función calcularMedia ejecutada con parametros incorrectos ";
                echo "<script>console.log('".$mensaje."');</script>";
                return null;
            }

            return (array_sum($array)/count($array));
        }

        $aleatorio = generarArrayAleatorio(50,100,1);
       echo('<p class="green">Array aleatorio: '.implode(', ',$aleatorio ).'</p>');
       echo('<p class="green">Array sin duplicados: '.implode(', ', eliminarRepetidos($aleatorio)).'</p>');
       echo('<p class="green">Media de los numeros: '.calcularMedia($aleatorio).'</p>');
    ?>

   
</body>
</html>






