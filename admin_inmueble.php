<?php
session_start();
//conectamos servidor
include 'z_serv.php';
                   
//verificamos sesion
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
						<li><a href="admin_empleadoInsertar.php">Registro Empleados</a></li>
						<li class="active"><a href="admin_inmueble.php">Registro Inmuebles</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<div class = "section" style="margin-left: 29px;">
		<h2>Casas &raquo; Enviar solicitud de registro</h2>
		<hr />
		
		<?php
    
       
        //verificamos el ingreso de datos             
		if(isset($_POST['save'])){

				$nombreImg=$_FILES['img']['name'];
			    $ruta=$_FILES['img']['tmp_name'];
			    $destino="img/".$nombreImg;
			    if(copy($ruta,$destino) && !empty($ruta)){

            	//obtenemos variables
                $medidas = $_POST["medi"];
                $habi = $_POST["hab"];
                $ban = $_POST["banos"];
                $det1 = $_POST["det1"];
                $det2 = $_POST["det2"];
                $det3 = $_POST["det3"];
                $det4 = $_POST["det4"];
                $det5 = $_POST["det5"];
                $edad = $_POST["ed"];
                $det6 = $_POST["det6"];
            
            	//insertamos datos en la tabla detalles
                $ingreso = "INSERT INTO `detalles` (`iddetalles`, `terrenom2`, `habitantes`, `banos`, `estacionamiento`, `cuarto_servicio`, `orientacion`, `niveles`, `conservacion`, `edadpropiedad`, `mantenimiento`) VALUES (NULL, '$medidas', '$habi', '$ban', '$det1', '$det2', '$det3', '$det4', '$det5', '$edad', '$det6');"; 
            
                $insertD = mysqli_query($conect, $ingreso);
            
                if($insertD){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Detalles guardados correctamente.</div>';		
				}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. Los detalles no se guardaron correctamente.</div>';          
				}
            
                $idDet = "SELECT iddetalles FROM detalles ORDER BY iddetalles DESC LIMIT 1;";
                $extraer = mysqli_query($conect, $idDet);
                while($fila = mysqli_fetch_array($extraer)){
                    $var = $fila['iddetalles'];
                }
            	//recuperamos variuables de otra tabla

				$nombres = $_POST["nombres"];
				$descripcion = $_POST["desc"];
                $precio = $_POST["precio"];
				$direccion = $_POST["direccion"];
				$et11 = $_POST["et1"];
				$et22 = $_POST["et2"]; 
                $et33 = $_POST["et3"]; 
                $et44 = $_POST["et4"]; 
                $et55 = $_POST["et5"]; 
                $id   = $_POST["id"];

            	

				//insertamos datos en la tabla inmobilaria
                $al = "INSERT INTO `inmobilaria` (`idinmobiliaria`, `nombreIn`, `descripcionIn`, `precioIn`, `direccionIn`, `etiqueta1`, `etiqueta2`, `etiqueta3`, `etiqueta4`, `etiqueta5`, `imgIn`,`destino`, `detalles_iddetalles`, `empleados_idempleados`, `clientes_idclientes`, `status`, `comentarios`) VALUES (NULL, '$nombres', '$descripcion', '$precio', '$direccion', '$et11', '$et22', '$et33', '$et44', '$et55', '$nombreImg','$destino', '$var', '$id', '1', 'ACEPTADO', '...');";

				$insert = mysqli_query($conect, $al);
                    
				if($insert){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos generales han sido guardados con éxito.</div>';		
				}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron guardar los datos generales.</div>';
                           
				}
			        

			    }else{
			        echo '<script type="text/javascript"> alert("Agregue una imagen con un nombre sin tantos caracteres eje: casa1.jpg"); window.location="admin_inmueble.php";</script>';
			    }


				
				
			}
		?>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
         
				<div class="form-group">
					<label class="col-sm-2 control-label">Nombre de la casa</label>
					<div class="col-sm-4">
						<input type="text" name="nombres" class="form-control" placeholder="Nombres" maxlength="40" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-4">
						<input type="text" name="desc" class="form-control" placeholder="Descripción" maxlength="200" required>
					</div>
				</div>
				
               <div class="form-group">
					<label class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-3">
						<input type = "text" name="precio" class="form-control" onKeyDown="if(this.value.length==15 && event.keyCode!=8) return false;" placeholder="Precio" required>
					</div>
               </div>
               
               <div class="form-group">
					<label class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-3">
						<input type = "text" name="direccion" class="form-control" placeholder="Dirección" maxlength="200" required>
					</div>
               </div>
              
				<div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 1</label>
					<div class="col-sm-3">
						<select name="et1" class="form-control" required>
							<option value="">- Selecciona estado -</option>
                            <option value="Departamento">Departamento</option>
							<option value="Casa">Casa</option>
							<option value="Edificio">Edificio</option>
							<option value="De lujo">De lujo</option>
							<option value="Rurales">Rurales</option>
						</select> 
					</div>
                </div>
                
                <div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 2</label>
					<div class="col-sm-3">
						<select name="et2" class="form-control" required>
							<option value="">- Selecciona estado -</option>
                            <option value="Renta">Renta</option>
							<option value="Compra">Compra</option>
						</select> 
					</div>
                </div>
                
                <div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 3</label>
					<div class="col-sm-3">
						<select name="et3" class="form-control" required>
							<option value="">- Selecciona estado -</option>
                            <option value="Amueblado" >Amueblado</option>
							<option value="Sin amueblar" >Sin amueblar</option>
							<option value="Con piscina" >Con piscina</option>
							<option value="Full" >Full</option>
						</select> 
					</div>
                </div>
                <div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 4</label>
					<div class="col-sm-3">
						<select name="et4" class="form-control" required>
							<option value="">- Selecciona estado -</option>
                            <option value="Vista-Rural" >Vista-Rural</option>
							<option value="Vista-Urbana" >Vista-Urbana</option>
							<option value="Vista-Limitada" >Vista-Limitada</option>
						</select> 
					</div>
                </div>
                <div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 5</label>
					<div class="col-sm-3">
						<select name="et5" class="form-control" required>
							<option value="">- Selecciona estado -</option>
                            <option value="Nuevo" >Nuevo</option>
							<option value="Usado" >Usado</option>
							<option value="Personalizado">Personalizado</option>
						</select> 
					</div>
                </div>


               <div class="form-group">
					<label class="col-sm-2 control-label">Empleado</label>
					<div class="col-sm-3">
						<select name="id" class="form-control" required>
							<option value="">- Selecciona empleado -</option>
							<?php
							 $all = "SELECT * FROM empleados";
						     $eje = mysqli_query($conect, $all);
						     $listaT = mysqli_fetch_array($eje);
							 for($k=0; $k<$listaT; $k++){
							 ?>

                            <option value="<?php  echo''.$listaT["idempleados"].''?>" ><?php  echo''.$listaT["nombreE"].''?></option>

							<?php
							$listaT = mysqli_fetch_array($eje);
							} ?>
							
						</select> 
					</div>
                </div>  

               <div class="form-group">
					<label class="col-sm-2 control-label">Imagen</label>
					<div class="col-sm-3">
						<input type="file" name="img" accept="image/*" required>
					</div>
               </div>

				
       <br><br>
    <h2>Casas &raquo; Ingrese los detalles</h2>
		<hr />
        <div class="form-group">
					<label class="col-sm-2 control-label">Medidas</label>
					<div class="col-sm-4">
						<input type="text" name = "medi" class="form-control" placeholder="y x y" onKeyDown="if(this.value.length==5 && event.keyCode!=8) return false;" required>
					</div>
				</div>
       <div class="form-group">
					<label class="col-sm-2 control-label">Número de habitantes</label>
					<div class="col-sm-4">
						<input type="number" name = "hab" class="form-control" placeholder="0" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" required>
					</div>
				</div>
       <div class="form-group">
					<label class="col-sm-2 control-label">Número de baños</label>
					<div class="col-sm-4">
						<input type="text" name = "banos" class="form-control" placeholder="0" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" required>
					</div>
				</div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Estacionamiento</label>
					<div class="col-sm-3">
						<select name="det1" class="form-control" required>
							<option value="">- Selecciona -</option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
							
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Cuarto-Servicio</label>
					<div class="col-sm-3">
						<select name="det2" class="form-control" required>
							<option value="">- Selecciona -</option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Orientación</label>
					<div class="col-sm-3">
						<select name="det3" class="form-control" required>
							<option value="">- Selecciona -</option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Niveles</label>
					<div class="col-sm-3">
						<select name="det4" class="form-control" required>
							<option value="">- Selecciona -</option>
                            <option value="1" >1</option>
							<option value="2" >2</option>
							<option value="3" >3</option>
							<option value="4" >4</option>
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Conservación</label>
					<div class="col-sm-3">
						<select name="det5" class="form-control">
							<option value="">- Selecciona -</option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Edad de la propiedad en años</label>
					<div class="col-sm-4">
						<input type="number" name = "ed" class="form-control" placeholder="12" onKeyDown="if(this.value.length==5 && event.keyCode!=8) return false;" required>
					</div>
				</div>                                             
        <div class="form-group">
					<label class="col-sm-2 control-label">Mantenimiento</label>
					<div class="col-sm-3">
						<select name="det6" class="form-control" required>
							<option value="">- Selecciona estado -</option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
						</select> 
					</div>
                </div> 
       
        <div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="empleado.php" class="btn btn-sm btn-danger">Cancelar</a>
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