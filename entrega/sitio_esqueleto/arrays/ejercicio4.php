<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
		<style>
			table {
				margin-bottom: 15px;
			}
			th {
				text-align: center;
			}

			td {
				text-align: center;
			}

			.container2 {
				text-align: center;          /* Centra el texto dentro de los elementos hijos */
				display: flex;               /* Activa el modelo de diseño Flexbox */
				justify-content: center;     /* Centra los elementos hijos horizontalmente */
				align-items: center;         /* Centra los elementos hijos verticalmente (opcional) */
				height: 60px;
				flex-direction:column;
				margin-top:30px;
			}


		</style>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu.php")?>



		
		<section>
		
            <?php include("../includes/navarrays.php")?>

			<main>
                <div class="container">
                    <a href="http://localhost/3.3/sitio_esqueleto/basicos/" class="link-inicio">Inicio - Ejercicios Arrays</a>
                </div>
                <div class="content" style="text-align:center; margin: 20px;">
                    <h1>TEMPERATURA MEDIA DE LA SEMANA</h1>
                </div>

                <?php

					$edad=array(10,12,34,23,1,2,35,46,2,7,45,8,9,14,78,67,5,67,45,3,4,45,67,89,90,23,13,24,56,4,23,13,56,99,99);
					$conta=array(0,0,0,0,0,0,0,0,0,0);

					for($x=0;$x<count($edad);$x++)
					{
						if($edad[$x]<10)
						{
							$conta[0]++;
						}
						else if($edad[$x]<20)
						{
							$conta[1]++;
						}
						else if($edad[$x]<30)
						{
							$conta[2]++;
						}
						else if($edad[$x]<40)
						{
							$conta[3]++;
						}
						else if($edad[$x]<50)
						{
							$conta[4]++;
						}
						else if($edad[$x]<60)
						{
							$conta[5]++;
						}
						else if($edad[$x]<70)
						{
							$conta[6]++;
						}
						else if($edad[$x]<80)
						{
							$conta[7]++;
						}
						else if($edad[$x]<90)
						{
							$conta[8]++;
						}
						else
						{
							$conta[9]++;
						}
					}

					echo "<table border='1'>";
					echo "<tr><th>Intervalo</th><th>Frecuencia</th></tr>";
					
					for ($i = 0; $i < count($conta); $i++) {
						echo "<tr>";
						if ($i == 9) {
							echo "<td>>=90</td>"; // Mostrar '>=90' para el último intervalo
						} else {
							echo "<td>" . $i . " - " . ($i + 9) . "</td>"; // Mostrar intervalo como 'i - (i+9)'
						}
						echo "<td>" . $conta[$i] . "</td>"; // Mostrar la frecuencia correspondiente
						echo "</tr>";
					}
					
					echo "</table>";
					


					echo "<table border='1'>";
					echo "<tr><th>Edad media</th><th>".(array_sum($edad)/count($edad))."</th></tr>";
					echo "<tr><th>Edad maxima</th><th>".(max($edad))."</th></tr>";
					echo "<tr><th>Edad minima</th><th>".(min($edad))."</th></tr>";
					echo "</table>";
					echo '<div class="container2">';
					echo '<p>La edad media es : '.(array_sum($edad)/count($edad)).', calculada con función array_sum()</p><br>';
					echo '<p>La edad maxima es : '.(max($edad)).', calculada con función max()</p><br>';
					echo '<p>La edad minima es : '.(min($edad)).', calculada con función min()</p><br>';
					echo '</div>';


                ?>
				
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

