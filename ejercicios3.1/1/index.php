<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
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

       echo '<h1 class="blue">Conexión correcta...</h1>';

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
    ?>

</body>
</html>
