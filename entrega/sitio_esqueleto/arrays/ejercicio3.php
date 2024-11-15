<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
        <style>
            .container2 {
                
            background-color: #00E5FF;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            justify-content: center
        }

        h2 {
            color: #0057ff; 
        }

        label {
            display: block;
            margin: 10px 0;
            text-align: left;
            font-size: 1.2em;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1.1em;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }

        button[type="reset"] {
            background-color: #f44336;
            color: white;
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
                    <h1>TEMPERATURA MEDIA DE LA SEMANA</h1>
                </div>
                <?php
// Obtenemos el valor enviado por el formulario
$diasTemperatura = $_POST["dias"] ?? null;

if ($diasTemperatura === null) {
    echo '<div class="container2">
            <h2>FORMULARIO PETICIÓN TEMPERATURAS</h2>
            <h3>Entrada de temperaturas de la semana</h3>

            <form action="" method="post">
                <label for="lunes">Lunes</label>
                <input type="number" id="lunes" name="dias[]" required>

                <label for="martes">Martes</label>
                <input type="number" id="martes" name="dias[]" required>

                <label for="miercoles">Miércoles</label>
                <input type="number" id="miercoles" name="dias[]" required>

                <label for="jueves">Jueves</label>
                <input type="number" id="jueves" name="dias[]" required>

                <label for="viernes">Viernes</label>
                <input type="number" id="viernes" name="dias[]" required>

                <label for="sabado">Sábado</label>
                <input type="number" id="sabado" name="dias[]" required>

                <label for="domingo">Domingo</label>
                <input type="number" id="domingo" name="dias[]" required>

                <div class="button-container">
                    <button type="submit">Enviar datos</button>
                    <button type="reset">Borrar datos</button>
                </div>
            </form>
        </div>';
} else {
    $temperaturaFor = 0;

    // Corregimos el bucle `for` con `$x` como variable
    for ($x = 0; $x < count($diasTemperatura); $x++) {
        $temperaturaFor += $diasTemperatura[$x];
    }

    $temperaturaFor = $temperaturaFor / count($diasTemperatura);
    $temperaturaArray_sum = array_sum($diasTemperatura) / count($diasTemperatura);

    echo '<h2>TEMPERATURA MEDIA</h2>
          <p>La temperatura media de la semana es: ' . $temperaturaFor . ' (calculada con bucle for)</p>
          <p>También se puede usar la función array_sum() y dividir por el número de elementos, count o sizeof()</p>
          <p>El resultado sigue siendo: ' . $temperaturaArray_sum . ' </p>';
}
?>


			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

