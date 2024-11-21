<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
		<style>
			  .green {
            color: green;
        }

        .blue {
            color: blue;
        }

        table {
            border-collapse: collapse; /* Para evitar bordes dobles */
            width: 100%; /* O ajusta según sea necesario */
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
                                    <h1>CONSULTA DE  CLIENTES</h1>
									
                                    
                                </div>
						
							  ';

							  include("./conexion_bbdd.php");
							  // Verificar la conexión
							if (!$conexion) {
								die("Conexión fallida: " . mysqli_connect_error());
							}

							

							$sql = "SELECT CodigoCliente, NombreCliente, NombreContacto FROM clientes";
							$result = mysqli_query($conexion, $sql);

							// Verificar si la consulta devolvió resultados
							if (mysqli_num_rows($result) > 0) {
								// Mostrar los datos de cada fila
								echo "<table>";
								echo "<tr><th>Código Cliente</th><th>Nombre Cliente</th><th>Nombre Contacto</th></tr>"; // Encabezados de la tabla
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>" . $row['CodigoCliente'] . "</td>";
									echo "<td>" . $row['NombreCliente'] . "</td>";
									echo "<td>" . $row['NombreContacto'] . "</td>";
									echo "</tr>";
								}
								echo "</table>";
							} else {
								echo "No se encontraron registros.";
							}

						// Cerrar conexión
						mysqli_close($conexion);
						

					}
					else
					{
						echo '
                           <a href="index.php" class="link-inicio">Inicio - Ejercicios BBDD</a>
                                    </div>
                                    <div class="content" style="text-align:center; margin: 20px;">
                                    <h1>CONSULTA DE  CLIENTES</h1>

                                    
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

