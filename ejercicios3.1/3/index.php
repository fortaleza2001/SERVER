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

       

        else
        {

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




       
    ?>

</body>
</html>
