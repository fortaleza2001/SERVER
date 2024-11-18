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
            <h1>FUNCION CIRCULO</h1>
				
            <?php
             

             function circulo($radio,&$area,&$longitud)
             {
                $area = 3.14 *($radio**2);

                $longitud = 2*3.14*$radio;

             }

  
             $area=0;
             $longitud=0;


                ?>
                

                <div class = "pruebas" >
                <?php
                    echo '<h3 style="margin-top:15px">Pruebas de funcion circulo</h3>';

                    circulo(3,$area,$longitud);
                    echo '<p> El circulo de radio 3 tiene longitud '.$longitud.' y area '.$area.'</p>';
                    circulo(4.5,$area,$longitud);
                    echo '<p> El circulo de radio 4.5 tiene longitud '.$longitud.' y area '.$area.'</p>';
            
                    
            

                   

                ?>
                </div>
		
            </main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

