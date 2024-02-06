<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >

		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<title>uHomeStore</title>
		<script type="text/javascript">
     function validar() {
         var pas1 = document.getElementById("pass1").value;
         var pas2 = document.getElementById("pass2").value;

         if (pas1 != pas2) {
             alert("Contraseñas no coinciden");
             return false;
         }
         else {
        
         }
     }

	 </script>
  
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
						<li><a href="index.php"><i class="fa fa-user-o"></i>Volver</a></li>
                        <li><a href="#openModal"><i class="fas fa-sign-in-alt"></i>Ingresar</a></li>
                    
                    <div id="openModal" class="modalDialog">
	                <div>
		            <a href="#close"  title="Close" class="close">X</a>
		            <h2 style="text-indent:45px;">Ingresar</h2>
		            <form action="z_validar.php" method="post">
                    <p style="text-indent:45px;"><input type="text" placeholder="&#128272; Usuario" name="user" required></p>
                    <p style="text-indent:45px;"><input type="password" placeholder="&#128272; Contrase&ntilde;a" name="pw" required></p>
                    <p style="text-indent:45px;"><input class="log2" type="submit" name="login" value="Entrar"></p>
				    </form>
	                </div>
                    </div>
                        
                    
                    
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
								<form action="filtro.php?var1=100" method="post">
									<select class="input-select" name="opcion">
										<option value="Departamento">Deptos</option>
										<option value="Casa">Casas</option>
										<option value="Edificio">Edificios</option>
										<option value="Rurales">Rural</option>
										<option value="De lujo">De lujo</option>
									</select>
									<input name= "buscador" class="input" placeholder="¿Qué estás buscando?" disabled>
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
						<li><a href="index.php">Inicio</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

<br><br><br>
		
        <div class = "section" style="margin-left: 29px; margin-top: -40px;">
		<h2>Usuarios &raquo; Enviar solicitud de registro</h2>
		<hr />
		
		<?php
    
       
       //verificamos contenido de formulario                  	       
		if(isset($_POST['save'])){
				//conectamos servidor
                include 'z_serv.php';
            
                
                //recuperamos variables
                $nombre = $_POST["camp1"];
                $apellidos = $_POST["camp2"];
                $correo = $_POST["camp3"];
                $direccion = $_POST["camp4"];
                $telefono = $_POST["camp5"];
                $edad = $_POST["camp6"];
                $usuario = $_POST["camp7"];
                $pw = $_POST["camp8"];

                $comp = "SELECT * FROM clientes WHERE usuario = '$usuario'";
                $ej = mysqli_query($conect, $comp);
                if(mysqli_num_rows($ej) > 0 ){
                    echo '<script>alert("Usuario repetido utiliza otro.");</script>';
                    echo '<script> window.location="registroUsuario.php"; </script>';
                }else{
            	//ingresamos nuevo usuario
                $ingreso = "INSERT INTO `clientes` (`idclientes`, `nombre`, `apellidos`, `correo`, `direccion`, `telefono`, `edad`, `usuario`, `pw`, `idpaquetes`) VALUES (NULL, '$nombre', '$apellidos', '$correo', '$direccion', '$telefono', '$edad', '$usuario', '$pw', '0');"; 
            
                $insertD = mysqli_query($conect, $ingreso);
            
                if($insertD){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Registro guardado correctamente.</div>';		
				}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. Los detalles no se guardaron correctamente.</div>';          
				}
            
                }
			}
		?>
		<form class="form-horizontal" action="" method="post" onsubmit="return validar()">
         
				<div class="form-group">
					<label class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-4">
						<input type="text" name="camp1" class="form-control" placeholder="Nombres" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Apellidos</label>
					<div class="col-sm-4">
						<input type="text" name="camp2" class="form-control" placeholder="Apellidos" required>
					</div>
				</div>
				
                <div class="form-group">
					<label class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-4">
						<input type="text" name="camp3" class="form-control" placeholder="Correo" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-4">
						<input type="text" name="camp4" class="form-control" placeholder="Descripción" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-4">
						<input type="text" maxlength="10" name="camp5" class="form-control" placeholder="Telefono" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Edad</label>
					<div class="col-sm-4">
						<input type="number" name="camp6" class="form-control" placeholder="Edad" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Usuario</label>
					<div class="col-sm-4">
						<input type="text" name="camp7" class="form-control" placeholder="usuario" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">PW</label>
					<div class="col-sm-4">
						<input type="password" name="camp8" id="pass1" class="form-control" placeholder="*******" required>
					</div>
				</div>
      <div class="form-group">
					<label class="col-sm-2 control-label">Confirmar PW</label>
					<div class="col-sm-4">
						<input type="password" id="pass2" class="form-control" placeholder="*******" required>
					</div>
				</div>
       
        <div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
    </div>
		
		<br><br><br>


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
									<li><a href="filtro.php?var1=Departamento&var2=all&var3=all">Departamentos</a></li>
						<li><a href="filtro.php?var1=Casa&var2=all&var3=all">Casas</a></li>
						<li><a href="filtro.php?var1=Edificio&var2=all&var3=all">Edificios</a></li>
						<li><a href="filtro.php?var1=De lujo&var2=all&var3=all">De lujo</a></li>
						<li><a href="filtro.php?var1=Rurales&var2=all&var3=all">Rurales</a></li>
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
