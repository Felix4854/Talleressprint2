<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){
     header("Location: login.php");
	
	}
    ?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="../package/dist/sweetalert2.css">
    
</head>

<body id="page-top">
    <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Agregar un nuevo usuario</h3>
                    <button type="button" class="btn btn-black" data-dismiss="modal">
					<i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">

             <form  action="registros.php" method="POST" onsubmit="return confirmDesactiv()">
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="No se puede repetir con alguno de la lista...">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                  <label for="rol" class="form-label">Rol de usuario:</label>
                                  <select name="rol" id="rol" class="form-control" required>
                                
                                  <option value="0">--Selecciona una opcion--</option>
                            <?php

                            include("db.php");
                            //Codigo para mostrar categorias desde otra tabla
                            $sql = "SELECT * FROM roles ";
                            $resultado = mysqli_query($conexion, $sql);
                            while ($consulta = mysqli_fetch_array($resultado)) {
                                echo '<option value="' . $consulta['id'] . '">' . $consulta['rol'] . '</option>';
                            }

                            ?>



                               </select>
                            </div>
                      <br>

                                <div class="mb-3">
                                    
                               <input type="submit" value="Guardar" id="register" class="btn btn-success" 
                               name="registrar">
                               <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    


<script src="../package/dist/sweetalert2.all.js"></script>
<script src="../package/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


			var nombre 	= $('#nombre').val();
			var correo 		= $('#correo').val();
			var password 	= $('#password').val();
			var rol	= $('#rol').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: '../includes/_sesion/validar.php',
					data: {nombre: nombre,correo: correo, password: password, rol: rol},
					success: function(data){
					Swal.fire({
								'title': '¡Mensaje!',
								'text': data,
                                'icon': 'success',
                                'showConfirmButton': 'false',
                                'timer': '1500'
								}).then(function() {
                window.location = "usuarios.php";
            });
							
					} ,
                    
					error: function(data){
						Swal.fire({
								'title': 'Error',
								'text': data,
								'icon': 'error'
								})
					}
				});

				
			}else{
				
			}

			



		});		

		
	});
    
	
</script>
<script type="text/javascript">
    function confirmDesactiv()
{
   return confirm("Esta seguro de la creación del nuevo usuario?")
}
</script>
</body>
</html>