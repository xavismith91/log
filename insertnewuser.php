<?php
//declaramos las variables 
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario= $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $reconstrasena = $_POST['recontrasena'];
    //con esta asignacion se encriptará la contraseña 
    // $hash = password_hash($contrasena, PASSWORD_BCRYPT);
//declaramos variables para la conexion a la base de datos

$servername = "localhost"; 
$database = "sistema";
$username = "root";
$password = "";


// creamos  el query para conexion de la base de datos 

$conn = mysqli_connect($servername, $username, $password, $database);

// revisamos la conexión

if(!$conn)
{
    die("Falló la conexion: ". mysqli_connect_error()); 
}else
echo "Conexion exitosa";


//hacemos el query para insertar registros 

$sql = "INSERT INTO usuarios (nombre,correo,usuario,contrasena,recontrasena) VALUES ('$nombre','$correo','$usuario','$contrasena','$recontrasena')";

if (mysqli_query($conn,$sql)){
     
     header("location:login.html");
}
else
{
   echo'<script type="text/javascript">
        alert("No se pudo completar el registro");
        window.location.href="register.php";
        </script>';
}
mysqli_close($conn);
?>
