<?php
//conectamos servidor
include 'z_serv.php';
session_start();
//verificamos sesion
if(isset($_SESSION["nombre"])){
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
						<li><a href="#openModal"><i class="fas fa-sign-in-alt"></i> <?php echo ''.$_SESSION['nombre']. ''; ?> </a></li>
                        <li><a href="z_logout.php"><i class="fa fa-user-o"></i> Salir</a></li>
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
						<li ><a href="cuenta.php">Solicitudes</a></li>
						<li><a href="factura.php">Factura</a></li>
						<!--<li><a href="citasActivas.php">Citas activas</a></li>-->
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
		<h2>Casas &raquo; Modificar datos</h2>
		<hr />
		
		<?php
			//recupermos datos del inmueble
			$id = $_GET["var2"];
            $bus = "SELECT * FROM inmobilaria WHERE idinmobiliaria = '$id'";
			$sql = mysqli_query($conect, $bus);
			if(mysqli_num_rows($sql) == 0){
				header("Location: empleado.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
            
            if(isset($_POST['save'])){
                //recuperamos variables
				$nombres = $_POST["nombres"];
				$descripcion = $_POST["desc"];
				$direccion = $_POST["direccion"];
				$precio = $_POST["precio"];
				$et1 = $_POST["et1"];
				$et2 = $_POST["et2"]; 
                $et3 = $_POST["et3"]; 
                $et4 = $_POST["et4"]; 
                $et5 = $_POST["et5"]; 
                /*comen = $_POST["comen"];*/
				//modificamos posibles cambios dentro de la tabla
               $up = "UPDATE inmobilaria SET nombreIn = '$nombres', descripcionIn = '$descripcion', direccionIn = '$direccion', precioIn = '$precio', etiqueta1 = '$et1', etiqueta2='$et2', etiqueta3 = '$et3', etiqueta4 = '$et4', etiqueta5 = '$et5', status = 'REVISION', comentarios = '...' WHERE idinmobiliaria = '$id'";

				$updatee = mysqli_query($conect, $up);
                
				if($updatee){
					header("Location: modificarCasaCliente.php?var2=".$id."&suc=succ");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['suc']) == 'succ'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
		
		<form class="form-horizontal" action="" method="post">
             <div class="form-group">
					<label class="col-sm-2 control-label">Comentarios</label>
					<div class="col-sm-6">
						<input type="text" name="comen" value="<?php echo $row ['comentarios']; ?>" class="form-control" placeholder="Nombres" required disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Código</label>
					<div class="col-sm-1">
						<input type="text" name="codigo" value="<?php echo $row ['idinmobiliaria']; ?>" class="form-control" placeholder="ID" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="nombres" value="<?php echo $row ['nombreIn']; ?>" class="form-control" placeholder="Nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-6">
						<input type="text" name="desc" value="<?php echo $row ['descripcionIn']; ?>" class="form-control" placeholder="Descripción" required >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-3">
						<input type = "text" name="direccion" class="form-control" value = "<?php echo $row ['descripcionIn']; ?>" placeholder="Dirección" >
					</div>
               </div>
               <div class="form-group">
					<label class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-3">
						<input type = "text" name="precio" class="form-control" value = "<?php echo $row ['precioIn']; ?>" placeholder="Precio" >
					</div>
               </div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 1</label>
					<div class="col-sm-3">
						<select name="et1" class="form-control" >
							<option value="">- Selecciona estado -</option>
                            <option value="Departamento" <?php if ($row ['etiqueta1']=='Departamento'){echo "selected";} ?>>Departamento</option>
							<option value="Casa" <?php if ($row ['etiqueta1']=='Casa'){echo "selected";} ?>>Casa</option>
							<option value="Edificio" <?php if ($row ['etiqueta1']=='Edificio'){echo "selected";} ?>>Edificio</option>
							<option value="De lujo" <?php if ($row ['etiqueta1']=='De lujo'){echo "selected";} ?>>De lujo</option>
							<option value="Rurales" <?php if ($row ['etiqueta1']=='Rurales'){echo "selected";} ?>>Rurales</option>
						</select> 
					</div>
                </div>
                <div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 2</label>
					<div class="col-sm-3">
						<select name="et2" class="form-control">
							<option value="">- Selecciona estado -</option>
                            <option value="Renta" <?php if ($row ['etiqueta2']=='Renta'){echo "selected";} ?>>Renta</option>
							<option value="Compra" <?php if ($row ['etiqueta2']=='Compra'){echo "selected";} ?>>Compra</option>
						</select> 
					</div>
                </div>
                <div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 3</label>
					<div class="col-sm-3">
						<select name="et3" class="form-control" >
							<option value="">- Selecciona estado -</option>
                            <option value="Amueblado" <?php if ($row ['etiqueta3']=='Amueblado'){echo "selected";} ?>>Amueblado</option>
							<option value="Sin amueblar" <?php if ($row ['etiqueta3']=='Sin amueblar'){echo "selected";} ?>>Sin amueblar</option>
							<option value="Con piscina" <?php if ($row ['etiqueta3']=='Con piscina'){echo "selected";} ?>>Con piscina</option>
							<option value="Full" <?php if ($row ['etiqueta3']=='Full'){echo "selected";} ?>>Full</option>
						</select> 
					</div>
                </div>
                <div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 4</label>
					<div class="col-sm-3">
						<select name="et4" class="form-control" >
							<option value="">- Selecciona estado -</option>
                            <option value="Vista-Rural" <?php if ($row ['etiqueta4']=='Vista-Rural'){echo "selected";} ?>>Vista-Rural</option>
							<option value="Vista-Urbana" <?php if ($row ['etiqueta4']=='Vista-Urbana'){echo "selected";} ?>>Vista-Urbana</option>
							<option value="Vista-Limitada" <?php if ($row ['etiqueta4']=='Vista-Limitada'){echo "selected";} ?>>Vista-Limitada</option>
						</select> 
					</div>
                </div>
                <div class="form-group">
					<label class="col-sm-2 control-label">Etiqueta 5</label>
					<div class="col-sm-3">
						<select name="et5" class="form-control">
							<option value="">- Selecciona estado -</option>
                            <option value="Nuevo" <?php if ($row ['etiqueta5']=='Nuevo'){echo "selected";} ?>>Nuevo</option>
							<option value="Usado" <?php if ($row ['etiqueta5']=='Usado'){echo "selected";} ?>>Usado</option>
							<option value="Personalizado" <?php if ($row ['etiqueta5']=='Personalizado'){echo "selected";} ?>>Personalizado</option>
						</select> 
					</div>
                </div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-6">
						<input type="text" name="desc" value="<?php echo $row ['status']; ?>" class="form-control" placeholder="Nombre" required >
					</div>
				</div>
               
                
			
				<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="cuenta.php" class="btn btn-sm btn-danger">Cancelar</a>
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

	</body>
</html>


<?php
}else{
    echo '<script>window.location = "registroUsuario.php"</script>';
}

    ?>