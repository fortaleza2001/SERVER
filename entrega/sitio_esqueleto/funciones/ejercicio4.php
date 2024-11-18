<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>

        <style>
          
          .pruebas {
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap; /* Permite que las tablas pasen a la siguiente línea si no caben en la misma */
            width: 100%;
            align-items: center;
            gap: 20px;
            flex-direction: column; /* Organiza las tablas en filas */
            justify-content: center; /* Centra las tablas en el contenedor */
            align-items: center;
            text-align: center;
        }

        

      

        h3 {
            margin-bottom: 10px;
        }
        </style>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu2.php")?>



		
		<section>
		
            <?php include("../includes/navfunciones.php")?>

			<main>
            <a href="http://localhost/3.3/sitio_esqueleto/funciones/" class="link-inicio">Inicio - Ejercicios funciones</a>
            </div>
            <div class="content" style="text-align:center; margin: 20px;">
            <h1>NUMEROS PERFECTOS</h1>
				
            <?php
             

                function sumadivisores($n)
                {
                    $respuesta = 0;

                    if($n==1)
                    {
                        return 1;
                    }
                    for( $x=1;$x<$n;$x++)
                    {
                        
                        if($n%$x==0)
                        {
                            $respuesta +=$x;
                        }
                    }

                    return $respuesta;

                }

                function esPerfecto($numero)
                {
                    return ($numero == sumadivisores($numero));
                }
                ?>
                

                <div class = "pruebas" >
                <?php
                    echo '<h3 style="margin-top:15px">Pruebas de funcion para numeros perfectos</h3>';
                    echo '<p> La suma de divisores de 28 es :  '.(sumadivisores(28)).'  </p>';
                    echo '<p> El numero 28  '.((esPerfecto(28))?"SI es perfecto":"NO es primo").'  </p>';
                    echo '<p> La suma de divisores de 35 es :  '.(sumadivisores(35)).'  </p>';
                    echo '<p> El numero 35  '.((esPerfecto(35))?"SI es perfecto":"NO es primo").'  </p>';
                    
                    echo '<p> Los numeros perfectos del 1 al 5000 son : </p>';

                    echo'<p>';
                    for($i =1;$i<5001;$i++)
                    {
                        if(esPerfecto($i))
                        {
                            echo ' '.$i.' ,';
                        }
                    }
                    echo'</p>';

                ?>
                </div>
		
            </main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

