<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

        include("../includes/metadata2.php");
  
    ?>
</head>







<body>
   
    <?php

        include("../includes/header2.php");
        include("../includes/menu.php");
        include("../includes/nav_basicos.php");
      

    ?>
  
       
    <main>

    <?php
        // Verificar el parámetro 'section' en la URL para determinar el contenido a mostrar
        $section = $_GET['section'] ?? 'inicio';

        // Cargar contenido según el valor de 'section'
        switch ($section) {
            case '1':
                include './Ejercicio1/ejercicio1.php';
                break;
            case 'contact':
                include 'contact.php';
                break;
            default:
                echo '<h2>Zona de ejercicios basicos</h2>
        <p>Aqui se pueden consultar desde el menuú de navegación algunos de los ejercicios realizados en el módulo sobre programación básica </p>';
                break;
        }
        ?>
        
    
    </main>

    
    <?php

       
        include("../includes/aside2.php");
        include("../includes/footer.php");

    ?>

  
</body>
</html>