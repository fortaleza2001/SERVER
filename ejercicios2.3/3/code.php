
<link rel="stylesheet" type="text/css" href="estilos.css">

<?php

$dollar_libra = $_GET['dollar_libra'];
$libra_dollar = $_GET['libra_dollar'];

if($dollar_libra == null || $libra_dollar == null) {
    // Envía un mensaje de error si alguno de los parámetros no está presente
    echo "Error: Debe proporcionar los valores para la conversión.";
    exit(); // Detiene la ejecución del script
}

// Generar la tabla de conversiones
echo "<main>";
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
echo "</main>";

?>
