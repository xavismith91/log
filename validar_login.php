<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

   
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
    $_SESSION['usuario'] = $usuario;
    header('Location: getusuarios.php');
} else {

    echo '<script>Swal.fire({
        position: "top-center",
        icon: "error",
        title: "verifica tu usuario y contraseña e intentalo de nuevo",
        showConfirmButton: false,
        timer: 3500
      })</script>';
    
    // echo'<script type="text/javascript">
    // alert("Información errónea, verifiquela e intente de nuevo");
    // window.location.href="login.html";
    // </script>';
    // echo '<center><a href="login.html" class="text-dark">Regresar</a></center>';
    // echo '<script>'
    
}


// Cerrar la conexión a la base de datos
$db->close();

?>

</body>

</html>