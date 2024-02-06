<?php
session_start();
//conectamos servidor
include 'z_serv.php';
//sentencia para comprobar si el cliente es subscriptor               
$log ="SELECT * FROM subscriptor inner join clientes on subscriptor.idclientes=clientes.idclientes
WHERE usuario= '".$_SESSION['usuario2']."'";	
$filas= mysqli_query($conect,$log);
$listaT1 = mysqli_fetch_array($filas);
//seleccionamos datos del cliente
$log2 ="SELECT * FROM clientes WHERE nombre = '".$_SESSION['nombre']."'";	
$filas2= mysqli_query($conect,$log2);
$listaTT = mysqli_fetch_array($filas2);
$idclin=$listaTT['idclientes'];
//asignamos comprobacion
if (mysqli_num_rows($filas)>0) {
         $subscriptor=true;               	
}
//en de no
if(isset($_SESSION['usuario2']) && $subscriptor==true) {
?>
<?php 
//verificamos si puede o no publicar casas
$idPa=$listaTT['idpaquetes'];
$all5 = "SELECT * FROM clientes inner join paquetes on clientes.idpaquetes=paquetes.idpaquetes WHERE  clientes.idpaquetes= '$idPa'";	
$filas5= mysqli_query($conect,$all5);
$listaT3 = mysqli_fetch_array($filas5);
//casas del sub
$log6 ="SELECT * FROM inmobilaria WHERE clientes_idclientes = '$idclin'";	
$filas6= mysqli_query($conect,$log6);
$listaT6 = mysqli_fetch_array($filas6);
$contador=0;
for($h=0; $h<$listaT6; $h++){
	$contador++;
	$listaT6 = mysqli_fetch_array($filas6);
}

if($contador>=$listaT3['casasP']){
	echo '<script> alert("Ha alcanzado el número máximo de casas a publicar porfavor revise su perfil y solicitudes y en dado caso de haber alguna falla comunicarse con el servicio a cliente.");</script>';
	echo '<script> window.location="cuenta.php"; </script>';
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >

		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<title>uHomeStore</title>
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- ENCABEZADO HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +132-33-40-98</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> servicio_cliente@uhomestore.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Dirección</a></li>
					</ul>
					<ul class="header-links pull-right">
						
                        <li><a href="cuenta.php"><i class="fas fa-sign-in-alt"></i><?php echo ''.$_SESSION['usuario2']. ''; ?></a></li>
                    	<li><a href="z_logout.php"><i class="fas fa-sign-in-alt"></i> Salir</a></li>
                 
                        
                    
                    
                     <div id="openModal3" class="modalDialog">
	                <div>
		            <a href="#close"  title="Close" class="close">X</a>
		            <h2 style="text-indent:45px;">Cuéntanos</h2>
		            <form action="index.php"  method="POST">
				    <label for="nombre">Tu nombre</label>
				    <br>
				    <p><input type="text"  name="nombre2" style="width:250px;height:25px" placeholder="Nombre" required></p><br>
                    
				    <label for="correo">Dirección De Correo</label>
				    <br>
                    <p><input type="email"  name="correo2" style="width:250px;height:25px" placeholder="alguien@algo.com" required></p><br>
				
				    <label>Comentario</label>
				    <br>
				    <p><input type="text"   name="texto2" style="width:250px;height:60px" placeholder="" required></p><br>

                    <input type="submit" class="log" value="Enviar" name="btn5">
			        </form>    
	                </div>
                    </div>   
                        
					</ul>
				</div>
			</div>
			<!-- /ENCABEZADO HEADER -->
      
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="store.php?var1=100" method="post">
									<select class="input-select" name="opcion">
										<option value="departamento">Deptos</option>
										<option value="casa">Casas</option>
										<option value="edificio">Edificios</option>
										<option value="rural">Rural</option>
										<option value="delujo">De lujo</option>
									</select>
									<input name= "buscador" class="input" placeholder="¿Qué estás buscando?">
									<button class="search-btn">Buscar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
		

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menú</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="index2.php">Inicio</a></li>
						
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
    
       
        //verificamos envio de formulario      
		if(isset($_POST['save'])){
            	//recuperamos variables
			    $nombreImg=$_FILES['img']['name'];
			    $ruta=$_FILES['img']['tmp_name'];
			    $destino="img/".$nombreImg;
			    if(copy($ruta,$destino) && !empty($ruta)){


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
            
            	//ingresamos datos en la tabla detalle 
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
            
                $emp = "SELECT * FROM empleados";
                $ranMax = 0;
                $ej = mysqli_query($conect, $emp);
                $list = mysqli_fetch_array($ej);
                for($i = 0; $i < $list; $i++){
                    $ranMax++;
                    $list = mysqli_fetch_array($ej);
                }
                $ran = $ranMax - 1;
                $d = rand(0,$ran); 
                
                $emp2 = "SELECT * FROM empleados";
                $ej2 = mysqli_query($conect, $emp2);
                $list2 = mysqli_fetch_array($ej2);                                       
                for($i2 = 0; $i2 < $d; $i2++){ 
                    $list2 = mysqli_fetch_array($ej2);
                }  
                $idem = $list2['idempleados'];
            
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
                $id   = $_POST["id"];
                $idcli = $listaTT["idclientes"];

                
        	    //insertamos datos en la tabla inmobilaria
                $al = "INSERT INTO `inmobilaria` (`idinmobiliaria`, `nombreIn`, `descripcionIn`, `precioIn`, `direccionIn`, `etiqueta1`, `etiqueta2`, `etiqueta3`, `etiqueta4`, `etiqueta5`, `imgIn`,`destino`, `detalles_iddetalles`, `empleados_idempleados`, `clientes_idclientes`, `status`, `comentarios`) VALUES (NULL, '$nombres', '$descripcion', '$precio', '$direccion', '$et11', '$et22', '$et33', '$et44', '$et55', '$nombreImg','$destino', '$var', '$idem', '$idcli', 'REVISION', '...');";
             
				$insert = mysqli_query($conect, $al);
                    
				if($insert){
				unset($_POST['save']);
                	echo '<script> alert("Datos de inmueble guardados y en revision");</script>';
					echo '<script> window.location="subscriptor_inmueble.php"; </script>';	
				}else{
				unset($_POST['save']);
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron guardar los datos generales.</div>';
                           
				}
				}else{
			        echo '<script type="text/javascript"> alert("Agregue una imagen con un nombre sin tantos caracteres eje: casa1.jpg"); window.location="subscriptor_inmueble.php";</script>';
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
						<input type="text" name = "medi" class="form-control" placeholder="y x y" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" required>
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
						<input type="number" name = "banos" class="form-control" placeholder="0" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" required>
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
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Sobre nosotros </h3>
								<p>Una gran empresa buscando que cumplas tu sueño, encontrar tu lugar ideal y la vida que te mereces. </p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Dirección</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+333-33-40-98</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>servicio_cliente@uhomestore.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categorías</h3>
								<ul class="footer-links">
									<li><a href="filtro2.php?var1=Departamento&var2=all&var3=all">Departamentos</a></li>
						<li><a href="filtro2.php?var1=Casa&var2=all&var3=all">Casas</a></li>
						<li><a href="filtro2.php?var1=Edificio&var2=all&var3=all">Edificios</a></li>
						<li><a href="filtro2.php?var1=De lujo&var2=all&var3=all">De lujo</a></li>
						<li><a href="filtro2.php?var1=Rurales&var2=all&var3=all">Rurales</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Información</h3>
								<ul class="footer-links">
									<li><a href="#openModal5">Sobre nosotros</a></li>
									<li><a href="#openModal3">Contáctanos</a></li>
									<li><a href="#">Póliza de Privacidad</a></li>
									<li><a href="#">Terminos & Condiciones</a></li>
								</ul>
							</div>
						</div>
                       
                    <div id="openModal5" class="modalDialog2">
	                <div>
		            <a href="#close"  title="Close" class="close">X</a>
                        <center>
		            <h2 style="text-indent:45px;">Sobre nosotros</h2>
                            <br>
                            
                        </center>
                        <center>
                        <h3>Nuestra filosofía</h3>
                        <a>Creemos en que la elección del hogar es una de las desiciones más importantes a lo largo de la vida. Proporcionar la mejora opcion y servicio para nuestros clientes es nuestra prioridad. </a> 
                            <br>
                        <h3>Nuestros valores</h3>
                        <a>Compromiso</a>
                        <a>Tolerancia</a> 
                        <a>Dedicación</a> 
                        <a>Responsabilidad</a>
                            <br>
                        <h3>Misión</h3>    
                        <a>Guiar a nuestros clientes para que hagan la mejor elección posible y hagan de su nueva casa su hogar, lo más pronto posible.</a>
                            <br>
                        <h3>Visión</h3> 
                        <a>Ser una empresa inmobiliaria reconocida a nivel nacional, con diferentes sucursales a lo largo del país y proporcionar un servicio competitivo y de cálidad en el mercado.</a>    
                        </center>
		            
	                </div>
                    </div>
                        
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Servicio</h3>
								<ul class="footer-links">
									<li><a href="cuenta.php">Mi cuenta</a></li>
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			
		</footer>
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
	
	echo '<script> alert("usted no es subscriptor o no esta logueado.");</script>';
	echo '<script> window.location="index.php"; </script>';
}
?>