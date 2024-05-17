<?php

// Iniciar sesión
session_start();

// Conectarse a la base de datos
$db = new mysqli('localhost', 'root', '', 'sistema');

// Validar si la conexión fue exitosa
if ($db->connect_error) {
    die('Error de conexión: ' . $db->connect_error);
}

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta SQL para verificar el usuario y la contraseña
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = $db->query($sql);

// Validar si la consulta encontró un registro
if ($resultado->num_rows > 0) {
    // Inicio de sesión exitoso
    $_SESSION['usuario'] = $usuario;
    header('Location: index.html');
} else {
    // Inicio de sesión fallido
    echo 'Usuario o contraseña incorrectos.';
}

// Cerrar la conexión a la base de datos
$db->close();

?>