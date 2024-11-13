<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu.php")?>

        <style>
            
        </style>

		
		<section>
		
            <?php include("../includes/navbasicos.php")?>

			<main>
            <a href="http://localhost/3.3/sitio_esqueleto/basicos/" class="link-inicio">Inicio - Ejercicios básicos</a>
                </div>
                <div class="content" style="text-align:center; margin: 20px;">
                <h1>CONVERSOR EUROS</h1>
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
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

