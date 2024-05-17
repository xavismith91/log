<?php

// inisiamos sesión
session_start();

//deckaramos las variables para el uso de inicio de sesion

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

//declaramos variables para la conexión a la  base de datos

$servername = "localhost"; 
$database = "sistema";
$username = "root";
$password = "";

//creamos el qwerty para la conexxión 

$conn = mysqli_connect($servername, $username, $password, $database);


// revisamos la conexión

if(!$conn)
{
    die("Falló la conexion: ". mysqli_connect_error()); 
}else
echo "Conexion exitosa";


//iniciamos la validadcion de los datos mediante un query

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = $db->query($sql);

// Validar si la consulta encontró un registro
if ($resultado->num_rows > 0) {
    // Inicio de sesión exitoso
    $_SESSION['usuario'] = $usuario;
    echo '<script>alert("Sesión Iniciada");</script>';
    header('Location:index.html');
} else {
    // Inicio de sesión fallido
    echo '<script>alert("Error, verifique su información");</script>'; 
}














>