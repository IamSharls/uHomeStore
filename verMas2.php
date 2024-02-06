<?php
session_start();
include 'z_serv.php';

if(isset($_SESSION['nombre'])) {
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
   <style>
       
 
.cont-ub{
    display:flex;
    list-style:none
}

.column-ub{
    margin:0 15px 25px;
	background:#fff;
    border-radius:5px;
    flex-basis:50%;
}

.card-ub{
    text-align: center;
    padding: 10%;
}
.title-ub{
	font-family: 'Chivo';
	color:#FE9A2E;
	text-align: center;
	font-size: 40px;
	font-weight: bold;
}
            
       
.text-ub{
	text-align: justify;
	font-family: 'Chivo';
	color:#1C1C1C;
	font-size: 20px;
}            
        </style>
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
						<li><a href="index2.php"><i class="fas fa-home"></i>Inicio</a></li>
						<li><a href="cuenta.php"><i class="fa fa-user-o"></i><?php echo ''.$_SESSION['nombre']. ''; ?></a></li>
                        <li><a href="z_logout.php"><i class="fas fa-sign-in-alt"></i>Salir</a></li>
                    
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
								<form action="filtro2.php?var1=100" method="post">
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
						<li><a href="index2.php">Inicio</a></li>
						<li><a href="filtro2.php?var1=Nuevo&var2=all&var3=all">Lo más nuevo</a></li>
						<li><a href="filtro2.php?var1=Departamento&var2=all&var3=all">Departamentos</a></li>
						<li><a href="filtro2.php?var1=Casa&var2=all&var3=all">Casas</a></li>
						<li><a href="filtro2.php?var1=Edificio&var2=all&var3=all">Edificios</a></li>
						<li><a href="filtro2.php?var1=De lujo&var2=all&var3=all">De lujo</a></li>
						<li><a href="filtro2.php?var1=Rurales&var2=all&var3=all">Rurales</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

<br><br><br>

		<center>
		<h2>Detalles de la propiedad</h2>
       </center>
        <br>
		
		<?php
         $id = $_GET['var1'];    
	      $all = "SELECT direccionIn, destino, nombreIn, descripcionIn, precioIn, imgIn, etiqueta1, etiqueta3, etiqueta4, banos, estacionamiento, cuarto_servicio, terrenom2, orientacion, niveles, conservacion, edadpropiedad, mantenimiento FROM inmobilaria inner join detalles on inmobilaria.detalles_iddetalles = detalles.iddetalles where idinmobiliaria = '$id'"; 
	     $eje = mysqli_query($conect, $all);
	     $listaA = mysqli_fetch_array($eje);
           
		 ?>
        
    <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
	
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<?php  echo '<img src="'.$listaA['destino'].'" >'; ?>
							</div>

							
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
							<?php  echo '<img src="'.$listaA['destino'].'" >'; ?>
							</div>

							
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $listaA['nombreIn']."";?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">Certificado por uHomeStore</a>
							</div>
							<div>
								<h3 class="product-price"><?php echo $listaA['precioIn']."";?></h3>
					
							</div>
							<p><?php echo $listaA['direccionIn']."";?></p>
							<div class="product-options">
							
						
							</div>
							
							<div class="add-to-cart">
							
											
                             
												<div id="review-form">
													<form action="verMas2.php" method="post">
													<input class="input" type="text" name="nombre" placeholder="Nombre">
													<input class="input" type="email" name="correo" placeholder="Email">
													<input class="input" type="text" name="telefono" placeholder="Telefono/Celular">
													<button name="cita" class="add-to-cart-btn"><i class="fa fa-phone"></i> AGENDAR CITA</button>
												</div>
								<?php
                                if(isset($_POST['cita'])){
                                    $nombre = $_POST["nombre"];
                                    $correo = $_POST["correo"];
                                    $telefono = $_POST["telefono"];
                                    
                                    $in = "INSERT INTO citas (nombre, email, tel) VALUES ('$nombre', '$correo', '$telefono')";
                                    $eje = mysqli_query($conect, $in);
                                    
                                    if(!eje){
                                        echo '<script> alert("Error al registrar la cita");</script>';
                                        echo '<script> window.location="index2"; </script>';
                                    }else{
                                        echo '<script> alert("Cita registrada, uno de nuestros agentes se pondrá en contacto con usted.");</script>';
			                            echo '<script> window.location="index2.php"; </script>';
                                    }
                                    
                                }
                                
                                
                                ?>
											
										<!-- /Review Form -->
								
								
							</div>


							<ul class="product-links">
								<li>Categoria:</li>
								<li><a href="#"><?php echo $listaA['etiqueta1']."";?></a></li>
								<li><a href="#"><?php echo $listaA['etiqueta3']."";?></a></li>
								<li><a href="#"><?php echo $listaA['etiqueta4']."";?></a></li>
							</ul>

				

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Descripción</a></li>
								<li><a data-toggle="tab" href="#tab2">Detalles de la casa</a></li>
								

							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo $listaA['descripcionIn']."";?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->
                                 <div id="tab2" class="tab-pane fade in">
									<center>
									<div class="row">
										<div class = cont-ub>
        <br><br><br> 
        <div class = column-ub>
        <div class = card-ub>
        <br><br>
        <p class = text-ub>Terreno: <?php echo $listaA['terrenom2']."";?></p>
        <p class = text-ub>Baños: <?php echo $listaA['banos']."";?></p>
        <p class = text-ub>Estacionamiento: <?php echo $listaA['estacionamiento']."";?></p>
        </div>
        </div>
         <div class = column-ub>
        <div class = card-ub >
        <br><br>
        <p class = text-ub>Cuarto-Servicio: <?php echo $listaA['cuarto_servicio']."";?></p>
        <p class = text-ub>Orientación: <?php echo $listaA['orientacion']."";?></p>
        <p class = text-ub>Niveles: <?php echo $listaA['niveles']."";?></p>
       
            </div>
        </div>
         <div class = column-ub>
        <div class = card-ub>
        <br><br>
        <p class = text-ub>Conservación: <?php echo $listaA['conservacion']."";?></p>
        <p class = text-ub>Edad de la propiedad: <?php echo $listaA['edadpropiedad']."";?></p>
        <p class = text-ub>Mantenimiento: <?php echo $listaA['mantenimiento']."";?></p>
            </div>
        </div>
        </div>
											</div></center>
									</div>
								<!-- tab2  -->
						
								
								<!-- /tab2  -->

								
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
			
		</div>
		<!-- /SECTION -->

		
		<br><br><br><br><br><br><br><br>


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
	echo '<script> window.location="registroUsuario.php"; </script>';
}
?>