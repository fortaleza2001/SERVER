<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>

		<style>
       

        

     
        table {
            border-collapse: collapse; /* Para evitar bordes dobles */
            margin: 10px;
            width: 95%; /* O ajusta según sea necesario */
            border: 1px solid black; /* Borde exterior de la tabla */
            
        }

        th, td {
            border: 1px solid black; /* Borde para todas las celdas */
            padding: 8px; /* Espaciado en celdas */
            text-align: left; /* Alinear texto a la izquierda */
        }
       
    </style>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu2.php")?>



		
		<section>
		
            <?php include("../includes/navbbdd.php")?>

			<main>

                
				<?php

					// Iniciar la sesión
					session_start();

					// Verificar si la variable de sesión 'usuario' está definida
					if (isset($_SESSION['usuario']))
					{
						echo '<div class="usuario" style="display: flex; flex-direction: column; align-items: flex-end;">
									<b style="color:purple">Usuario: '.($_SESSION['usuario']).'</b>

									
									<form action="logout.php" method="GET">
										<!-- Campo oculto con el valor de la página actual -->
										<input type="hidden" name="page" value="'.(basename($_SERVER['PHP_SELF'])).'">

										<!-- Botón para enviar el formulario y cerrar sesión -->
										<button type="submit" style="margin-left: 10px; width: 100px;">Cerrar Sesión</button>
									</form>
								</div>

                                <a href="index.php" class="link-inicio">Inicio - Ejercicios BBDD</a>
                                    </div>
                                    <div class="content" style="text-align:center; margin: 20px;">
                                    <h1>ESTADISTICA DE PRODUCTOS POR GAMA</h1>

                                    
                                </div>
						
							  ';

							  include("./conexion_bbdd.php");

							  $array = [];

							  $sql = "SELECT Gama , DescripcionTexto FROM gamasproductos";
							  
							  $resultado = mysqli_query($conexion,$sql);
				  
							  while($row = mysqli_fetch_assoc($resultado))
							  {
								  $gama = $row['Gama'];
								  $descripcion = $row['DescripcionTexto'];
				  
								  $sql2 = 'SELECT COUNT(*) AS NumeroProductos FROM productos WHERE Gama = "'.$gama.'"';
				  
								  $resultado2 = mysqli_query($conexion,$sql2);
				  
								  $row2 = mysqli_fetch_assoc($resultado2);
								  $numero = $row2['NumeroProductos'];
				  
								  if($numero!=0)
								  {
									  $array[] = [
										  'Nombre' => $gama,
										  'Descripcion' => $descripcion,
										  'CantidadProductos' => $numero
									  ];
								  }
				  
									 
								  
							  }
				  
							  echo "<table>";
							  echo "<tr><th>Gama</th><th>Descripcion</th><th>NºdeProductos</th></tr>"; 
							  for ($i = 0; $i < count($array); $i++) {
								  echo "<tr>";
								  echo "<td>" . $array[$i]['Nombre'] . "</td>";
								  echo "<td>" . $array[$i]['Descripcion'] . "</td>";
								  echo "<td>" . $array[$i]['CantidadProductos'] . "</td>";
								  echo "</tr>";
							  }
							  echo "</table>";
				  
							 
				  
					}
					else
					{
						echo '
                           <a href="index.php" class="link-inicio">Inicio - Ejercicios BBDD</a>
                                    </div>
                                    <div class="content" style="text-align:center; margin: 20px;">
                                    <h1>ESTADISTICA DE PRODUCTOS POR GAMA</h1>

                                    
                                </div>
							  <p>Esta sección tiene el acceso restringido a usuarios registrados en la base de datos, por favor <a href="login.php">identifiquese</a> o <a href="register.php">registrese</a></p>';
					}
				?>	
				
				
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

