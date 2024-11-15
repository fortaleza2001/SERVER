<?php
session_start();

if (isset($_GET['username']) && isset($_GET['color'])) {
    // Guardar las variables de la sesión
    $_SESSION['username'] = $_GET['username'];
    $_SESSION['color'] = $_GET['color'];
    header("Location: interfaz.php");
    exit();
}
else
{

   

    // Eliminar todas las variables de sesión
        session_unset();

        // Destruir la sesión
        session_destroy();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>
</head>
<body>
    <h2>Formulario de Inicio de Sesión</h2>
    <form action="" method="GET">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="color">Color:</label>
        <input type="color" name="color" id="color" required>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>