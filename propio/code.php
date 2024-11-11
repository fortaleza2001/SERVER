<?php

$numero1 = $_GET['numero1']; // Acceder al valor del parámetro 'numero1'
$numero2 = $_GET['numero2']; // Acceder al valor del parámetro 'numero1'
$numero3 = $_GET['numero3']; // Acceder al valor del parámetro 'numero1'
$numero4 = $_GET['numero4']; // Acceder al valor del parámetro 'numero1'

if($numero1==null)
{
    $numero1=0;
}

if($numero2==null)
{
    $numero2=0;
}

if($numero3==null)
{
    $numero3=0;
}

if($numero4==null)
{
    $numero4=0;
}

echo "La suma total es " .($numero1+$numero2+$numero3+$numero4);

?>
