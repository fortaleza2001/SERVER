<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>

        <style>
        /* Estilo general para el formulario */
        form {
            display: flex;
            flex-direction: column;
            width: 100%; /* Ajusta el ancho según sea necesario */
            justify-content: center;
            align-items: center;
        }

        /* Contenedor para cada grupo de label e input */
        .form-group {
            display: flex;
            
            margin-bottom: 10px;
        }

        /* Ajuste para que los inputs queden alineados */
        label {
            margin-right: 10px;
            width: 250px; /* Ajusta el ancho para que los labels tengan el mismo tamaño */
        }

        input {
            width: 120px;
        }
    </style>
	</head>
	<body>
		<?php include("../includes/header2.php")?>
        <?php include("../includes/menu.php")?>



		
		<section>
		
            <?php include("../includes/navbbdd.php")?>

			<main>
            <div class="container">
                    <a href="http://localhost/3.3/sitio_esqueleto/basicos/" class="link-inicio">Inicio - Ejercicios BBDD</a>
                </div>
                <div class="content" style="text-align:center; margin: 20px;">
                    <h1>FORMULARIO DE REGISTRO EN BASE DE DATOS</h1>
                </div>
                
              

                <?php
                    $usuario = $_POST['usuario']??null;
                    $contraseña = $_POST['contraseña']??null;
                    $contraseña2 = $_POST['contraseña2']??null;

                    if($usuario==null)
                    {
                        echo '
                        <form action="" method="POST" ">
                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <input type="text" name="usuario" id="usuario" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="contraseña">Contraseña:</label>
                                <input type="password" name="contraseña" id="contraseña" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="contraseña2">Vuelva a introducir la contraseña:</label>
                                <input type="password" name="contraseña2" id="contraseña2" required>
                            </div>
                            
                            <button type="submit">Registrar</button>
                        </form>

                      
                    ';
                    }
                    else
                    {
                      
                        include("./conexion_bbdd.php");




                        //verificar usuario
                        $sql = 'SELECT * FROM usuarios WHERE nombre = ?';

                        // Prepara la consulta
                        $stmt = mysqli_prepare($conexion, $sql);

                        // Asigna el valor del parámetro
                        mysqli_stmt_bind_param($stmt, 's', $usuario);

                        // Ejecuta la consulta
                        mysqli_stmt_execute($stmt);

                        // Obtiene el resultado
                        $resultado = mysqli_stmt_get_result($stmt);

                        // Comprueba si existe al menos una fila
                        if (mysqli_num_rows($resultado) > 0) {
                            
                            echo '<p>El usuario '.$usuario.' ya está registrado en la base de datos.Puede identificarse <a href ="" >aquí</a>.   </p>';
                        } 
                        else 
                        {
                           //comprobar contraseñas campos
                           if($contraseña!=$contraseña2)
                           {
                             echo '<p>Los campos de contraseña y repetir contraseña  no coinciden.Vuelva a introducir los datos en <a href ="" >aquí</a>.  </p>';
                           }
                           else
                           {
                               // Encripta la contraseña
                                $clave_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

                                if(password_verify($contraseña,$clave_encriptada))
                                {
                                    // Define la consulta SQL
                                $sql = "INSERT INTO usuarios (nombre, clave) VALUES (?, ?)";

                                // Prepara la consulta
                                $stmt2 = mysqli_prepare($conexion, $sql);

                                // Asigna los valores de los parámetros
                                mysqli_stmt_bind_param($stmt2, 'ss', $usuario, $clave_encriptada);

                                // Ejecuta la consulta
                                if (mysqli_stmt_execute($stmt2)) 
                                {
                                    echo '<p>Usuario '.$usuario.' insertado con exito.Ahora puede  <a href ="" >identificarse</a> para visualizar los ejercicios de esta seccion. </p>';
                                } 
                                else 
                                {
                                    echo '<p>Error en el registro: Intentelo de nuevo <a href ="" >aquí</a> </p>';
                                }

                                // Cierra la consulta
                                mysqli_stmt_close($stmt2);
                                }
                                

                           }
                        }





                    }




                ?>
				
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>

