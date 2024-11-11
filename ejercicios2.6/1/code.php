<?php

function restoDividir12($entero)
{
    $numeros = ["uno","dos","tres","cuatro","cinco","seis","siete","ocho","nueve","diez","once"];

    return $numeros[($entero%12)];
}

$numero = $_POST["numero"]; //Este es el numero a dividir entre 12

echo('<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Divisor entre 12</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        form {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        input[type="number"] {
            margin-bottom: 20px;
        }

        button {
            margin-left: 10px;
            margin-right: 10px;
        }

        .button-container {
            display: flex;
            justify-content: center;
        }

        .resultado {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>

    
        <div class="resultado">
            <h2>RESULTADO:</h2>
            <p>El número introducido ha sido el  '.$numero.'  y el resto de su división por 12 es <b>'.restoDividir12($numero).'.</b></p>
        </div>
    

    <form action="" method="post">
        <h2>FORMULARIO</h2>
        <b>Escriba un número entero positivo:</b><br>
        <input type="number" name="numero" required><br>

        <div class="button-container">
            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
        </div>
    </form>
    
</body>
</html>
')













?>