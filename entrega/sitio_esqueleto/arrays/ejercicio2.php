<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
        <style>
              form {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        input[type="number"] {
            margin-bottom: 20px;
        }

        button {
            margin-left: 10px;
            margin-right: 10px;
        }

        .button-container {
            display: flex;
            justify-content: center;
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
                    <h1>DESGLOSE DE MONEDA</h1>
                </div>
                <?php
                function desglosarEuros($euros)
                {
                    $monedas = [500, 200, 100, 50, 20, 10, 5, 2, 1];  
                    $resultado = "";  
                
                    for ($i = 0; $i < count($monedas); $i++) {
                        
                        $numUnidades = (int)($euros/ $monedas[$i]);  
                       
                        $resultado .= "Nº de unidades de ".$monedas[$i]." euros: ".$numUnidades."<br>";
                        
                        
                        $euros = $euros % $monedas[$i];
                    }
                
                    return $resultado;
                }
                
                // Obtenemos el valor enviado por el formulario
                $eurosenviados = $_POST["eurosenviados"]  ?? null;
                
                if($eurosenviados==null)
                {
                    echo ' <form action="" method="post">
                    <h2>FORMULARIO</h2>
                    <b>Introduce la cantidad de euros a desglosar:</b><br>
                    <input type="number" name="eurosenviados" required><br>

                    <div class="button-container">
                        <button type="submit">Enviar</button>
                        <button type="reset">Borrar</button>
                        
                    </div>
                </form>';
                }
                else
                {
                    echo ' <div class="resultado">
                    <h2>RESULTADO:</h2>
                    <p>Cantidad pedida de euros a desglosar es: '.$eurosenviados.'</p>
                    <p>'.desglosarEuros($eurosenviados).'</p>

                    <a href="http://localhost/ejercicios2.6/2/">Volver a pedir nuevo desglose</a>
                
                </div>';
                }

                ?>
				
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

