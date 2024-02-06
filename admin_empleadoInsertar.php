<?php
session_start();
//incluimos la conexion con el servidor
include 'z_serv.php';
                   
//verifixamos si hay una sesion activo si no volver al index.php
if(isset($_SESSION['admin'])) {
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >

		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<script language="JavaScript" type="text/javascript"> 
		function checkDelete(){ 
		    return confirm('¿Estas seguro que quieres continuar?'); 
		} 
</script> 
		<title>uHomeStore</title>
    </head>
	<body>
		<!-- HEADER -->
		<?php include('headerAdmin.php');?>
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						
						<li><a href="admin_paquetes.php">Paquetes</a></li>
						<li><a href="admin_empleados.php">Empleados</a></li>
						<li><a href="admin_inmueblesTotales.php">Inmuebles</a></li>
						<li class="active"><a href="admin_empleadoInsertar.php">Registro Empleados</a></li>
						<li><a href="admin_inmueble.php">Registro Inmuebles</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<div class = "section" style="margin-left: 29px;">
		<h2>Empleados &raquo; Registro Empleados</h2>
		<hr />
		
		<?php
    
       
        //verificamos si el form contiene datos                        
		if(isset($_POST['save'])){
            	
				$campo1 = $_POST["campo1"];//nombre
				$campo2 = $_POST["campo2"];//apellido
                $campo3 = $_POST["campo3"];//correo
				$campo4 = $_POST["campo4"];//telefono
				$campo5 = $_POST["campo5"];//puesto
				$campo6 = $_POST["campo6"];//usuario
				$campo7 = $_POST["campo7"];//pw
				//insertamos la cuenta del empleado
                $al = "INSERT INTO `empleados` (
                `idempleados`, 
                `nombreE`, 
                `apellidoE`, 
                `correo`, 
                `telefono`, 
                `puesto`, 
                `img`, 
                `usuario`, 
                `pw`) VALUES (
                NULL, 
                '$campo1', 
                '$campo2', 
                '$campo3', 
                '$campo4', 
                '$campo5', 
                NULL,
                '$campo6',
            	'$campo7');";
             
				$insert = mysqli_query($conect, $al);
                //mostramos la verificacion del empleado
				if($insert){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos generales han sido guardados con éxito.</div>';		
				}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron guardar los datos generales.</div>';
                           
				}
				
			}
		?>
		<form class="form-horizontal" action="" method="post">
         
				<div class="form-group">
					<label class="col-sm-2 control-label">Nombre del empleado</label>
					<div class="col-sm-4">
						<input type="text" name="campo1" class="form-control" placeholder="Nombres" maxlength="35" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Apellidos</label>
					<div class="col-sm-4">
						<input type="text" name="campo2" class="form-control" placeholder="Apellido" maxlength="45" required>
					</div>
				</div>
				
               <div class="form-group">
					<label class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-3">
						<input type = "email" name="campo3" class="form-control" maxlength="40" placeholder="alguien@xd.a" required>
					</div>
               </div>
               
               <div class="form-group">
					<label class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-3">
						<input type = "number" name="campo4" class="form-control" placeholder="ejem: 3342342523" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;" required>
					</div>
               </div>
              
				<div class="form-group">
					<label class="col-sm-2 control-label">Puesto</label>
					<div class="col-sm-3">
						<select name="campo5" class="form-control" required>
							<option value="">- Selecciona puesto -</option>
                            <option value="empleado">Empleado</option>
							<option value="supervisor">Supervisor</option>
							<option value="oficinista">Oficinista</option>
							<option value="gerente">Gerente</option>
						</select> 
					</div>
                </div>

                <div class="form-group">
					<label class="col-sm-2 control-label">Usuario</label>
					<div class="col-sm-4">
						<input type="text" name="campo6" class="form-control" placeholder="usuario" maxlength="20" required>
					</div>
				</div>
                
                <div class="form-group">
					<label class="col-sm-2 control-label">Contraseña</label>
					<div class="col-sm-4">
						<input type="password" name="campo7" class="form-control" placeholder="*******" maxlength="15" required>
					</div>
				</div>
             
              
               



				
       <br><br>
   
       
        <div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="admin_empleados.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
    </div>
		<!-- Consultas -->

		<!-- FOOTER -->
		<?php include('footeradmin.php');?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

	</body>
    
</html>

<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>