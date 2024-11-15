<?php
    $ruta = $_GET['page']??null;

    if($ruta!=null)
    {
        
        session_start();

       
        session_unset();

       
        session_destroy();

        

        // Redirigir a la página actual o la página de login
        header("Location: $ruta");
    }
?>