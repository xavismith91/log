<?php

// Iniciar sesión
session_start();


// Conectarse a la base de datos
$db = new mysqli('localhost', 'root', '', 'sistema');

// Validar si la conexión fue exitosa
if ($db->connect_error) {
    die('Error de conexión: ' . $db->connect_error);
}

// Obtener el correo electrónico del formulario
$correo = $_POST['correo'];

// Consulta SQL para verificar si el correo electrónico existe en la base de datos
$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resultado = $db->query($sql);

// Validar si la consulta encontró un registro
if ($resultado->num_rows > 0) {
    // Generar un token de recuperación aleatorio
    $token = bin2hex(random_bytes(16));

    // Actualizar la base de datos con el token de recuperación
    $sql_update = "UPDATE usuarios SET token_recuperacion = '$token' WHERE correo = '$correo'";
    $resultado_update = $db->query($sql_update);

    if ($resultado_update) {
        // Enviar correo electrónico con el enlace de recuperación
        $enlace_recuperacion = "http://localhost/recuperar_contra.php?token=$token"; 
        $asunto = "Recuperar contraseña para su cuenta";
        $mensaje = "Hola, para recuperar la contraseña de su cuenta, haga clic en el siguiente enlace: $enlace_recuperacion";

        // Usar una función o librería para enviar el correo electrónico
        // (por ejemplo, PHPMailer)

        echo 'Se ha enviado un correo electrónico con las instrucciones para recuperar su contraseña.';
    } else {
        echo 'Error al actualizar el token de recuperación.';
    }
} else {
    echo 'El correo electrónico ingresado no está asociado a ninguna cuenta.';
}

// Cerrar la conexión a la base de datos
$db->close();

?>
