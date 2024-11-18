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
                    <h1>PRODUCTO DE MATRICES</h1>
                </div>

                <?php
       
       function renderMatrix($matrix, $title) {
        echo "<div style='margin: 10px;'>";
        echo "<h3>$title</h3>";
        echo "<table style='border-collapse: collapse; border-left: 1px solid black; border-right: 1px solid black;'>";
        foreach ($matrix as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                // Bordes laterales en cada celda
                echo "<td style=' padding: 5px;'>$cell</td>";
            }
 
        }
        echo "</table>";
        echo "</div>";
    }
    
function crearTablas($rows1, $cols1, $rows2, $cols2) {
    echo "<form method='get' action=''>"; // Abre el formulario

    // Campos ocultos para enviar las dimensiones de ambas matrices
    echo "<input type='hidden' name='for' value='enviado'>";
    echo "<input type='hidden' name='1' value='{$rows1}'>";
    echo "<input type='hidden' name='2' value='{$cols1}'>";
    echo "<input type='hidden' name='3' value='{$rows2}'>";
    echo "<input type='hidden' name='4' value='{$cols2}'>";

    echo "<div style='display: flex; gap: 20px;'>";

    // Tabla 1 (Matriz 1)
    echo "<div>";
    echo "<h3>Matriz 1</h3>";
    echo "<table border='1' style='border-collapse: collapse;'>";
    for ($i = 0; $i < $rows1; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols1; $j++) {
            echo "<td><input type='text' name='matrix1_{$i}_{$j}' style='width: 50px; box-sizing: border-box;' /></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

    // Tabla 2 (Matriz 2)
    echo "<div>";
    echo "<h3>Matriz 2</h3>";
    echo "<table border='1' style='border-collapse: collapse;'>";
    for ($i = 0; $i < $rows2; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols2; $j++) {
            echo "<td><input type='text' name='matrix2_{$i}_{$j}' style='width: 50px; box-sizing: border-box;' /></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

    echo "</div>";

    // Botón de envío
    echo "<button style='margin: 10px;' type='submit'>Enviar datos</button>";

    echo "</form>"; // Cierra el formulario
}

function getMatrixFromGet($prefix, $rows, $cols) {
    $matrix = [];
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $key = "{$prefix}_{$i}_{$j}"; // Construye el nombre del campo, ej. "matrix1_0_0"
            $matrix[$i][$j] = isset($_GET[$key]) ? $_GET[$key] : null; // Asigna el valor o null si no existe
        }
    }
    return $matrix;
}

// Función para calcular el producto de dos matrices
function multiplicarMatrizes($matrix1, $matrix2) {
    $rows1 = count($matrix1);
    $cols1 = count($matrix1[0]);
    $cols2 = count($matrix2[0]);

    $result = [];
    for ($i = 0; $i < $rows1; $i++) {
        for ($j = 0; $j < $cols2; $j++) {
            $result[$i][$j] = 0;
            for ($k = 0; $k < $cols1; $k++) {
                $result[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
            }
        }
    }
    return $result;
}

       
       // Ejemplo de uso de la función
      
       
       
       

    
            $n1 = isset($_GET['1']) ? $_GET['1'] : null;
            $n2 = isset($_GET['2']) ? $_GET['2'] : null;
            $n3 = isset($_GET['3']) ? $_GET['3'] : null;
            $n4 = isset($_GET['4']) ? $_GET['4'] : null;
            $form = isset($_GET['for']) ? $_GET['for'] : null;
            $matriz1 =getMatrixFromGet("matrix1",$n1 ,$n2);
            $matriz2 =getMatrixFromGet("matrix2",$n3 ,$n4);


            if($n1==null ||$n2==null ||$n3==null ||$n4==null )
            {
                echo('<form action="" method="get">
                        <h1 >DIMENSIÓN DE LAS MATRICES</h1>
                        <b>Introduce el numero de filas y columnas de las matrices a multiplicar</b>
                        <div class="container">
                            <p>Nº de filas de la matriz en el primer termino:</p>
                            <input type="number" name="1" required>
                        </div>
                        <div class="container">
                            <p>Nº de columnas de la matriz en el primer termino:</p>
                            <input type="number" name="2" required>
                        </div>
                        <div class="container">
                            <p>Nº de filas de la matriz en el segundo termino:</p>
                            <input type="number" name="3" required>
                        </div>
                        <div class="container">
                            <p>Nº de columnas de la matriz en el segundo termino:</p>
                            <input type="number" name="4" required>
                        </div>

                        <button type="submit">Enviar</button>

                 </form>');
            }

            else
            {
                if($form!=null)
                {
                    echo '<h1>RESULTADO</h1>';
                    echo '<p>Con los datos introducidos el producto de las matrices A y B es: </p>';

                    $resultado = multiplicarMatrizes($matriz1,$matriz2);

                    echo "<div style='display: flex; gap: 20px;'>";
                    renderMatrix($matriz1, "Matriz A");
                    echo '<h1>X</h1>';
                    renderMatrix($matriz2, "Matriz B");
                    echo '<h1>=</h1>';
                    renderMatrix($resultado, "Producto de A y B");
                    echo "</div>";

                    echo'<a href="ejercicio7.php">Manda uno nuevo</a>';
                }

                else if($n2 != $n3)
                {
                    echo('<h1 >DIMENSIÓN DE LAS MATRICES</h1>
                          <p>El numero de columnas de la matriz uno no coincide con el numero de filas de la matriz 2</p>
                          <a href="ejercicio7.php">Introduce otros datos</a>'
                );
                }
                else
                {
                    crearTablas($n1,$n2,$n3,$n4);
                    
                }

            }


        ?>
               
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

