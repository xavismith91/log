<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/all.min.css" rel="stylesheet">
	<link href="css/datatables.min.css" rel="stylesheet">
    <title>Vista Usuario</title>
</head>

<body>
<a href="register.html" class="btn btn-primary my-4">Nuevo Registro</a>
<a href="login.html" class="btn btn-danger my-4">Cerrar sesión</a>
<div class="table-responsive-mf">
			<table class="display table table-bordered" id="mitabla">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Usuario</th>
						<th>Contraseña</th>
                        <th>token_recuperación</th>
						<!-- <th width="5%"></th>
						<th width="5%"></th> -->
					</tr>
				</thead>

				<tbody>



                <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Eliminar Registro</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					¿Desea eliminar el registro?
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<a class="btn btn-danger btn-ok">Eliminar</a>
				</div>

			</div>
		</div>
	</div>

    <!-- <script>
		$(document).ready(function() {
			$('#mitabla').DataTable({
				"order": [
					[0, "asc"]
				],
				"language": {
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
					"infoEmpty": "No hay registros disponibles",
					"infoFiltered": "(filtrada de _MAX_ registros)",
					"loadingRecords": "Cargando...",
					"processing": "Procesando...",
					"search": "Buscar:",
					"zeroRecords": "No se encontraron registros coincidentes",
					"paginate": {
						"next": "Siguiente",
						"previous": "Anterior"
					},
				},
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "server_process.php"
			});
		});

		let eliminaModal = document.getElementById('eliminaModal')
		eliminaModal.addEventListener('shown.bs.modal', event => {
			let button = event.relatedTarget
			let url = button.getAttribute('data-bs-href')
			eliminaModal.querySelector('.modal-footer .btn-ok').href = url
		})
	</script> -->

                <script src="js/bootstrap.bundle.min.js"></script>
	            <script src="js/jquery.min.js"></script>
	            <script src="js/datatables.min.js"></script>


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
				</tbody>
			</table>
		</div>
        
       
    </table>




    
  
    

    </body>

    </html>