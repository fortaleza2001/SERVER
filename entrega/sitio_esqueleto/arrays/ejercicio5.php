<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
        <style>
           .input-container {
            display: inline-flex;
            align-items: center;
        }

        .blue{
            color: blue;
            margin-bottom: 10px;
            align-items: center;
            text-align: center;
          }
        label {
            margin-right: 10px;
        }

        .green {
            color: green;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        form{
            align-items: center;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        button{
            width: 40%;

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
                        <a href="index.php" class="link-inicio">Inicio - Ejercicios Arrays</a>
                    </div>
                    <div class="content" style="text-align:center; margin: 20px;">
                    <h1>ARRAYS Y STRINGS</h1>
                </div>

                <h2 class="blue">Uso de funciones propias de strings</h2>

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
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

