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

?>