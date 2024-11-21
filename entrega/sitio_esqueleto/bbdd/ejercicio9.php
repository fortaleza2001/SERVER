<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>

		<style>
       
            .titulo{
                color: blue;
                text-align: center;
            }
            .blue{
                color: blue;
                font-size: 20px;
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
                                    <h1>IMPORTES PEDIDOS CLIENTES</h1>

                                    
                                </div>
						
							  ';

							  include("./conexion_bbdd.php");


                              $codigoCliente = $_GET['codigoCliente']??null;
	   				  

	  
       function pintarClientes($con)
       {
         $sql = "SELECT *  FROM clientes;";
         $result = mysqli_query($con, $sql);

         while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['CodigoCliente'] . "'>" .$row['NombreCliente']."  </option>";
        }
        
       }

        
       

        if($codigoCliente == null)
        {
            echo ('
                <form method="GET" action="">
                    
                <p>Selecciona Cliente a consultar:</p>
                <select name="codigoCliente" required>');

                pintarClientes($conexion);
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
           
            echo '<h2 class ="titulo">LISTADO DE PEDIDOS DEL CLIENTE '.$codigoCliente.'</h2>
                  <h2 class ="titulo">CON CODIGO '.$codigoCliente.'</h2>  ';

            $sql = 'SELECT * FROM pedidos WHERE CodigoCliente='.$codigoCliente;
            $resultadoPedido = mysqli_query($conexion,$sql);
            if(mysqli_num_rows($resultadoPedido) > 0)
            {

           
            while ($row = mysqli_fetch_assoc($resultadoPedido)) {
                // Accede a cada campo de la fila
               $CodigoPedido = $row['CodigoPedido'];
               $Fecha = $row['FechaPedido'];

               $sql2 = 'SELECT * FROM detallepedidos WHERE CodigoPedido='.$CodigoPedido;
               $resultadolineas = mysqli_query($conexion,$sql2);


               echo '<table border="1" style="margin:30px; border-collapse: collapse; text-align: center; width: 80%;">';

               echo '<tr>';
               echo '<td colspan="4" style="background-color: #f0f0f0; font-weight: bold; padding: 10px;">Pedido código ' . $CodigoPedido . ' de fecha ' . $Fecha . '</td>';
               echo '</tr>';
               
               // Segunda fila con encabezados
               echo '<tr>';
               echo '<td style="font-weight: bold;">Nombre del Producto</td>';
               echo '<td style="font-weight: bold;">Precio Unidad</td>';
               echo '<td style="font-weight: bold;">Cantidad</td>';
               echo '<td style="font-weight: bold;">Importe</td>';
               echo '</tr>';
               
               $total = 0;
               while ($linea = mysqli_fetch_assoc($resultadolineas)) {
               
                   $codigoProducto = $linea['CodigoProducto'];
                   $PrecioUnidad = $linea['PrecioUnidad'];
                   $Cantidad = $linea['Cantidad'];
                   $importe = (float) $Cantidad * (float) $PrecioUnidad; // Convierte explícitamente a número si es necesario

                   // Obtener nombre del producto
                   $sql3 = 'SELECT Nombre FROM productos WHERE CodigoProducto = "' . $codigoProducto . '"';
                   $resultadoproducto = mysqli_query($conexion, $sql3);
                   $res = mysqli_fetch_assoc($resultadoproducto);
                   $nombreProducto = $res['Nombre'];
               
                   // Fila del producto
                   echo '<tr>';
                   echo '<td>' . $nombreProducto . '</td>';
                   echo '<td>' . number_format($PrecioUnidad, 2) . '</td>';
                   echo '<td>' . $Cantidad . '</td>';
                   echo '<td>' . number_format($importe, 2) . '</td>';
                   echo '</tr>';
               
                   $total += $importe;
               }
               
               // Fila del total
               echo '<tr>';
               echo '<td colspan="3" style="font-weight: bold; text-align: left;">Importe total de este pedido</td>';
               echo '<td style="font-weight: bold;">' . number_format($total, 2) . '</td>';
               echo '</tr>';
               
               echo '</table>';
               
        }
    }
        else
        {
            echo'<h2>No hay pedidos del cliente con numero '.$codigoCliente.'</h2>';
        }

            echo ('
            <form method="GET" action="">
                
            <p class="blue">Selecciona Cliente a consultar:</p>
            <select name="codigoCliente" required>');

            pintarClientes($conexion);
        echo('
                    </select> 
               
                

                <button type ="submit">EnviarConsulta</button>
            </form>

        ');


        }
			
			
	
			
    }



    

					else
					{
						echo '
                           <a href="index.php" class="link-inicio">Inicio - Ejercicios BBDD</a>
                                    </div>
                                    <div class="content" style="text-align:center; margin: 20px;">
                                    <h1>IMPORTES PEDIDOS CLIENTES</h1>

                                    
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

