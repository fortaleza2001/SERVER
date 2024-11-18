<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
        <style>
          .blue{
            color: blue;
            margin-bottom: 10px;
          }
          
          .green{
            color: green;
            margin-bottom: 10px;
          }

        </style>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu2.php")?>



		
		<section>
		
            <?php include("../includes/navarrays.php")?>

			<main>
            <div class="container">
                    <a href="http://localhost/3.3/sitio_esqueleto/basicos/" class="link-inicio">Inicio - Ejercicios Arrays</a>
                </div>
                <div class="content" style="text-align:center; margin: 20px;">
                <h1>ARRAYS NUMERICOS</h1>
            </div>

            <b class="blue">Implementacion de funciones arrays:</b>

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


            
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

