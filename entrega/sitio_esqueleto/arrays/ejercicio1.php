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

        .resultado {
            margin-bottom: 20px;
            text-align: center;
            
        }

        .text_res{
            text-align: center;
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
                <h1>RESTO DIVIDIDO ENTRE 12</h1>
            </div>

            <?php
            function restoDividir12($entero)
            {
                $numeros = ["uno","dos","tres","cuatro","cinco","seis","siete","ocho","nueve","diez","once"];
            
                return $numeros[($entero%12) -1];
            }
            
            $numero = $_POST["numero"]??null; //Este es el numero a dividir entre 12

            if($numero==null)
            {
                echo '<form action="" method="post">
                    <h2>FORMULARIO</h2>
                    <b>Escriba un número entero positivo:</b><br>
                    <input type="number" name="numero" required><br>

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
                        <p class ="text_res">El número introducido ha sido el  '.$numero.'  y el resto de su división por 12 es <b>'.restoDividir12($numero).'.</b></p>
                    </div>
                

                <form action="" method="post">
                    <h2>FORMULARIO</h2>
                    <b>Escriba un número entero positivo:</b><br>
                    <input type="number" name="numero" required><br>

                    <div class="button-container">
                        <button type="submit">Enviar</button>
                        <button type="reset">Borrar</button>
                    </div>
                </form>';
            }


            ?>


            
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

