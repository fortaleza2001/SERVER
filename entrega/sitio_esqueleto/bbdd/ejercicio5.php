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
                                    <h1>INSERTAR CLIENTES</h1>

                                    
                                </div>
						
							  ';

							  include("./conexion_bbdd.php");

							  $nombreCliente = isset($_GET['nombreCliente']) ? $_GET['nombreCliente'] : null;
							  $nombreContacto = isset($_GET['nombreContacto']) ? $_GET['nombreContacto'] : null;
							  $ApellidoContacto = isset($_GET['ApellidoContacto']) ? $_GET['ApellidoContacto'] : null;
							  $Telefono = isset($_GET['telefono']) ? $_GET['telefono'] : null;
							  $Fax = isset($_GET['Fax']) ? $_GET['Fax'] : null;
							  $direccion1 = isset($_GET['direccion1']) ? $_GET['direccion1'] : null;
							  $direccion2 = isset($_GET['direccion2']) ? $_GET['direccion2'] : null;
							  $ciudad = isset($_GET['ciudad']) ? $_GET['ciudad'] : null;
							  $Region = isset($_GET['Region']) ? $_GET['Region'] : null;
							  $Pais = isset($_GET['Pais']) ? $_GET['Pais'] : null;
							  $codigoPostal = isset($_GET['codigoPostal']) ? $_GET['codigoPostal'] : null;
							  $LimiteCredito = isset($_GET['LimiteCredito']) ? $_GET['LimiteCredito'] : null;
							  $codigoEmpleado = isset($_GET['codigoEmpleado']) ? $_GET['codigoEmpleado'] : null;
							  function pintarOptionsCodEmpleados($con)
							  {
								$sql = "SELECT CodigoEmpleado , Nombre , Apellido1 , Apellido2  FROM empleados;";
								$result = mysqli_query($con, $sql);
					   
								while ($row = mysqli_fetch_assoc($result)) {
								   echo "<option value='" . $row['CodigoEmpleado'] . "'>" . $row['CodigoEmpleado'] . "-".$row['Nombre']." ".$row['Apellido1']." ".$row['Apellido2']." </option>";
							   }
							   
							  }
					   
							   if($nombreCliente == null)
							   {
								   echo ('
									   <form method="GET" action="">
										   <h1 class="blue">Formulario para rellenar los datos de un nuevo cliente</h1>
										 
										   <table>
										   <tr>
											   <td class="nombres">Nombre del cliente </td>
											   <td> <input type="text" name="nombreCliente" required> </td>
										   </tr>
											<tr>
											   <td class="nombres">Nombre del Contacto </td>
											   <td> <input type="text" name="nombreContacto" required> </td>
										   </tr>
											<tr>
											   <td class="nombres">Apellido del Contato </td>
											   <td> <input type="text" name="ApellidoContacto" required> </td>
										   </tr>
											<tr>
											   <td class="nombres">Telefono </td>
											   <td> <input type="text" name="telefono" required> </td>
										   </tr>
											<tr>
											   <td class="nombres">Fax </td>
											   <td> <input type="text" name="Fax" required> </td>
										   </tr>
											<tr>
											   <td class="nombres">Dirección 1 </td>
											   <td> <input type="text" name="direccion1" required> </td>
										   </tr>
											<tr>
											   <td class="nombres">Dirección 2 </td>
											   <td> <input type="text" name="direccion2" required> </td>
										   </tr>
											<tr>
											   <td class="nombres">Ciudad</td>
											   <td> <input type="text" name="ciudad" required> </td>
										   </tr>
										   <tr>
											   <td class="nombres">Region</td>
											   <td> <input type="text" name="Region" required> </td>
										   </tr>
										   <tr>
											   <td class="nombres">Pais</td>
											   <td> <input type="text" name="Pais" required> </td>
										   </tr>
										   <tr>
											   <td class="nombres">Codigo Postal</td>
											   <td> <input type="text" name="codigoPostal" required> </td>
										   </tr>
										   <tr>
											   <td class="nombres">Limite Credito</td>
											   <td> <input type="text" name="LimiteCredito" required> </td>
										   </tr>
										   <tr>
											   <td class="nombres">Codigo Empleado</td>
											   <td>  <select name="codigoEmpleado" required>');
					   
											   pintarOptionsCodEmpleados($conexion);
								   echo('
											   </select> </td>
										   </tr>
										   </table>
					   
										   <button type ="submit">Insertar nuevo cliente</button>
									   </form>
					   
								   ');
								   
							   }
							   else
							   {
								   $sql = "SELECT MAX(CodigoCliente) as cod FROM clientes";
								   $resultado = mysqli_query($conexion,$sql);
					   
								   $row = mysqli_fetch_assoc( $resultado);
								   $idnuevo = $row['cod'] +1;
					   
					   
					   
					   
								   echo('
									   <b>Se procede a la inserción de un nuevo cliente con código '.($idnuevo).' </b> <br>');
					   
								   echo('
									   <b>Sentencia de insercción:</b>
										
									   <p> INSERT INTO clientes VALUES('.$idnuevo.',"'.$nombreCliente.'","'.$nombreContacto.'","'.$ApellidoContacto.'","'.$Telefono.'","'.$Fax.'","'.$direccion1.'","'.$direccion2.'","'.$ciudad.'","'.$Region.'","'.$Pais.'","'.$codigoPostal.'","'.$codigoEmpleado.'","'.$LimiteCredito.'") </p>
								   ');
								   
								   $sql2 = 'INSERT INTO clientes VALUES('.$idnuevo.',"'.$nombreCliente.'","'.$nombreContacto.'","'.$ApellidoContacto.'","'.$Telefono.'","'.$Fax.'","'.$direccion1.'","'.$direccion2.'","'.$ciudad.'","'.$Region.'","'.$Pais.'","'.$codigoPostal.'","'.$codigoEmpleado.'","'.$LimiteCredito.'")';
								   $resultado2 =  mysqli_query($conexion,$sql2);
					   
								   
					   
								   echo('<b>Insercción completada correctamente</b><br>');
									   echo('
									<a href="ejercicio5.php">Realizar nueva consulta </a>');
					   
					   
							   }
					   
					   
					   
					   
					   
							   
							  
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

