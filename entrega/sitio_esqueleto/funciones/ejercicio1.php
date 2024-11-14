<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>

        <style>
            /* Contenedor de todas las tablas */
            .tabla-contenedor {
                margin-top: 50px;
            display: grid;
            grid-template-columns: repeat(2, auto); /* 2 tablas por fila */
            gap: 20px; /* Espacio entre las tablas */
            justify-content: center; /* Centra las tablas en la página */
            align-items: start; /* Alinea las tablas verticalmente al inicio */
        }

        /* Contenedor de cada tabla y su título */
        .tabla-item {
            text-align: center; /* Centra el título y la tabla */
        }

        /* Estilo de cada tabla */
        table {
            border-collapse: collapse;
            margin: 0 auto; /* Centra la tabla dentro de su contenedor */
            text-align: center;
        }

        /* Bordes y estilo de las celdas */
        td, th {
            border: 1px solid black;
            padding: 10px;
        }

        h3 {
            margin-bottom: 10px;
        }
        </style>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu.php")?>



		
		<section>
		
            <?php include("../includes/navfunciones.php")?>

			<main>
            <a href="http://localhost/3.3/sitio_esqueleto/funciones/" class="link-inicio">Inicio - Ejercicios funciones</a>
            </div>
            <div class="content" style="text-align:center; margin: 20px;">
            <h1>TABLA DE NUMEROS NATURALES</h1>
				
            <?php
                function generarTabla($n, $m) {
                    echo "<table>";
                    $contador = 1;
                    for ($i = 0; $i < $n; $i++) {
                        echo "<tr>";
                        for ($j = 0; $j < $m; $j++) {
                            echo "<td>$contador</td>";
                            $contador++;
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                ?>

                <div class="tabla-contenedor">
                    <div>
                        <h3>TABLA HTML DE 5 X 7</h3>
                        <?php generarTabla(5, 7); ?>
                    </div>
                    <div>
                        <h3>TABLA HTML DE 10 X 10</h3>
                        <?php generarTabla(10, 10); ?>
                    </div>
                    <div>
                        <h3>TABLA HTML DE 6 X 3</h3>
                        <?php generarTabla(6, 3); ?>
                    </div>
                    <div>
                        <h3>TABLA HTML DE 2 X 15</h3>
                        <?php generarTabla(2, 15); ?>
                    </div>
                </div>
		
            </main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

