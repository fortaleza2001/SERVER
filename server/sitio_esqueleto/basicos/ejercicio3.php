<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

        include("../includes/metadata2.php");
  
    ?>
</head>

<style>






.form-container {
    
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px; /* Espaciado entre elementos del formulario */
  
    width: 800px; /* Ajusta el ancho del formulario */
    height: 150px;
   
}

.form-group {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
}

.form-group label {
    margin-bottom: 5px;
}

.form-group input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-actions {
    display: flex;
    gap: 10px;
}

.form-actions input[type="submit"],
.form-actions input[type="reset"] {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-actions input[type="submit"] {
    background-color: #4CAF50;
    color: white;
}

.form-actions input[type="reset"] {
    background-color: #f44336;
    color: white;
}



.container {
    display: flex;             /* Alinea el contenido en línea (horizontalmente) */
    justify-content: flex-start; /* Alinea el contenido a la izquierda */
    align-items: flex-start;   /* Alinea el contenido al principio de manera vertical */
    padding-top: 20px;         /* Espacio superior del contenedor */
}

.link-inicio {
    color: blue;              /* Color azul para el enlace */
    text-decoration: none;    /* Elimina el subrayado del enlace */
    font-weight: bold;        /* Hace el texto en negrita */
}

.content h1 {
    margin-bottom: 20px;      /* Agrega un margen inferior de 20px al h1 */
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





<body>
   
    <?php

        include("../includes/header2.php");
        include("../includes/menu.php");
        include("../includes/nav_basicos.php");
      

    ?>
  
       
    <main>
        <div class="container">
        <a href="http://localhost/3.3/sitio_esqueleto/basicos/" class="link-inicio">Inicio - Ejercicios básicos</a>
    </div>

    <div class="content">
        <h1>CAMBIO DIVISAS</h1>
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
echo '<a href="http://localhost/3.3/sitio_esqueleto/basicos/ejercicio3.php">Volver al formulario</a>';
}







        ?>
        
    
        
    
    </main>

    
    <?php

       
        include("../includes/aside2.php");
        include("../includes/footer.php");

    ?>

  
</body>
</html>