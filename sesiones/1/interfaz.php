<?php
session_start(); // Inicia o reanuda la sesión

// Verifica si las variables de sesión están definidas
if (!isset($_SESSION['username']) || !isset($_SESSION['color'])) {
    // Si no están definidas, redirige al archivo de inicio de sesión
    echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Inicio sesion</title>
        </head>
        <body>

            <h2>Registro requerido</h2>

            <a href="index.php">Regístrese aquí</a>


            
            
        </body>
        </html>';
}
else
{
    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Inicio sesion</title>
            <style>
                body{
                    background-color: '.($_SESSION['color']).';
                }
            </style>
        </head>
        <body>

            <h2>Bienvenido , '.($_SESSION['username']).' </h2>

            
            <a href="sesion.php">Comprueba tu sesion</a>


            
            
        </body>
        </html>';
}

// Si existen, puedes acceder a ellas
$username = $_SESSION['username'];
$color = $_SESSION['color'];
?>






