<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Asociativo</title>
</head>
<style>
   body {
    display: flex;

    align-items: center; /* Centra verticalmente */
    height: 100%; /* Ocupa toda la altura de la pantalla */
    margin: 0; /* Elimina el margen para un ajuste exacto */
    flex-direction: column;
    margin: 20px;
    }

    .green{
        color: green;
    }
</style>
<body>
    <h1>LLamada con arrays de localidades:</h1>

    <?php

        $localidades = [ "Palencia" => 80000, "Valladolid" => 350000, "Oviedo" => 120000, "Madrid" => 3320000, "Barcelona" => 1620000, "Zaragoza" => 666880, "Soria" => 39112, "Huesca" => 52463, "Teruel"     => 35691];

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

        function MostarPorValor($array) {
            if (!is_array($array)) {
                $mensaje = "Función MostarNormal ejecutada con parámetros incorrectos";
                echo "<script>console.log('". addslashes($mensaje) ."');</script>";
                return null;
            }

            arsort($array);

        
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
        

        function MostarPorIndice($array) {
            if (!is_array($array)) {
                $mensaje = "Función MostarNormal ejecutada con parámetros incorrectos";
                echo "<script>console.log('". addslashes($mensaje) ."');</script>";
                return null;
            }

            ksort($array);

        
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

       echo('<h2 class="green">Datos recibidos normal:</h2>');
       MostarNormal($localidades);

       echo('<h2 class="green">Datos recibidos ordenador por valor:</h2>');
       MostarPorValor($localidades);

       echo('<h2 class="green">Datos recibidos ordenador por indice:</h2>');
       MostarPorIndice($localidades);
      
    ?>

   
</body>
</html>






