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
        <?php include("../includes/menu.php")?>



		
		<section>
		
            <?php include("../includes/navfunciones.php")?>

			<main>
            <a href="http://localhost/3.3/sitio_esqueleto/funciones/" class="link-inicio">Inicio - Ejercicios funciones</a>
            </div>
            <div class="content" style="text-align:center; margin: 20px;">
            <h1>NUMEROS PRIMOS</h1>
				
            <?php
                function esprimo($numero) 
                {
                    if($numero>0)
                    {
                        for( $x =2; $x<$numero;$x++)
                        {
                          if($numero%$x==0)
                          {
                             return false;
                          }
                        }
                        return true;
                    }
                    else
                    {
                        return null;
                    }
                  
                }
                ?>
                

                <div class = "pruebas" >
                <?php
                    echo '<h3 style="margin-top:15px">Funcion esprimo 1</h3>';
                    echo '<p> El numero 20 '.((esprimo(20))?"es primo":"no es primo").'  </p>';
                    echo '<p> El numero 7 '.((esprimo(7))?"es primo":"no es primo").'  </p>';
                    echo '<h3 style="margin-top:15px">Funcion esprimo 2</h3>';
                    echo '<p> El numero 5 '.((esprimo(5))?"es primo":"no es primo").'  </p>';
                    echo '<p> El numero 15 '.((esprimo(15))?"es primo":"no es primo").'  </p>';
                    echo '<h3 style="margin-top:15px">Funcion esprimo 3</h3>';
                    echo '<p> El numero 16 '.((esprimo(16))?"es primo":"no es primo").'  </p>';
                    echo '<p> El numero 12 '.((esprimo(12))?"es primo":"no es primo").'  </p>';

                ?>
                </div>
		
            </main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

