<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clasificación de la liga</title>
    <style>
       body {
            display: flex;
            align-items: center;
            height: 100%;
            margin: 20px;
            flex-direction: column;
        }

        .input-container {
            display: inline-flex;
            align-items: center;
        }

        label {
            margin-right: 10px;
        }

        .green {
            color: green;
        }

        form{
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        button{
            width: 40%;

        }
        
    </style>
</head>
<body>
    <form action="code.php" method="GET">
    <div class="input-container">
       
        <label for="equipo">Elija el equipo:</label>
        <select name="equipo" id="equipo">
            <?php
            $listaEquipos = array(
                "F.C. Barcelona" => 82, "Real Madrid" => 84, "Atlético Madrid" => 78, "Valencia" => 75,
                "Sevilla" => 76, "Villarreal" => 60, "Málaga" => 50, "Espanyol" => 47, "Athletic Bilbao" => 55,
                "Celta" => 51, "Real Sociedad" => 46, "Rayo Vallecano" => 49, "Getafe" => 36, "Osasuna" => 33,
                "Elche" => 41, "Deportivo" => 38, "Almería" => 29, "Levante" => 37, "Granada" => 35, "Zaragoza" => 32
            );

            

            foreach ($listaEquipos as $equipo => $puntos) {
                echo "<option value=\"$equipo\">$equipo</option>";
            }
            ?>
        </select>

    </div>

    <button type="submit">Comprobar</button>
    </form>

    <?php
        function MostarNormal($array) {
            if (!is_array($array)) {
                $mensaje = "Función MostarNormal ejecutada con parámetros incorrectos";
                echo "<script>console.log('". addslashes($mensaje) ."');</script>";
                return null;
            }
        
            // Inicia la tabla
            echo "<table border='1' cellspacing='0' cellpadding='5'>";
            echo "<tr><th>Índice</th><th>Valor</th></tr>";
        
            // Recorre el array y muestra los valores
            foreach ($array as $indice => $valor) {
                echo "<tr>";
                echo "<td>$indice</td>";
                echo "<td>$valor</td>";
                echo "</tr>";
            }
        
            echo "</table>";
        }

        echo '<h2 class="green">Datos del array recibidos:</h2>';
        MostarNormal($listaEquipos);
    ?>
</body>
</html>
