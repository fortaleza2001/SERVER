<?php
function verRespuesta($respuestas) {
    if(count($respuestas)!=2){ //Si no hay el numero indicado de respuestas se pone mal la pregunta
        return 0;
    }
    for ($i =0;$i<count($respuestas);$i++) {
        if ($respuestas[$i]== "Java" || $respuestas[$i]== "JavaScript") {
           
        }
        else{
            return 0;
        }
    }
    return 1;  // Retorna 1 si todas las respuestas son válidas
}

// Recoger los datos del formulario
$nombre = $_GET['nombreEnviado'] ?? 'Nombre no enviado';
$apellido = $_GET['apellidoEnviado'] ?? 'Apellido no enviado';
$respuesta1 = $_GET['prop'] ?? 'Respuesta 1 no enviada';
$respuesta2 = $_GET['lenguajes'] ?? [];

// Inicializar la puntuación
$puntuacion = 0;

if ($respuesta1=="true") {
    $puntuacion++;
    echo($respuesta1);
}

// Sumar la puntuación del análisis de los lenguajes
$puntuacion += verRespuesta($respuesta2);

// Devolver el HTML con los resultados
echo "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Resultados del Formulario</title>
    <link rel='stylesheet' type='text/css' href='estilos.css'>
</head>
<body>
    <h1>Resultados del Formulario</h1>
    <p><strong>Nombre:</strong> $nombre $apellido</p>
    <p><strong>Resultado de la Prueba:</strong> $puntuacion/2 correctas.</p>
    <a href='http://localhost/ejercicios2.3/1/'>Formulario </a>
</body>
</html>";
?>
