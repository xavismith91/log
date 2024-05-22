<?php
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

        $sql = "SELECT nombre, correo, ususario, contrasena, token_recuperacion FROM usuarios";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Salida de datos por cada fila
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nombre"]. "</td>
                        <td>" . $row["correo"]. "</td>
                        <td>" . $row["usuario"]. "</td>
                        <td>" . $row["contraena"]. "</td>
                        <td>" . $row["token_recuperacion"]. "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
        }
        $conn->close();
        ?>