<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
        <style>
            .input-container {
            display: inline-flex;
            align-items: center;
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
                    <h1>CLASIFICACION DE LA LIGA</h1>
                </div>

                <?php
            // Obtener el equipo seleccionado del formulario
            $equipo = $_GET['equipo']??null ;

            if($equipo ==null)
            {
                echo'<form action="" method="GET">
                <div class="input-container">
                
                <label for="equipo">Elija el equipo:</label>
                <select name="equipo" id="equipo">';
                
                       
                        
                        $listaEquipos = array(
                            "F.C. Barcelona" => 82, "Real Madrid" => 84, "Atlético Madrid" => 78, "Valencia" => 75,
                            "Sevilla" => 76, "Villarreal" => 60, "Málaga" => 50, "Espanyol" => 47, "Athletic Bilbao" => 55,
                            "Celta" => 51, "Real Sociedad" => 46, "Rayo Vallecano" => 49, "Getafe" => 36, "Osasuna" => 33,
                            "Elche" => 41, "Deportivo" => 38, "Almería" => 29, "Levante" => 37, "Granada" => 35, "Zaragoza" => 32
                        );

                        

                        foreach ($listaEquipos as $equipo => $puntos) {
                            echo "<option value=\"$equipo\" required>$equipo</option>";
                        }
                  
                echo'</select>

                </div>

                <button type="submit">Comprobar</button>
                </form>';

          
                    function MostarNormal($array) {
                       
                    
                        // Inicia la tabla
                        echo "<table border='1' cellspacing='0' cellpadding='5'>";
                        echo "<tr><th>Índice</th><th>Valor</th></tr>";
                    
                        // Recorre el array y muestra los valores
                        foreach ($array as $indice => $valor) {
                            echo "<tr>";
                            echo "<td>$indice</td>";
                            echo "<td>$valor</td>";
                            echo "</tr>";
                        }
                    
                        echo "</table>";
                    }

                    echo '<h2 class="green">Datos del array recibidos:</h2>';
                    MostarNormal($listaEquipos);
                
            }
            else
            {
                $listaEquipos = array(
                    "F.C. Barcelona" => 82, "Real Madrid" => 84, "Atlético Madrid" => 78, "Valencia" => 75,
                    "Sevilla" => 76, "Villarreal" => 60, "Málaga" => 50, "Espanyol" => 47, "Athletic Bilbao" => 55,
                    "Celta" => 51, "Real Sociedad" => 46, "Rayo Vallecano" => 49, "Getafe" => 36, "Osasuna" => 33,
                    "Elche" => 41, "Deportivo" => 38, "Almería" => 29, "Levante" => 37, "Granada" => 35, "Zaragoza" => 32
                );
            
                // Ordenar los equipos de manera descendente por puntos
                $listaOrden = $listaEquipos;
                arsort($listaOrden);

                // Encontrar la posición del equipo
                 $posicion = array_search($equipo, array_keys($listaOrden)) + 1;

                // Mostrar la posición y los puntos del equipo
                if ($posicion) {
                    echo '<p class="green">El ' . $equipo . ' tiene ' . $listaOrden[$equipo] . ' puntos, ahora mismo es el ' . $posicion . 'º en la clasificación.</p>';
                } else {
                    echo '<p class="green">El equipo seleccionado no se encontró en la lista.</p>';
                }

                echo'  <a href="ejercicio3.php" style="text-align:center">Nueva consulta</a>';

                function Mostar($array) {
                    if (!is_array($array)) {
                        $mensaje = "Función MostarNormal ejecutada con parámetros incorrectos";
                        echo "<script>console.log('" . addslashes($mensaje) . "');</script>";
                        return null;
                    }
            
            
                    // Inicia la tabla
                    echo "<table border='1' cellspacing='0' cellpadding='5'>";
                    echo "<tr><th>Índice</th><th>Valor</th></tr>";
            
                    // Recorre el array y muestra los valores
                    foreach ($array as $indice => $valor) {
                        echo "<tr>";
                        echo "<td>$indice</td>";
                        echo "<td>$valor</td>";
                        echo "</tr>";
                    }
            
                    echo "</table>";
                }
            
                echo '<h2 class="green">Datos del array recibidos ordenados por valor:</h2>';
                Mostar($listaOrden);
            }

        ?>
              


			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

