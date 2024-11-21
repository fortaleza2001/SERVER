
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<style>
      .ull {
    list-style-type: disc; /* Bolas negras predeterminadas */
    padding-left: 40px;    /* Espaciado desde el margen izquierdo */
  }

  .lil {
    margin-bottom: 8px; /* Espaciado entre elementos */
    line-height: 1.5;   /* Espaciado entre líneas */
  }

  .bot {
   
    margin: 5px;
    margin-left: 35px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 14px;
  }
</style>
<body>
<?php

include("./conexion_bbdd.php");

                       
$numeroCliente = $_GET['numeroCliente']??null;
$borrar = $_GET['borrar']??null;
$codigoCliente = $_GET['codigoCliente']??null;


if($borrar)
{
    if($borrar=="false")
    {
        echo '<h2>El cliente con codigo '.$codigoCliente.' no se ha borrado </h2>
              <a href="ejercicio7.php">Volver al formulario</a>  ';
    }
    else
    {
        echo'<h2>RESULTADOS DE BORRADO DE CLIENTE DE CÓDIGO '.$codigoCliente.' </h2>';

        $sqlpagos = 'DELETE FROM pagos WHERE CodigoCliente = '.$codigoCliente.';';
        $sqlDetallePedidos = 'DELETE FROM detallepedidos 
            WHERE CodigoPedido IN (
                SELECT CodigoPedido FROM pedidos WHERE CodigoCliente = '.$codigoCliente.'
            );';
        $sqlPedidos = 'DELETE FROM pedidos WHERE CodigoCliente = '.$codigoCliente.';';
        $sqlclientes = 'DELETE FROM clientes WHERE CodigoCliente = '.$codigoCliente.';';

        $resultPagos = mysqli_query($conexion, $sqlpagos);
        if ($resultPagos) 
        {
            echo "<p>Se han borrado los pagos del cliente.</p>";
        } 

        $resultDetalles = mysqli_query($conexion, $sqlDetallePedidos);
        if ($resultDetalles) 
        {
            echo "<p>Se han borrado los detalles de pedidos  del cliente.</p>";
        } 

        $resultPedidos = mysqli_query($conexion, $sqlPedidos);
        if ($resultPedidos) 
        {
            echo "<p>Se han borrado los pedidos del cliente.</p>";
        } 

        $resultCliente = mysqli_query($conexion, $sqlclientes);
        if ($resultCliente) 
        {
            echo "<p>Se han borrado el cliente de la tabla clientes.</p>";
        } 

        echo '<a href="ejercicio7.php">VOLVER</a>';
    }
}
else
{
    if($numeroCliente) //Se va a buscar unicamente al primer cliente que aparezca con este numero
{

  $sql = 'SELECT * FROM clientes WHERE Telefono='.$numeroCliente;
  $resultado = mysqli_query($conexion,$sql);

  if (mysqli_num_rows($resultado) > 0) 
  {
      $row = mysqli_fetch_assoc($resultado);
      $codigoCliente=$row['CodigoCliente'];
      $nombreCliente = $row['NombreCliente'];
      $nombreContacto = $row['NombreContacto'];
      $ApellidoContacto = $row['ApellidoContacto'];
      $Telefono = $row['Telefono'];
      $Fax = $row['Fax'];
      $direccion1 = $row['LineaDireccion1'];
      $direccion2 = $row['LineaDireccion2'];
      $ciudad = $row['Ciudad'];
      $Region = $row['Region'];
      $Pais = $row['Pais'];
      $codigoPostal = $row['CodigoPostal'];
      $LimiteCredito = $row['LimiteCredito'];
      $codigoEmpleado = $row['CodigoEmpleadoRepVentas'];

      echo'<h1>FICHA DEL CLIENTE </h1>
           <ul class="ull">
              <li class="lil">Codigo Cliente : '.$codigoCliente.'</li>
              <li  class="lil">Nombre Cliente : '.$nombreCliente.'</li>
              <li  class="lil">Nombre Contacto : '.$nombreContacto.'</li>
              <li  class="lil">Apellido Contacto : '.$ApellidoContacto.'</li>
              <li  class="lil">Telefono : '.$Telefono.'</li>
              <li  class="lil">FAX : '.$Fax.'</li>
              <li  class="lil">Linea Direccion1 : '.$direccion1.'</li>
              <li  class="lil">Linea Direccion2 : '.$direccion2.'</li>
              <li  class="lil">Ciudad : '.$ciudad.'</li>
              <li  class="lil">Region : '.$Region.'</li>
              <li  class="lil">Pais : '.$Pais.'</li>
              <li  class="lil">CodigoPostal : '.$codigoPostal.'</li>
              <li  class="lil">CodigoEmpleadoRepVentas : '.$codigoEmpleado.'</li>
              <li  class="lil">Limite Credito : '.$LimiteCredito.'</li>
           </ul>

           <p>¿Quieres eliminar este cliente?</p>

          <form method="GET" action="" style="display: inline-block; margin-right: 10px;">
    <input type="hidden" name="codigoCliente" value="'.$codigoCliente.'">
    <input type="hidden" name="borrar" value="true">
    <button type="submit" class="bot">SI</button>
</form>
<form method="GET" action="" style="display: inline-block;">
    <input type="hidden" name="codigoCliente" value=" '.$codigoCliente.' ">
    <input type="hidden" name="borrar" value="false">
    <button type="submit" class="bot">NO</button>
</form>
          
      ';
  }
  else
  {
      echo'<h2>No hay ningun cliente con este numero : '.$numeroCliente.' </h2>
      <a href="ejercicio7.php">Vuelva a consultar</a>';
  }



}
else
{
  echo ('
  <form method="GET" action="">
      
      <p>Escribe el telefono del cliente:</p>
      <input type="text" name="numeroCliente" required>
      <button type ="submit">EnviarConsulta</button>
  </form>');
}

}




?>
</body>
</html>


