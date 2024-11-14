<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include("../includes/metadata2.php")?>
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
                    <h1>TABLA DE USUARIOS</h1>
                </div>

                <?php
                    // Conexión a la base de datos (modifica los valores según tu configuración)
                    $host = "localhost"; 
                    $username = "jardinero";
                    $password = "jardinero";
                    $database = "jardineria";
                    $port = 3306; 

                    $conexion = mysqli_connect($host, $username, $password, $database, $port);

                    // Verificar la conexión
                    if (!$conexion) {
                        die("Conexión fallida: " . mysqli_connect_error());
                    }

                    // Crea la tabla "usuarios"
                    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
                        nombre VARCHAR(50) NOT NULL,
                        clave VARCHAR(255) NOT NULL,
                        PRIMARY KEY (nombre)
                    ) ENGINE=InnoDB;";

                    // Ejecuta la consulta para crear la tabla
                    if ($conexion->query($sql) === TRUE) {
                        echo "<p>Tabla 'usuarios' creada correctamente.</p>";
                    } else {
                        echo "<p>Error al crear la tabla: " . $conexion->error . "</p>";
                    }

                    // Array asociativo de usuarios con sus contraseñas
                    $usuarios = array(
                        "jardinero" => "jardinero",
                        "cristina" => "cristina",
                        "enrique" => "enrique",
                        "marta" => "marta"
                    );

                    // Insertar usuarios con contraseñas encriptadas
                    foreach ($usuarios as $nombre => $clave) {
                        // Encripta la contraseña
                        $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);

                        if(password_verify($clave,$clave_encriptada))
                        {
                            echo'<p>'.$nombre.': '.$clave.': '.$clave_encriptada.'</p>';
                            // Prepara la consulta de inserción
                        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, clave) VALUES (?, ?)");
                        $stmt->bind_param("ss", $nombre, $clave_encriptada); // "ss" indica dos parámetros de tipo string

                        // Ejecuta la inserción
                        if ($stmt->execute()) {
                            echo "<p>El Usuario '$nombre' insertado con éxito.</p>";
                        } else {
                            echo "<p>Error al insertar el usuario '$nombre': " . $stmt->error . "</p>";
                        }

                        // Cierra la sentencia preparada
                        $stmt->close();
                        }
                        
                    }

                    // Cierra la conexión a la base de datos
                    $conexion->close();
                ?>
			</main>
			<?php include("../includes/aside2.php")?>
		</section>
		<?php include("../includes/footer2.php")?>
	</body>
</html>
