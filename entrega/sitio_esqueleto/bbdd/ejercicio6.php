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
                                    <h1>MODIFICAR CLIENTES</h1>

                                    
                                </div>
						
							  ';

							  include("./conexion_bbdd.php");


	   $mod = isset($_GET['modificado']) ? $_GET['modificado'] : null;
	   				  
	   function modificarCliente($idCliente, $nombreCliente, $nombreContacto, $ApellidoContacto, $Telefono, $Fax, $direccion1, $direccion2, $ciudad, $Region, $Pais, $codigoPostal, $codigoEmpleado, $LimiteCredito, $con)
			{
				echo $idCliente;
				
				


				$sql2 = 'UPDATE clientes 
						SET 
							NombreCliente = "'.$nombreCliente.'",
							NombreContacto = "'.$nombreContacto.'",
							ApellidoContacto = "'.$ApellidoContacto.'",
							Telefono = "'.$Telefono.'",
							Fax = "'.$Fax.'",
							LineaDireccion1 = "'.$direccion1.'",
							LineaDireccion2 = "'.$direccion2.'",
							Ciudad = "'.$ciudad.'",
							Region = "'.$Region.'",
							Pais = "'.$Pais.'",
							CodigoPostal = "'.$codigoPostal.'",
							CodigoEmpleadoRepVentas = "'.$codigoEmpleado.'",
							LimiteCredito = "'.$LimiteCredito.'"
						WHERE CodigoCliente  = '.$idCliente;

				$resultado2 = mysqli_query($con, $sql2);

				if ($resultado2) {
					echo "Cliente actualizado correctamente.";
				} else {
					echo "Error al actualizar el cliente: " . mysqli_error($con);
				}
			}

	   $codigoCliente = isset($_GET['codigoCliente']) ? $_GET['codigoCliente'] : null;
	   $codigoCliente2 = isset($_GET['CodigoCliente']) ? $_GET['CodigoCliente'] : null;
       $nombreCliente = isset($_GET['nombreCliente']) ? $_GET['nombreCliente'] : "";
       $nombreContacto = isset($_GET['nombreContacto']) ? $_GET['nombreContacto'] : "";
       $ApellidoContacto = isset($_GET['ApellidoContacto']) ? $_GET['ApellidoContacto'] : "";
       $Telefono = isset($_GET['Telefono']) ? $_GET['Telefono'] : "";
       $Fax = isset($_GET['Fax']) ? $_GET['Fax'] : "";
       $direccion1 = isset($_GET['direccion1']) ? $_GET['direccion1'] : "";
       $direccion2 = isset($_GET['direccion2']) ? $_GET['direccion2'] : "";
       $ciudad = isset($_GET['ciudad']) ? $_GET['ciudad'] : "";
       $Region = isset($_GET['Region']) ? $_GET['Region'] : "";
       $Pais = isset($_GET['Pais']) ? $_GET['Pais'] : "";
       $codigoPostal = isset($_GET['codigoPostal']) ? $_GET['codigoPostal'] : "";
       $LimiteCredito = isset($_GET['LimiteCredito']) ? $_GET['LimiteCredito'] : "";
       $codigoEmpleado = isset($_GET['codigoEmpleado']) ? $_GET['codigoEmpleado'] : "";

	   if($mod)
	   {
		echo $mod;
			modificarCliente($codigoCliente2, $nombreCliente, $nombreContacto, $ApellidoContacto, $Telefono, $Fax, $direccion1, $direccion2, $ciudad, $Region, $Pais, $codigoPostal, $codigoEmpleado, $LimiteCredito, $conexion);
			header("Location: $mod");
			exit();  
	   }
       function pintarnumerosClientes($con)
       {
         $sql = "SELECT CodigoCliente , NombreCliente , Telefono  FROM clientes;";
         $result = mysqli_query($con, $sql);

         while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['CodigoCliente'] . "'>" . $row['Telefono'] . "---".$row['NombreCliente']."  </option>";
        }
        
       }

      
       function pintarOptionsCodEmpleados($con,$num)
       {
         $sql = "SELECT CodigoEmpleado , Nombre , Apellido1 , Apellido2  FROM empleados;";
         $result = mysqli_query($con, $sql);

         while ($row = mysqli_fetch_assoc($result)) {
            if($row['CodigoEmpleado']==$num)
            {
                echo "<option selected value='" . $row['CodigoEmpleado'] . "'>" . $row['CodigoEmpleado'] . "-".$row['Nombre']." ".$row['Apellido1']." ".$row['Apellido2']." </option>";
            }
            else
            {
                echo "<option  value='" . $row['CodigoEmpleado'] . "'>" . $row['CodigoEmpleado'] . "-".$row['Nombre']." ".$row['Apellido1']." ".$row['Apellido2']." </option>";
            }
           
        }
        
       }

        if($codigoCliente == null)
        {
            echo ('
                <form method="GET" action="">
                    
                <p>Selecciona el numero del cliente:</p>
                <select name="codigoCliente" required>');

                pintarnumerosClientes($conexion);
            echo('
                        </select> 
                   
                    

                    <button type ="submit">EnviarConsulta</button>
                </form>

            ');
            
        }
        else
        {
			

            $sql = 'SELECT * FROM clientes WHERE CodigoCliente='.$codigoCliente;
            $resultado = mysqli_query($conexion,$sql);

            $row = mysqli_fetch_assoc($resultado);

            $nombreCliente = $row['NombreCliente'];
            $nombreContacto = $row['NombreContacto'];
            $ApellidoContacto = $row['ApellidoContacto'];
            $Telefono = $row['Telefono'];
            $Fax = $row['Fax'];
            $direccion1 = $row['LineaDireccion1'];
            $direccion2 = $row['LineaDireccion2'];
            $ciudad = $row['Ciudad'];
            $Region = $row['Region'];
            $Pais = $row['Pais'];
            $codigoPostal = $row['CodigoPostal'];
            $LimiteCredito = $row['LimiteCredito'];
            $codigoEmpleado = $row['CodigoEmpleadoRepVentas'];
			
	
			




    if ($resultado)


            echo('
				<form action="" method="GET">
				<input type="hidden" name="modificado" value="'.("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]").'">
				<table>


			
                    <tr>
                        <td class="nombres">Codigo Cliente </td>
                        <td> <input type="text" class="fijo" name="CodigoCliente" enabled="false" value="'.$codigoCliente.'"  readonly > </td>
                    </tr>
                    <tr>
                        <td class="nombres">Nombre del cliente </td>
                        <td> <input type="text" name="nombreCliente" value="'.$nombreCliente.'" > </td>
                    </tr>
                     <tr>
                        <td class="nombres">Nombre del Contacto </td>
                        <td> <input type="text" name="nombreContacto" value="'.$nombreContacto.'" > </td>
                    </tr>
                     <tr>
                        <td class="nombres">Apellido del Contato </td>
                       <td> <input type="text" name="ApellidoContacto" value="'.$ApellidoContacto.'" > </td>
                    </tr>
                     <tr>
                        <td class="nombres">Telefono </td>
                       <td> <input type="text" name="Telefono" value="'.$Telefono.'" > </td>
                    </tr>
                     <tr>
                        <td class="nombres">Fax </td>
                        <td> <input type="text" name="Fax" value="'.$Fax.'" > </td>
                    </tr>
                     <tr>
                        <td class="nombres">Dirección 1 </td>
                        <td> <input type="text" name="direccion1" value="'.$direccion1.'" > </td>
                    </tr>
                     <tr>
                        <td class="nombres">Dirección 2 </td>
                       <td> <input type="text" name="direccion2" value="'.$direccion2.'" > </td>
                    </tr>
                     <tr>
                        <td class="nombres">Ciudad</td>
                        <td> <input type="text" name="ciudad" value="'.$ciudad.'" > </td>
                    </tr>
                    <tr>
                        <td class="nombres">Region</td>
                        <td> <input type="text" name="Region" value="'.$Region.'" > </td>
                    </tr>
                    <tr>
                        <td class="nombres">Pais</td>
                       <td> <input type="text" name="Pais" value="'.$Pais.'" > </td>
                    </tr>
                    <tr>
                        <td class="nombres">Codigo Postal</td>
                        <td> <input type="text" name="codigoPostal" value="'.$codigoPostal.'" > </td>
                    </tr>
                    <tr>
                        <td class="nombres">Limite Credito</td>
                        <td> <input type="text" name="LimiteCredito" value="'.$LimiteCredito.'" > </td>
                    </tr>
                    <tr>
                        <td class="nombres">Codigo Empleado</td>
                        <td>  <select name="codigoEmpleado" >');

                        pintarOptionsCodEmpleados($conexion,$codigoEmpleado);
            echo('
                        </select> </td>
                    </tr>

					<tr>
						<td>
							<button type ="submit">Modificar Cliente</button>
						</td>
						<td>
						<a href="ejercicio6.php">Vuelve al listado de clientes</a>
						</td>
					</tr>



                    </table>
					
					</form>');

           

        }
								   
							   
					   
					   
					   
					   
							   
							  
							}

							else
					{
						echo '
                           <a href="index.php" class="link-inicio">Inicio - Ejercicios BBDD</a>
                                    </div>
                                    <div class="content" style="text-align:center; margin: 20px;">
                                    <h1>MODIFICAR CLIENTES</h1>

                                    
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

