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

       $valor = isset($_GET['gama']) ? $_GET['gama'] : null;

       function pintarOptions($con)
       {
         $sql = "SELECT DISTINCT Gama FROM gamasproductos;";
         $result = mysqli_query($con, $sql);

         while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['Gama'] . "'>" . $row['Gama'] . "</option>";
        }
        
       }

        if($valor ==null)
        {
            echo ('
                <form method="GET" action="">
                    <h1 class="blue">Consulta de productos por gama</h1>
                    <div class="form-container">
                        <p>Elige una de las gamas de productos disponibles:</p>
                        <select name="gama" required>');

                        pintarOptions($conexion);
            echo('
                        </select>
                        <button type="submit">Enviar</button>
                    </div>
                </form>

            ');
            
        }
        else
        {
            $sql = "SELECT * FROM productos WHERE Gama = '" . mysqli_real_escape_string($conexion, $valor) . "'";
            $resultado = mysqli_query($conexion,$sql);

            $fecha = date('d-m-Y');
            echo(' <h1 class="blue">Productos de la gama '.$valor.' - Fecha: '.$fecha.'</h1>');

            if(mysqli_num_rows($resultado)==0)
            {
                echo(' <h1 class="blue">Actualmente no existe ningun producto dado de alta en esta gama</h1>');
            }
            else
            {
                echo "<table>";
                echo "<tr><th>CodigoProducto</th><th>Nombre Cliente</th><th>CantidadEnStock</th></tr>"; // Encabezados de la tabla
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $row['CodigoProducto'] . "</td>";
                    echo "<td>" . $row['Nombre'] . "</td>";
                    echo "<td>" . $row['CantidadEnStock'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            

            echo(' <a href="http://localhost/ejercicios3.1/2">Realizar nueva consulta </a>');


        }




       
    ?>

</body>
</html>
