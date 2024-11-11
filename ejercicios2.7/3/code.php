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
    </style>
</head>
<body>

    <?php
    $listaEquipos = array(
        "F.C. Barcelona" => 82, "Real Madrid" => 84, "Atlético Madrid" => 78, "Valencia" => 75,
        "Sevilla" => 76, "Villarreal" => 60, "Málaga" => 50, "Espanyol" => 47, "Athletic Bilbao" => 55,
        "Celta" => 51, "Real Sociedad" => 46, "Rayo Vallecano" => 49, "Getafe" => 36, "Osasuna" => 33,
        "Elche" => 41, "Deportivo" => 38, "Almería" => 29, "Levante" => 37, "Granada" => 35, "Zaragoza" => 32
    );

    // Ordenar los equipos de manera descendente por puntos
    $listaOrden = $listaEquipos;
    arsort($listaOrden);

    // Obtener el equipo seleccionado del formulario
    $equipo = isset($_GET['equipo']) ? $_GET['equipo'] : '';

    // Encontrar la posición del equipo
    $posicion = array_search($equipo, array_keys($listaOrden)) + 1;

    // Mostrar la posición y los puntos del equipo
    if ($posicion) {
        echo '<p class="green">El ' . $equipo . ' tiene ' . $listaOrden[$equipo] . ' puntos, ahora mismo es el ' . $posicion . 'º en la clasificación.</p>';
    } else {
        echo '<p class="green">El equipo seleccionado no se encontró en la lista.</p>';
    }
    ?>

    <a href="http://localhost/ejercicios2.7/3/">Nueva consulta</a>

    <?php
    function Mostar($array) {
        if (!is_array($array)) {
            $mensaje = "Función MostarNormal ejecutada con parámetros incorrectos";
            echo "<script>console.log('" . addslashes($mensaje) . "');</script>";
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

    echo '<h2 class="green">Datos del array recibidos ordenados por valor:</h2>';
    Mostar($listaOrden);
    ?>
</body>
</html>
