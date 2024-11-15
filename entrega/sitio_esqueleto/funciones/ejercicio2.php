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
            flex-direction: row; /* Organiza las tablas en filas */
            justify-content: center; /* Centra las tablas en el contenedor */
            align-items: center;
            text-align: center;
        }

        .pruebas > p {
            width: 100%;
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
            <h1>CONVERSOR DE MONEDA</h1>
				
            <?php
                function conversordemonedas($EUROS, $Tipo) {
                   if($Tipo==1)
                   {
                     return $EUROS * 1.0543;
                   }
                   else
                   {
                        return  $EUROS * 0.8678;
                   } 
                }
                ?>
                <h3 style="margin-top:15px">Prueba de función para el cambio de divisas</h3>

                <div class = "pruebas" >
                <?php

                    echo '<p> El resultado de convertir 22 euros a libras es: '.conversordemonedas(22,2).' £  </p>';
                    echo '<p> El resultado de convertir 79 euros a libras es: '.conversordemonedas(79,2).' £  </p>';
                    echo '<p> El resultado de convertir 63 euros a dolares es: '.conversordemonedas(63,1).' USD  </p>';
                    echo '<p> El resultado de convertir 94 euros a dolares es: '.conversordemonedas(94,1).' USD  </p>';
                ?>
                </div>
		
            </main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

