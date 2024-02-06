<?php
session_start();
include 'z_serv.php';

//verificamos si el cliente registrado es subscriptor si no se manda a pagina compra
$log ="SELECT * FROM subscriptor inner join clientes on subscriptor.idclientes=clientes.idclientes
WHERE usuario= '".$_SESSION['usuario2']."'";	

$filas= mysqli_query($conect,$log);

if (mysqli_num_rows($filas)>0) {
         $subscriptor=true;               	
}else{
		 $id = $_SESSION['idclientes']; 
		 $subscriptor=false;
         $cam2 = "UPDATE clientes SET idpaquetes = '0' WHERE idclientes = '$id'";
         $si3 = mysqli_query($conect, $cam2);
}

if(isset($_SESSION['usuario2'])) {
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
.img-card{
border-radius: 10%;
height: 200px;
width: 240px;
margin: auto;
			
}

.cont{
    display:flex;
    list-style:none;
}

.column{
    box-shadow: 2px 2px 20px #999;
    margin:0 15px 25px;
    border: 1px solid rgba(0,0,0,0.2);
	background:#fff;
    border-radius:5px;
    flex-basis:25%;
    transition: transform .2s;
}

.card{
    text-align: center;
    padding: 10%;
}
       
.column:hover{
transform: scale(1.1);
            } 
.zoom{
transition: transform .2s;            
} 
.zoom:hover{
transform: scale(1.1);           
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
						<?php if($subscriptor==true){			?>
						<li><a href="subscriptor_inmueble.php"><i class="fas fa-money-check-alt"></i>Publicar</a></li>
						<?php }else{			?>
						<li><a href="index2_package.php"><i class="fas fa-money-check-alt"></i>Publicar</a></li>
						<?php }?>
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
						<li class="active"><a href="index.html">Inicio</a></li>
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


		
		<br>
		<center>
		<h2>Propiedades disponibles</h2>
		</center>
		<br>
		<div id="store" class="col-md-12">
						
						
						<div class="row">
						<?php
						
						   
   $todo2= "SELECT * FROM inmobilaria WHERE status = 'ACEPTADO' LIMIT 8"; 
	$ejecuta2= mysqli_query($conect,$todo2);
	$listaA = mysqli_fetch_array($ejecuta2);  
	$count = $ejecuta2->num_rows;  
						for($y=0; $y<$count; $y++){
						?>
							<!-- product -->
							<div class="col-md-3 col-xs-5">
								<div class="product">
									<div class="product-img">
										 <?php  echo '<img src="'.$listaA['destino'].'" width="200px" height="200px">'; ?>
										<div class="product-label">
										</div>
									</div>
									<div class="product-body">
                                        <p class="product-category"><?php echo $listaA["etiqueta1"]."</p>"; ?></p>
										<h3 class="product-name"><a href="#"><?php echo $listaA["nombreIn"]."</a>"; ?></h3>
										<h4 class="product-price"><?php echo $listaA["precioIn"].""; ?> </h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
                                        
									</div>
									<div class="add-to-cart">
									<a href="verMas2.php?var1=<?php echo $listaA["idinmobiliaria"].""; ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>AGENDAR CITA</button></a>
									</div>
								</div>
							</div>

						<?php 
							$listaA = mysqli_fetch_array($ejecuta2); 
					} ?>
							
						</div>
				
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Días</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Horas</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Minutos</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Segundos</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">ÚLTIMO AÑADIDO</h2>
							<p>¡Mira la última inmobiliaria añadida!</p>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Registra tu email para recibir un <strong>BOLETÍN</strong> semanal</p>
							<form action="boletinServ.php" method="post">
								<input class="input" type="email" name="correo" placeholder="Ingresa tu email" required>
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Suscribir</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

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
	echo '<script> window.location="index2.php"; </script>';
}
?>