<?php
session_start();
include 'z_serv.php';
$v5 = $_GET['var2'];

//<------------Casas---------->//         
$all = "SELECT * FROM inmobilaria WHERE idinmobiliaria = '$v5'";
$eje = mysqli_query($conect, $all);
$listaT = mysqli_fetch_array($eje);
//<---------detalles---------->//
//obtenemos los datos de la tabla relacionada
$v6=$listaT['detalles_iddetalles'];
$log2 ="SELECT * FROM inmobilaria inner join detalles on inmobilaria.detalles_iddetalles=detalles.iddetalles
WHERE iddetalles = '$v6'";	
$filas2= mysqli_query($conect,$log2);
$listaT2 = mysqli_fetch_array($filas2);
unset($_GET['var2']);
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
						<li class="active"><a href="#">Registro Inmuebles</a></li>
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
    
       
        //vericamos los datos del formulario        
		if(isset($_POST['save'])){

			    $nombreImg=$_FILES['img']['name'];
			    $ruta=$_FILES['img']['tmp_name'];
			    $destino="img/".$nombreImg;
                if(copy($ruta,$destino) && !empty($ruta)){


                $v6=$listaT['detalles_iddetalles'];
                //recuperamos variables
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
            	//modificamos datos en la tabla detalles en dado caso
                $sql0="UPDATE detalles SET 
                terrenom2='$medidas',
                habitantes='$habi',
                banos='$ban',
                estacionamiento='$det1',
                cuarto_servicio='$det2',
                orientacion='$det3',
                niveles='$det4',
                conservacion='$det5',
                edadpropiedad='$edad',
                mantenimiento='$det6' WHERE iddetalles='$v6' ";

                $ejecut=mysqli_query($conect, $sql0); 
            
                if($ejecut){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Detalles guardados correctamente.</div>';		
				}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. Los detalles no se guardaron correctamente.</div>';          
				}
            
                $idDet = "SELECT iddetalles FROM detalles ORDER BY iddetalles DESC LIMIT 1;";
                $extraer = mysqli_query($conect, $idDet);
                while($fila = mysqli_fetch_array($extraer)){
                    $var = $fila['iddetalles'];
                }
            	//recuperamos variables
				$nombres = $_POST["nombres"];
				$descripcion = $_POST["desc"];
                $precio = $_POST["precio"];
				$direccion = $_POST["direccion"];
				$et11 = $_POST["et1"];
				$et22 = $_POST["et2"]; 
                $et33 = $_POST["et3"]; 
                $et44 = $_POST["et4"]; 
                $et55 = $_POST["et5"]; 
                $comen = $_POST["comen"];
        	    
        	    
                //modificamos contenido de la tabla inmobilaria
                $sql1="UPDATE inmobilaria SET 
                nombreIn='$nombres',
                descripcionIn='$descripcion',
                precioIn='$precio',
                direccionIn='$direccion',
                etiqueta1='$et11',
                etiqueta2='$et22',
                etiqueta3='$et33',
                etiqueta4='$et44',
                etiqueta5='$et55',
                imgIn	 ='$nombreImg',
                destino  ='$destino',
                comentarios='$comen' WHERE idinmobiliaria = '$v5'";
             	
             	$ejecut2=mysqli_query($conect, $sql1);
                    
				if($ejecut2){
				unset($_POST['save']);
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido Modificados con éxito.</div>';		
				}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron Modificar los datos.</div>';
                           
				}
				}else{
			        echo '<script type="text/javascript"> alert("Agregue una imagen con un nombre sin tantos caracteres eje: casa1.jpg"); window.location="z_Modificar_admin_inmueble.php";</script>';
			    }
				
			}
		?>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
         
				<div class="form-group">
					<label class="col-sm-2 control-label">Nombre de la casa</label>
					<div class="col-sm-4">
						<input type="text" name="nombres" maxlength="40" class="form-control" placeholder="Nombres" value="<?php echo ''.$listaT['nombreIn']. ''; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-4">
						<input type="text" name="desc"  maxlength="200" class="form-control" placeholder="Descripción" value="<?php echo ''.$listaT['descripcionIn']. ''; ?>" required>
					</div>
				</div>
				
               <div class="form-group">
					<label class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-3">
						<input type = "number" name="precio" class="form-control" onKeyDown="if(this.value.length==15 && event.keyCode!=8) return false;" placeholder="Precio" value="<?php echo ''.$listaT['precioIn']. ''; ?>" required>
					</div>
               </div>
               
               <div class="form-group">
					<label class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-3">
						<input type = "text" name="direccion" maxlength="200" class="form-control" placeholder="Dirección" value="<?php echo ''.$listaT['direccionIn']. ''; ?>" required>
					</div>
               </div>
              
				<div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 1</label>
					<div class="col-sm-3">
						<select name="et1" class="form-control" required>
							<option value="<?php echo ''.$listaT['etiqueta1']. ''; ?>"><?php echo ''.$listaT['etiqueta1']. ''; ?></option>
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
							<option value="<?php echo ''.$listaT['etiqueta2']. ''; ?>"><?php echo ''.$listaT['etiqueta2']. ''; ?></option>
                            <option value="Renta">Renta</option>
							<option value="Compra">Compra</option>
						</select> 
					</div>
                </div>
                
                <div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 3</label>
					<div class="col-sm-3">
						<select name="et3" class="form-control" required>
							<option value="<?php echo ''.$listaT['etiqueta3']. ''; ?>"><?php echo ''.$listaT['etiqueta3']. ''; ?></option>
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
							<option value="<?php echo ''.$listaT['etiqueta4']. ''; ?>"><?php echo ''.$listaT['etiqueta4']. ''; ?></option>
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
							<option value="<?php echo ''.$listaT['etiqueta5']. ''; ?>"><?php echo ''.$listaT['etiqueta5']. ''; ?></option>
                            <option value="Nuevo" >Nuevo</option>
							<option value="Usado" >Usado</option>
							<option value="Personalizado">Personalizado</option>
						</select> 
					</div>
                </div>


                <div class="form-group">
					<label class="col-sm-2 control-label">Comentarios</label>
					<div class="col-sm-4">
						<input type="text" name = "comen" class="form-control" maxlength="200"  placeholder="Cometarios" value="<?php echo ''.$listaT['comentarios']. ''; ?>"  required>
					</div>
				</div>


               <div class="form-group">
					<label class="col-sm-2 control-label">Empleado</label>
					<div class="col-sm-3">
						<select name="id" class="form-control" required>
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
						<input type="text" name = "medi" class="form-control" placeholder="y x y" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" value="<?php echo ''.$listaT2['terrenom2']. ''; ?>" required>
					</div>
				</div>
       <div class="form-group">
					<label class="col-sm-2 control-label">Habitantes</label>
					<div class="col-sm-4">
						<input type="text" name = "hab" class="form-control" placeholder="0" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" value="<?php echo ''.$listaT2['habitantes']. ''; ?>"required>
					</div>
				</div>
       <div class="form-group">
					<label class="col-sm-2 control-label">Baños</label>
					<div class="col-sm-4">
						<input type="text" name = "banos" class="form-control" placeholder="0" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;"  value="<?php echo ''.$listaT2['banos']. ''; ?>" required>
					</div>
				</div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Estacionamiento</label>
					<div class="col-sm-3">
						<select name="det1" class="form-control" required>
							<option value="<?php echo ''.$listaT2['estacionamiento']. ''; ?>"><?php echo ''.$listaT2['estacionamiento']. ''; ?></option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
							
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Cuarto-Servicio</label>
					<div class="col-sm-3">
						<select name="det2" class="form-control" required>
							<option value="<?php echo ''.$listaT2['cuarto_servicio']. ''; ?>"><?php echo ''.$listaT2['cuarto_servicio']. ''; ?></option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Orientación</label>
					<div class="col-sm-3">
						<select name="det3" class="form-control" required>
							<option value="<?php echo ''.$listaT2['orientacion']. ''; ?>"><?php echo ''.$listaT2['orientacion']. ''; ?></option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Niveles</label>
					<div class="col-sm-3">
						<select name="det4" class="form-control" required>
							<option value="<?php echo ''.$listaT2['niveles']. ''; ?>"><?php echo ''.$listaT2['niveles']. ''; ?></option>
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
						<select name="det5" class="form-control" required>
							<option value="<?php echo ''.$listaT2['conservacion']. ''; ?>"><?php echo ''.$listaT2['conservacion']. ''; ?></option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Edad de la propiedad</label>
					<div class="col-sm-4">
						<input type="text" name = "ed" class="form-control" placeholder="0" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;"  value="<?php echo ''.$listaT2['edadpropiedad']. ''; ?>"required>
					</div>
				</div>                                             
        <div class="form-group">
					<label class="col-sm-2 control-label">Mantenimiento</label>
					<div class="col-sm-3">
						<select name="det6" class="form-control" required>
							<option value="<?php echo ''.$listaT2['mantenimiento']. ''; ?>"><?php echo ''.$listaT2['mantenimiento']. ''; ?></option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
						</select> 
					</div>
                </div> 
       
        <div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="admin_inmueblesTotales.php" class="btn btn-sm btn-danger">Cancelar</a>
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