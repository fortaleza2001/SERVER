
<link rel="stylesheet" type="text/css" href="estilos.css">

<?php




$euros = $_GET['euros'];
$tipo = $_GET['moneda'];




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




// Devolver el HTML con los resultados
echo "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Cambio</title>
    <link rel='stylesheet' type='text/css' href='estilos.css'>
</head>
<body>
    <h1>El cambio realizado es de Euros a ".(($tipo=="$")? "Dollar":"Libras")."</h1>
    <p>".$euros. " euros es igual  a ".convertir($euros,$tipo). " ".(($tipo=="$")? "$":"£")."</p>
    <a href='http://localhost/ejercicios2.3/2/'>Conversor </a>
</body>
</html>";

?>
