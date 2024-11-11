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
             <a href="http://localhost/ejercicios3.1/5">Realizar nueva consulta </a>');


        }




       
    ?>

</body>
</html>
