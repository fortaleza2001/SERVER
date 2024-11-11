
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindromos resultado</title>
</head>
<body>
    
<?php

    function es_palindromo($palabra)
    {
        return ($palabra == strrev($palabra));
    }



    $text = strtoupper($_GET['texto']);

    if($text ==null)
    {
        echo('<p>No has introducido nada </p>');
    }
    else
    {
        echo('<p>El texto introducido es : '.$text.'</p>');

        echo('<p>'.((es_palindromo($text)==true)?'Se trata de un palindromo':'No es un palindromo').'</p>');
    }
   
?>




<form action="code.php" method="get">
            <h2 >FORMULARIO</h2>
            <p>Introduce el texto:</p>
            <input name="texto" type="text">

            <button type="submit">Enviar</button>

</form>
    

</body>
</html>