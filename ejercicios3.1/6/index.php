<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de productos</title>
    <style>
         .blue {
            color: blue;
        }

        .form-container {
            display: flex; /* Usamos flex para alinear elementos en la misma línea */
            align-items: center; /* Alinear verticalmente al centro */
            gap: 10px; /* Espaciado entre elementos */
        }

        /* Estilos para el botón */
        button {
            padding: 5px 10px; /* Espaciado interno del botón */
           
        }
        table {
            border-collapse: collapse; /* Para evitar bordes dobles */
            margin: 10px;
            width: 60%; /* O ajusta según sea necesario */
            border: 1px solid black; /* Borde exterior de la tabla */
            
        }

        th, td {
            border: 1px solid black; /* Borde para todas las celdas */
            padding: 8px; /* Espaciado en celdas */
            text-align: left; /* Alinear texto a la izquierda */
        }

        .nombres{
            width: 18%;
        }

        .fijo{background-color: #d3d3d3;}
       
    </style>
</head>
<body>
        
    <?php
       $host = "localhost"; 
       $username = "jardinero";
       $password = "jardinero";
       $database = "jardineria";
       $port = 3306; 
       
       $conexion = mysqli_connect($host, $username, $password, $database, $port);
       
       // Verificar la conexión
       if (!$conexion) {
           die("Conexión fallida: " . mysqli_connect_error());
       }

       $codigoCliente = isset($_GET['codigoCliente']) ? $_GET['codigoCliente'] : null;
       $nombreCliente = isset($_GET['nombreCliente']) ? $_GET['nombreCliente'] : null;
       $nombreContacto = isset($_GET['nombreContacto']) ? $_GET['nombreContacto'] : null;
       $ApellidoContacto = isset($_GET['ApellidoContacto']) ? $_GET['ApellidoContacto'] : null;
       $Telefono = isset($_GET['Telefono']) ? $_GET['Telefono'] : null;
       $Fax = isset($_GET['Fax']) ? $_GET['Fax'] : null;
       $direccion1 = isset($_GET['direccion1']) ? $_GET['direccion1'] : null;
       $direccion2 = isset($_GET['direccion2']) ? $_GET['direccion2'] : null;
       $ciudad = isset($_GET['ciudad']) ? $_GET['ciudad'] : null;
       $Region = isset($_GET['Region']) ? $_GET['Region'] : null;
       $Pais = isset($_GET['Pais']) ? $_GET['Pais'] : null;
       $codigoPostal = isset($_GET['codigoPostal']) ? $_GET['codigoPostal'] : null;
       $LimiteCredito = isset($_GET['LimiteCredito']) ? $_GET['LimiteCredito'] : null;
       $codigoEmpleado = isset($_GET['codigoEmpleado']) ? $_GET['codigoEmpleado'] : null;
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
           

            echo('<table>

                    <tr>
                        <td class="nombres">Codigo Cliente </td>
                        <td> <input type="text" class="fijo" name="CodigoCliente" enabled="false" value="'.$codigoCliente.'" required disabled > </td>
                    </tr>
                    <tr>
                        <td class="nombres">Nombre del cliente </td>
                        <td> <input type="text" name="nombreCliente" value="'.$nombreCliente.'" required> </td>
                    </tr>
                     <tr>
                        <td class="nombres">Nombre del Contacto </td>
                        <td> <input type="text" name="nombreContacto" value="'.$nombreContacto.'" required> </td>
                    </tr>
                     <tr>
                        <td class="nombres">Apellido del Contato </td>
                       <td> <input type="text" name="ApellidoContacto" value="'.$ApellidoContacto.'" required> </td>
                    </tr>
                     <tr>
                        <td class="nombres">Telefono </td>
                       <td> <input type="text" name="Telefono" value="'.$Telefono.'" required> </td>
                    </tr>
                     <tr>
                        <td class="nombres">Fax </td>
                        <td> <input type="text" name="Fax" value="'.$Fax.'" required> </td>
                    </tr>
                     <tr>
                        <td class="nombres">Dirección 1 </td>
                        <td> <input type="text" name="direccion1" value="'.$direccion1.'" required> </td>
                    </tr>
                     <tr>
                        <td class="nombres">Dirección 2 </td>
                       <td> <input type="text" name="direccion2" value="'.$direccion2.'" required> </td>
                    </tr>
                     <tr>
                        <td class="nombres">Ciudad</td>
                        <td> <input type="text" name="ciudad" value="'.$ciudad.'" required> </td>
                    </tr>
                    <tr>
                        <td class="nombres">Region</td>
                        <td> <input type="text" name="Region" value="'.$Region.'" required> </td>
                    </tr>
                    <tr>
                        <td class="nombres">Pais</td>
                       <td> <input type="text" name="Pais" value="'.$Pais.'" required> </td>
                    </tr>
                    <tr>
                        <td class="nombres">Codigo Postal</td>
                        <td> <input type="text" name="codigoPostal" value="'.$codigoPostal.'" required> </td>
                    </tr>
                    <tr>
                        <td class="nombres">Limite Credito</td>
                        <td> <input type="text" name="LimiteCredito" value="'.$LimiteCredito.'" required> </td>
                    </tr>
                    <tr>
                        <td class="nombres">Codigo Empleado</td>
                        <td>  <select name="codigoEmpleado" required>');

                        pintarOptionsCodEmpleados($conexion,$codigoEmpleado);
            echo('
                        </select> </td>
                    </tr>
                    </table>');

           

        }




       
    ?>

</body>
</html>
