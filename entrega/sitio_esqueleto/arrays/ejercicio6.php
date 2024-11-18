<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
        <style>
       
        
        </style>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu2.php")?>

        

		
		<section>
		
            <?php include("../includes/navarrays.php")?>

			<main>
            <div class="container">
                        <a href="index.php" class="link-inicio">Inicio - Ejercicios Arrays</a>
                    </div>
                    <div class="content" style="text-align:center; margin: 20px;">
                    <h1>PALINDROMOS</h1>
                </div>

                <?php

                    $text = $_GET['texto']??null;

                    if($text==null)
                    {
                        echo '<form action="" method="get">
                        <h2 >FORMULARIO</h2>
                        <p>Introduce el texto:</p>
                        <input name="texto" type="text">

                        <button type="submit">Enviar</button>

                    </form>';
                    }
                    else
                    {
                        function es_palindromo($palabra)
                        {
                            return ($palabra == strrev($palabra));
                        }
                    
                    
                    
                        $text = strtoupper($_GET['texto']);
                    
                       
                       
                        
                            echo('<p>El texto introducido es : '.$text.'</p>');
                    
                            echo('<p>'.((es_palindromo($text)==true)?'Se trata de un palindromo':'No es un palindromo').'</p>');


                            echo '<form action="" method="get">
                            <h2 >FORMULARIO</h2>
                            <p>Introduce el texto:</p>
                            <input name="texto" type="text">
    
                            <button type="submit">Enviar</button>
    
                        </form>';
                        
                    }
                ?>

               
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

