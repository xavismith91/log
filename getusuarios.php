<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Vista Usuario</title>
</head>

<body>
<!-- 
    <h1>Usuarios</h1> -->
    <table>
        <tr>
            <th>nombre</th>
            <th>correo</th>
            <th>usuario</th>
            <th>contrasena</th>
            <th>token_recuperacion</th>
        </tr>
        
        <?php

session_start();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sistema";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Salida de datos por cada fila
            while($row = $result->fetch_assoc()) {
                echo "<br>";

                echo "<tr>
                        <td>" . $row["nombre"]. "</td>
                        <td>" . $row["correo"]. "</td>
                        <td>" . $row["usuario"]. "</td>
                        <td>" . $row["contrasena"]. "</td>
                        <td>" . $row["token_recuperacion"]. "</td>
                        <br>
                      </tr>";
                
               
            }
            
        } else {
            echo "<tr><td colspan='5'>No se encontraron resultados</td></tr>";
        }
        $conn->close();
        session_abort();
        ?> 
    </table>




    <a href="login.html">Cerrar sesión</a>
    </body>

    </html>