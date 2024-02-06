<?php
//conectamos servidor
include 'z_serv.php';
session_start();
//verificamos sesion
if(isset($_SESSION["nombreE"])){
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
					
					<ul class="header-links pull-right">
						<li><a href="#openModal"><i class="fas fa-sign-in-alt"></i> <?php echo ''.$_SESSION['nombreE']. ''; ?> </a></li>
                        <li><a href="logout.php"><i class="fa fa-user-o"></i> Salir</a></li>
					</ul>
				
			
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
						<li><a href="empleado.php">Casas</a></li>
						<li class = "active"><a href="">Enviar Solicitud</a></li>
						<li><a href="citasActivas.php">Citas activas</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		
		<br><br><br>
		<div class="container">
		<div class = "content">
		<h2>Casas &raquo; Enviar solicitud de registro</h2>
		<hr />
		
		<?php
		//recuperamos id
        $id = $_SESSION['idempleados'];    
        //verificamos datos del formulario                   
		if(isset($_POST['save'])){
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
            
            	//ingresmos detalles del inmueble
                $ingreso = "INSERT INTO `detalles` (`iddetalles`, `terrenom2`, `habitantes`, `banos`, `estacionamiento`, `cuarto_servicio`, `orientacion`, `niveles`, `conservacion`, `edadpropiedad`, `mantenimiento`) VALUES (NULL, '$medidas', '$habi', '$ban', '$det1', '$det2', '$det3', '$det4', '$det5', '$edad', '$det6');"; 
            
                $insertD = mysqli_query($conect, $ingreso);
            	//comprobamos el exito
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
            	//recuperamos las demas variables
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
        		//ingresamos los datos en la tabla inmobilaria
                $al = "INSERT INTO `inmobilaria` (`idinmobiliaria`, `nombreIn`, `descripcionIn`, `precioIn`, `direccionIn`, `etiqueta1`, `etiqueta2`, `etiqueta3`, `etiqueta4`, `etiqueta5`, `imgIn`, `detalles_iddetalles`, `empleados_idempleados`, `status`, `comentarios`) VALUES (NULL, '$nombres', '$descripcion', '$precio', '$direccion', '$et11', '$et22', '$et33', '$et44', '$et55', '', '$var', '$id', 'REVISION', '$comen');";
             
				$insert = mysqli_query($conect, $al);
                //comprobamos si se ingresó correctamente  
				if($insert){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos generales han sido guardados con éxito.</div>';		
				}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron guardar los datos generales.</div>';
                           
				}
				
			}
		?>
		<form class="form-horizontal" action="" method="post">
         
				<div class="form-group">
					<label class="col-sm-2 control-label">Nombre de la casa</label>
					<div class="col-sm-4">
						<input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-4">
						<input type="text" name="desc" class="form-control" placeholder="Descripción" required>
					</div>
				</div>
				
               <div class="form-group">
					<label class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-3">
						<input type = "text" name="precio" class="form-control" placeholder="Precio">
					</div>
               </div>
               
               <div class="form-group">
					<label class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-3">
						<input type = "text" name="direccion" class="form-control" placeholder="Dirección">
					</div>
               </div>
              
				<div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 1</label>
					<div class="col-sm-3">
						<select name="et1" class="form-control">
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
						<select name="et2" class="form-control">
							<option value="">- Selecciona estado -</option>
                            <option value="Renta">Renta</option>
							<option value="Compra">Compra</option>
						</select> 
					</div>
                </div>
                
                <div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 3</label>
					<div class="col-sm-3">
						<select name="et3" class="form-control">
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
						<select name="et4" class="form-control">
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
						<select name="et5" class="form-control">
							<option value="">- Selecciona estado -</option>
                            <option value="Nuevo" >Nuevo</option>
							<option value="Usado" >Usado</option>
							<option value="Personalizado">Personalizado</option>
						</select> 
					</div>
                </div>
                 
               <div class="form-group">
					<label class="col-sm-2 control-label">Comentarios</label>
					<div class="col-sm-4">
						<input type="text" name = "comen" class="form-control" placeholder="Cometarios" required>
					</div>
				</div>
				
       <br><br>
    <h2>Casas &raquo; Ingrese los detalles</h2>
		<hr />
        <div class="form-group">
					<label class="col-sm-2 control-label">Medidas</label>
					<div class="col-sm-4">
						<input type="text" name = "medi" class="form-control" placeholder="Cometarios" required>
					</div>
				</div>
       <div class="form-group">
					<label class="col-sm-2 control-label">Habitantes</label>
					<div class="col-sm-4">
						<input type="text" name = "hab" class="form-control" placeholder="Cometarios" required>
					</div>
				</div>
       <div class="form-group">
					<label class="col-sm-2 control-label">Baños</label>
					<div class="col-sm-4">
						<input type="text" name = "banos" class="form-control" placeholder="Cometarios" required>
					</div>
				</div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Estacionamiento</label>
					<div class="col-sm-3">
						<select name="det1" class="form-control">
							<option value="">- Selecciona -</option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
							
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Cuarto-Servicio</label>
					<div class="col-sm-3">
						<select name="det2" class="form-control">
							<option value="">- Selecciona -</option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Orientación</label>
					<div class="col-sm-3">
						<select name="det3" class="form-control">
							<option value="">- Selecciona -</option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
						</select> 
					</div>
                </div>
        <div class="form-group">
					<label class="col-sm-2 control-label">Niveles</label>
					<div class="col-sm-3">
						<select name="det4" class="form-control">
							<option value="">- Selecciona -</option>
                            <option value="Si" >Si</option>
							<option value="No" >No</option>
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
					<label class="col-sm-2 control-label">Edad de la propiedad</label>
					<div class="col-sm-4">
						<input type="text" name = "ed" class="form-control" placeholder="Cometarios" required>
					</div>
				</div>                                             
        <div class="form-group">
					<label class="col-sm-2 control-label">Mantenimiento</label>
					<div class="col-sm-3">
						<select name="det6" class="form-control">
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
    </div>
	
<br><br><br><br><br><br>


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
									<li><a href="#openModal">Mi cuenta</a></li>
									
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
    echo '<script>window.location = "registro.php"</script>';
}

    ?>