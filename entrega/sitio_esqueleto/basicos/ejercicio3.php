<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu2.php")?>

		<style>
			table {
   
   width: 300px; /* Ancho de la tabla */
   height: 500px; /* Ancho de la tabla */
   margin: auto; /* Centrar la tabla horizontalmente */
   text-align: center; /* Asegurar que el texto esté centrado */
}

th {
   background-color: rgb(22, 231, 231); /* Color de fondo de los títulos */
   color: black; /* Color del texto de los títulos */
   height: 30px; /* Altura de la fila del título */
   text-align: center; /* Centrar texto en los encabezados */
}

td {
   height: 30px; /* Altura de las filas de datos */
   width: 40px; /* Ancho de las columnas */
   text-align: center; /* Centrar texto en las celdas */
}

/* Alternar colores de las filas */
tr:nth-child(even) {
   background-color: orange; /* Color de fondo de filas pares */
   color: black; /* Color del texto en filas pares */
}

tr:nth-child(odd) {
   background-color: pink; /* Color de fondo de filas impares */
   color: black; /* Color del texto en filas impares */
}

		</style>

		
		<section>
		
            <?php include("../includes/navbasicos.php")?>

			<main>
			<a href="index.php" class="link-inicio">Inicio - Ejercicios básicos</a>
                </div>
                <div class="content" style="text-align:center; margin: 20px;">
                <h1>CAMBIO DE DIVISAS</h1>

				
            </div>

			<?php

$dollar_libra = $_GET['dollar_libra']??null;
$libra_dollar = $_GET['libra_dollar']??null;

if($dollar_libra == null || $libra_dollar == null) 
{
    echo '<form action="" method="GET">
					<b>Introduce el valor de comversion del dollar a libra:</b> <input type="number" name="dollar_libra"  step="any"/><br/><br/>
					
                    <b>Introduce el valor de comversion de la  libra  al dollar:</b> <input type="number" name="libra_dollar" step="any"/><br/><br/>
					
					<input type="submit" value="Enviar" />
					<input type="reset" value="Borrar" />
				</form>';
}
else
{
    echo "<table border='1'>";
echo "<tr><th>Número</th><th>Número * Dollar->Libra</th><th>Número * Libra->Dollar</th></tr>";

for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    echo "<td>" . $i . "</td>";
    echo "<td>" . ($i * $dollar_libra) . "</td>";
    echo "<td>" . ($i * $libra_dollar) . "</td>";
    echo "</tr>";
    
}

echo "</table>";
echo '<a href="ejercicio3.php">Volver al formulario</a>';
}







        ?>
        
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

