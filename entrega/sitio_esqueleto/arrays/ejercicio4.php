<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
        <style>
           .input-container {
            display: inline-flex;
            align-items: center;
        }

        .blue{
            color: blue;
            margin-bottom: 10px;
            align-items: center;
            text-align: center;
          }
        label {
            margin-right: 10px;
        }

        .green {
            color: green;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        form{
            align-items: center;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        button{
            width: 40%;

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
                        <a href="index.php" class="link-inicio">Inicio - Ejercicios Arrays</a>
                    </div>
                    <div class="content" style="text-align:center; margin: 20px;">
                    <h1>FUNCIONES PROPIAS DE ARRAYS</h1>
                </div>

                <h2 class="blue">range,array_filter,array_map,array_reduce y arsort</h2>

<?php


function cuadrado($var)
{
    // Retorna siempre que el número entero sea impar
    return $var**2;
}

function par($var)
{
    // Retorna siempre que el número entero sea par
    return !($var & 1);
}

function suma($carry, $item)
{
$carry += $item;
return $carry;
}

    $array_range = range(1,20);
    echo('<p class="green"> Array generado: '.implode(', ',$array_range ).' </p>');
    $pares = array_filter($array_range,"par");
    echo('<p class="green"> Numeros pares originales: '.implode(', ',$pares ).' </p>');
    $cuadrados = array_map("cuadrado",$pares);
    echo('<p class="green"> Numeros al cuadrado: '.implode(', ',$cuadrados ).' </p>');
    $suma = array_reduce($cuadrados,"suma");
    echo('<p class="green"> Suma de todos los numeros al cuadrado: '.$suma.' </p>');
    arsort($array_range);
    echo('<p class="green"> Lista ordenada en orden descendente: '.implode(', ',$array_range ).' </p>');
        
?>

              


			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

