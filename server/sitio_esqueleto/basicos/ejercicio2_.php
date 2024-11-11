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
        <h1>CONVERSOR DE MONEDA</h1>
    </div>
    <?php

        $euros = $_GET['euros']??null;
        $tipo = $_GET['moneda']??null;




function convertir($cantidad,$moneda)
{
    $dollar=1.0543;
    $libra = 0.8678;

    if($moneda=="$")
    {
        return $cantidad*$dollar;
    }
    else
    {
        return $cantidad*$libra;
    }
}


if($euros==null)
{
    echo '<form action="" method="GET">
					<b>Cantidad de euros a cambiar:</b> <input type="number" name="euros"  step="any"  min="0"/><br/><br/>
					
                    <b>Elige una moneda de destino:</b>
					<select id="moneda" name="moneda">
						<option value="$">Dólar</option>
						<option value="£">Libra</option>
					</select>
					
					<input type="submit" value="Enviar" />
					<input type="reset" value="Borrar" />
				</form>'    ;
}
else
{
    // Devolver el HTML con los resultados
echo "


<h1>El cambio realizado es de Euros a ".(($tipo=="$")? "Dollar":"Libras")."</h1>
<p>".$euros. " euros es igual  a ".convertir($euros,$tipo). " ".(($tipo=="$")? "$":"£")."</p>
<a href='http://localhost/ejercicios2.3/2/'>Conversor </a>

";
}





        ?>
        
    
        
    
    </main>

    
    <?php

       
        include("../includes/aside2.php");
        include("../includes/footer.php");

    ?>

  
</body>
</html>