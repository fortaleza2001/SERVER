<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu2.php")?>

        <style>
            .form-container {
    
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px; /* Espaciado entre elementos del formulario */
  
    width: 800px; /* Ajusta el ancho del formulario */
    height: 150px;
   
}

.form-group {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
}

.form-group label {
    margin-bottom: 5px;
}

.form-group input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-actions {
    display: flex;
    gap: 10px;
}

.form-actions input[type="submit"],
.form-actions input[type="reset"] {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-actions input[type="submit"] {
    background-color: #4CAF50;
    color: white;
}

.form-actions input[type="reset"] {
    background-color: #f44336;
    color: white;
}



.container {
    display: flex;             /* Alinea el contenido en línea (horizontalmente) */
    justify-content: flex-start; /* Alinea el contenido a la izquierda */
    align-items: flex-start;   /* Alinea el contenido al principio de manera vertical */
    padding-top: 20px;         /* Espacio superior del contenedor */
}

        </style>

		
		<section>
		
            <?php include("../includes/navbasicos.php")?>

            <main>
        <div class="container">
        <a href="index.php" class="link-inicio">Inicio - Ejercicios básicos</a>
    </div>
    <div class="content" style="text-align:center; margin: 20px;">
    <h1>TEST PHP</h1>
</div>



    <?php
        
        function verRespuesta($respuestas) {
            if (!is_array($respuestas) || count($respuestas) != 2) { // Asegúrate de que $respuestas sea un array y tenga exactamente 2 elementos
                return 0;
            }
            foreach ($respuestas as $respuesta) {
                if ($respuesta != "Java" && $respuesta != "JavaScript") {
                    return 0;
                }
            }
            return 1;  // Retorna 1 si todas las respuestas son válidas
        }
        
        $nombre = $_GET['nombreEnviado'] ?? null;
        $apellido = $_GET['apellidoEnviado'] ?? null;
        $respuesta1 = $_GET['prop'] ?? null;
        $respuesta2 = $_GET['lenguajes'] ?? [];  // Si 'lenguajes' no existe, asigna un array vacío
        
        // Inicializar la puntuación
        $puntuacion = 0;
        
        if ($respuesta1 == "true") {
            $puntuacion++;
        }
        
        // Sumar la puntuación del análisis de los lenguajes
        $puntuacion += verRespuesta($respuesta2);
        
        if ($nombre && $apellido && $respuesta1 !== null && !empty($respuesta2)) {
            // Mostrar los resultados
            echo "
        
                <h1>Resultados del Formulario</h1>
                <p><strong>Nombre:</strong> $nombre $apellido</p>
                <p><strong>Resultado de la Prueba:</strong> $puntuacion/2 correctas.</p>
                <a href='ejercicio1.php'>Formulario </a>";
        
         
        } 
        
        
        
        
        
        else {
            echo '
        
            <form action="" method="GET" class="form-container">
                <div class="form-group">
                    <label for="nombreEnviado"><b>Introduce tu Nombre:</b></label>
                    <input type="text" id="nombreEnviado" name="nombreEnviado" required />
                </div>
        
                <div class="form-group">
                    <label for="apellidoEnviado"><b>Introduce tu Apellido:</b></label>
                    <input type="text" id="apellidoEnviado" name="apellidoEnviado"  required />
                </div>
        
                <div>
                    <p><b>Pregunta 1. Marca la respuesta Correcta</b></p>
                    <label>
                        <input type="radio" name="prop" value="true" /> PHP es un lenguaje de "script" tipo servidor.
                    </label>
                    <label>
                        <input type="radio" name="prop" value="false" /> PHP es un lenguaje de "script" tipo cliente.
                    </label>
                    <label>
                        <input type="radio" name="prop" value="false" /> PHP es un lenguaje fuertemente tipado.
                    </label>
                    <label>
                        <input type="radio" name="prop" value="false" /> PHP es un lenguaje de marcas.
                    </label>
                </div>
        
                <div>
                    <p><b>Pregunta 2. Marca la respuesta o respuestas correctas</b> (+2)</p>
                    <label>
                        <input type="checkbox" name="lenguajes[]" value="Java" /> Java es un lenguaje servidor cliente
                    </label>
                    <label>
                        <input type="checkbox" name="lenguajes[]" value="Python" /> Python es un lenguaje servidor cliente
                    </label>
                    <label>
                        <input type="checkbox" name="lenguajes[]" value="JavaScript" /> JavaScript es un lenguaje servidor cliente
                    </label>
                    <label>
                        <input type="checkbox" name="lenguajes[]" value="C++" /> C++ es un lenguaje servidor cliente
                    </label>
                </div>
        
                <div class="form-actions">
                    <input type="submit" value="Enviar" />
                    <input type="reset" value="Borrar" />
                </div>
            </form>
        
        
        
        ';
        }
        ?>
        
    
        
    
    </main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

