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
        <?php include("../includes/menu2.php")?>



		
		<section>
		
            <?php include("../includes/navbbdd.php")?>

			<main>
            <div class="container">
                    <a href="index.php" class="link-inicio">Inicio - Ejercicios BBDD</a>
                </div>
                <div class="content" style="text-align:center; margin: 20px;">
                    <h1>LOGIN PARA USUARIOS REGISTRADOS</h1>
                </div>
                
              

                <?php

                    



                    $usuario = $_POST['usuario']??null;
                    $contraseña = $_POST['contraseña']??null;
                   

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
                            
                           
                            
                            <button type="submit">Conectar</button>
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
                        if (mysqli_num_rows($resultado) <= 0) {
                            
                            echo '<p>Usuario no registrado en la base de datos. Registrese <a href ="register.php" >aquí</a>.   </p>';
                        } 
                        else 
                        {
                            $row = mysqli_fetch_assoc($resultado);
                            $usuariobbdd = $row['nombre'];
                            $contraseñabbdd = $row['clave'];

                            //comprobar si coincide la contraseña
                            if(password_verify($contraseña,$contraseñabbdd))
                            {
                                // Iniciar la sesión
                                session_start();
                                $_SESSION['usuario'] = $usuario;
                              
                                echo '<p>Bienvenido/a, '.$usuario.'.Ahora puedes navegar por los distintos ejercicios de la sección.</p>';
                            }

                            else
                            {
                                echo '<p>Contraseña incorrecta. Vuelve a  <a href ="login.php" >introducir</a> tus datos.   </p>';
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

