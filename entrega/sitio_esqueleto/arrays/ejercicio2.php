<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
        <style>
          .blue{
            color: blue;
            margin-bottom: 10px;
            align-items: center;
            text-align: center;
          }
          
          .green{
            color: green;
            margin-bottom: 10px;
            align-items: center;
            text-align: center;
          }

        </style>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu2.php")?>



		
		<section>
		
            <?php include("../includes/navarrays.php")?>

			<main>
            <div class="container">
                    <a href="http://localhost/3.3/sitio_esqueleto/basicos/" class="link-inicio">Inicio - Ejercicios Arrays</a>
                </div>
                <div class="content" style="text-align:center; margin: 20px;">
                <h1>ARRAYS ASOCIATIVOS</h1>
            </div>

            <h1 class="blue">LLamada con arrays de localidades:</h1>

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


            
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

