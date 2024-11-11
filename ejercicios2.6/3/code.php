<?php

function desglosarEuros($euros)
{
    $monedas = [500, 200, 100, 50, 20, 10, 5, 2, 1];  
    $resultado = "";  

    for ($i = 0; $i < count($monedas); $i++) {
        
        $numUnidades = intdiv($euros, $monedas[$i]);  
       
        $resultado .= "Nº de unidades de ".$monedas[$i]." euros: ".$numUnidades."<br>";
        
        
        $euros = $euros % $monedas[$i];
    }

    return $resultado;
}

// Obtenemos el valor enviado por el formulario
$eurosenviados = isset($_POST["eurosenviados"]) ? $_POST["eurosenviados"] : 0;



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
            <p>Cantidad pedida de euros a desglosar es: '.$eurosenviados.'</p>
            <p>'.desglosarEuros($eurosenviados).'</p>

            <a href="http://localhost/ejercicios2.6/2/">Volver a pedir nuevo desglose</a>
        
        </div>

    
    
</body>
</html>
')













?>