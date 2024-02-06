<?php
	//conectamos servidor
	include 'z_serv.php';
	//verificamos sesion
	if(isset($_SESSION['nombre'])){
	echo '<script> window.location="filtro2.php"; </script>';
	}
	//asiganamos seleccion de filtro
	$v1 = $_GET['var1'] OR die("Por favor seleccione una opción válida");
	if($v1==100){
		$opcion=$_POST['opcion'];
		$v1=$opcion;
        $v2="all";
		$v3="all";
	}else{
		$v2 = $_GET['var2'] OR die("Por favor seleccione una opción válida");
		$v3 = $_GET['var3'] OR die("Por favor seleccione una opción válida");
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
        
        
        <style>
       /* 	Product details  */
.product-details {
	position: relative;
	text-align: left;
	overflow: hidden;
	padding: 30px;
	height: 100%;
	float: left;
	width: 40%;

}

/* 	Product Name */
#container .product-details h1{
	font-family: 'Old Standard TT', serif;
	display: inline-block;
	position: relative;
	font-size: 34px;
	color: #344055;
	margin: 0;
	
}

#container .product-details h1:before{
	position: absolute;
	content: '';
	right: 0%; 
	top: 0%;
	transform: translate(25px, -15px);
	font-family: 'Farsan', cursive;
	display: inline-block;
	background: #FFA69E;
	border-radius: 5px;
	font-size: 14px;
	padding: 5px;
	color: #FFF;
	margin: 0;
	animation: chan-sh 6s ease infinite;

}


@keyframes chan-sh {
	from  {content: 'free shipping';}
	to  {content: 'New';}
	
}

/*Product Rating  */
.hint-star {
	display: inline-block;
	margin-left: 0.5em;
	color: gold;
	width: 50%;
}


/* The most important information about the product */
#container .product-details > p {
	font-family: 'Farsan', cursive;
	text-align: center;
	font-size: 20px;
	color: #7d7d7d;
	
}

/* control */

.control{
	position: absolute;
	bottom: 20%;
	left: 22.8%;
	
}
/* the Button */
.btn {
	transform: translateY(0px);
	transition: 0.3s linear;
	background: #49C608;
	border-radius: 5px;
  position: relative;
  overflow: hidden;
	cursor: pointer;
	outline: none;
	border: none;
	color: #eee;
	padding: 0;
	margin: 0;
	
}

.btn:hover{transform: translateY(-4px);}

.btn span {
	font-family: 'Farsan', cursive;
	transition: transform 0.3s;
	display: inline-block;
  padding: 10px 20px;
	font-size: 1.2em;
	margin:0;
	
}
/* shopping cart icon */
.btn .price, .shopping-cart{
	background: #333;
	border: 0;
	margin: 0;
}

.btn .price {
	transform: translateX(-10%); padding-right: 15px;
}

/* the Icon */
.btn .shopping-cart {
	transform: translateX(-100%);
  position: absolute;
	background: #333;
	z-index: 1;
  left: 0;
  top: 0;
}

/* buy */
.btn .buy {z-index: 3; font-weight: bolder;}

.btn:hover .price {transform: translateX(-110%);}

.btn:hover .shopping-cart {transform: translateX(0%);}



/* product image  */
.product-image {
	transition: all 0.3s ease-out;
	display: inline-block;
	position: relative;
	overflow: hidden;
	height: 100%;
	float: right;
	width: 50%;
	display: inline-block;
}

#container img {width: 100%;height: 100%;}

.info {
    background: rgba(27, 26, 26, 0.9);
    font-family: 'Farsan', cursive;
    transition: all 0.3s ease-out;
    transform: translateX(-100%);
    position: absolute;
    line-height: 1.9;
    text-align: left;
    font-size: 120%;
    cursor: no-drop;
    color: #FFF;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
}

.info h2 {text-align: center}
.product-image:hover .info{transform: translateX(0);}

.info ul li{transition: 0.3s ease;}
.info ul li:hover{transform: translateX(50px) scale(1.3);}

.product-image:hover img {transition: all 0.3s ease-out;}
.product-image:hover img {transform: scale(1.2, 1.2);}
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
						<li><a href="registroUsuario.php"><i class="fa fa-user-o"></i>Registrarse</a></li>
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
						<!-- Inicializamos filtros-->
						<li <?php if($v1=='Nuevo'){ echo 'class="active"'; }?> ><a href="filtro.php?var1=Nuevo&var2=all&var3=all">Lo más nuevo</a></li>
						<li <?php if($v1=='Departamento'){ echo 'class="active"'; }?>><a href="filtro.php?var1=Departamento&var2=all&var3=all">Departamentos</a></li>
						<li <?php if($v1=='Casa'){ echo 'class="active"'; }?>><a href="filtro.php?var1=Casa&var2=all&var3=all">Casas</a></li>
						<li <?php if($v1=='Edificio'){ echo 'class="active"'; }?>><a href="filtro.php?var1=Edificio&var2=all&var3=all">Edificios</a></li>
						<li <?php if($v1=='De lujo'){ echo 'class="active"'; }?>><a href="filtro.php?var1=De lujo&var2=all&var3=all">De lujo</a></li>
						<li <?php if($v1=='Rurales'){ echo 'class="active"'; }?>><a href="filtro.php?var1=Rurales&var2=all&var3=all">Rurales</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

<br><br><br>
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
				



						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Características</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
									<ul class="main-nav nav navbar-nav">
									<!-- realizamos consulta deacuerdo a filtros-->
									<li <?php if($v2=='Vista-Rural'){ echo 'class="active"'; }?>><a  href="filtro.php?var1=<?php echo $v1; ?>&var2=Vista-Rural&var3=<?php echo $v3; ?>" >VISTA RURAL <small>
										<?php
										if($v3=='all'){
											$todo2= "SELECT * FROM inmobilaria WHERE etiqueta4 ='Vista-Rural' AND etiqueta1='$v1' AND status = 'ACEPTADO'"; 
										}else{
											$todo2= "SELECT * FROM inmobilaria WHERE (etiqueta3 ='Vista-Rural' AND etiqueta1='$v1' AND etiqueta2='$v3') OR etiqueta3 ='Vista-Rural' AND etiqueta5='$v1'  AND etiqueta2='$v3' AND status = 'ACEPTADO' "; 
										}
										
										$ejecuta2= mysqli_query($conect,$todo2);
										$listaA = mysqli_fetch_array($ejecuta2);  
										$count = $ejecuta2->num_rows;   
										echo "(".$count.")";  
										?>
										</small></a>
										</li>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										
									<ul class="main-nav nav navbar-nav">
									
									<li <?php if($v2=='Amueblado'){ echo 'class="active"'; }?>><a href="filtro.php?var1=<?php echo $v1; ?>&var2=Amueblado&var3=<?php echo $v3; ?>">AMUEBLADO <small>
										<?php
										$todo2= "SELECT * FROM inmobilaria WHERE etiqueta3 ='Amueblado' AND status = 'ACEPTADO'"; 
										//inicializamos filtro
										$ejecuta2= mysqli_query($conect,$todo2);
										$listaA = mysqli_fetch_array($ejecuta2);  
										$count = $ejecuta2->num_rows;   
										echo "(".$count.")";  
										?>
										</small></a>
										</li>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										
									<ul class="main-nav nav navbar-nav">
									
									<li <?php if($v2=='Con piscina'){ echo 'class="active"'; }?>><a href="filtro.php?var1=<?php echo $v1; ?>&var2=Con piscina&var3=<?php echo $v3; ?>">PISCINA 	<small>
										<?php
										$todo2= "SELECT * FROM inmobilaria WHERE etiqueta3 ='Con piscina' AND status = 'ACEPTADO'"; 
										//inicializamos filtro
										$ejecuta2= mysqli_query($conect,$todo2);
										$listaA = mysqli_fetch_array($ejecuta2);  
										$count = $ejecuta2->num_rows;   
										echo "(".$count.")";  
										?>
										</small></a>
										</li>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
									
									<ul class="main-nav nav navbar-nav">
									
									<li <?php if($v2=='Full'){ echo 'class="active"'; }?>><a href="filtro.php?var1=<?php echo $v1; ?>&var2=Full&var3=<?php echo $v3; ?>">FULL <small>
										<?php
										$todo2= "SELECT * FROM inmobilaria WHERE etiqueta3 ='Full' AND status = 'ACEPTADO'"; 
										$ejecuta2= mysqli_query($conect,$todo2);
										$listaA = mysqli_fetch_array($ejecuta2);  
										$count = $ejecuta2->num_rows;   
										echo "(".$count.")";  
										?>
										</small></a>
										</li>
									</label>
								</div>
			
							</div>
						</div>
						<!-- /aside Widget -->
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">TIPO</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand1-1">
									<label for="brand1-1">
									
									<ul class="main-nav nav navbar-nav">
									
									<li <?php if($v3=='Renta'){ echo 'class="active"'; }?>><a href="filtro.php?var1=<?php echo $v1; ?>&var2=<?php echo $v2; ?>&var3=Renta">RENTA 	<small>
										<?php
										$todo2= "SELECT * FROM inmobilaria WHERE etiqueta2 ='Renta' AND status = 'ACEPTADO'"; 
										$ejecuta2= mysqli_query($conect,$todo2);
										$listaA = mysqli_fetch_array($ejecuta2);  
										$count = $ejecuta2->num_rows;   
										echo "(".$count.")";  
										?>
										
										</small></a>
										</li>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand1-2">
									<label for="brand1-2">
											
									<ul class="main-nav nav navbar-nav">
									
									<li <?php if($v3=='Compra'){ echo 'class="active"'; }?>><a href="filtro.php?var1=<?php echo $v1; ?>&var2=<?php echo $v2; ?>&var3=Compra">COMPRA <small>
										<?php
										$todo2= "SELECT * FROM inmobilaria WHERE etiqueta2 ='Compra' AND status = 'ACEPTADO'"; 
										$ejecuta2= mysqli_query($conect,$todo2);
										$listaA = mysqli_fetch_array($ejecuta2);  
										$count = $ejecuta2->num_rows;   
										echo "(".$count.")";  
										?>
										</small></a>
										</li>
									</label>
								</div>
						
			
							</div>
						</div>
						<!-- /aside Widget -->

					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						
						<!-- store products -->
						<div class="row">
						<?php
						//verificamos status de filtros
						if($v2=='all' && $v3=='all'){
							$todo2= "SELECT * FROM inmobilaria WHERE etiqueta5 ='$v1' AND status = 'ACEPTADO'"; 
						//verificamos status de filtros
						}else if($v2 !='all' && $v3=='all'){
							$todo2= "SELECT * FROM inmobilaria WHERE etiqueta5 ='$v1' AND etiqueta3='$v2' OR etiqueta5 ='$v1' AND etiqueta3='$v2' AND status = 'ACEPTADO'"; 
						//verificamos status de filtros
						}else if($v2!='all' && $v3 != 'all'){
							$todo2= "SELECT * FROM inmobilaria WHERE etiqueta5 ='$v1' AND etiqueta3='$v2' AND etiqueta2='$v3' OR etiqueta5 ='$v1' AND etiqueta3='$v2' AND etiqueta2='$v3' AND status = 'ACEPTADO'"; 
					
						}
						   
						$ejecuta2= mysqli_query($conect,$todo2);
						$listaA = mysqli_fetch_array($ejecuta2);  
						$count = $ejecuta2->num_rows;  
						for($y=0; $y<$count; $y++){
						?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<?php  echo '<img src="'.$listaA['destino'].'" width="200px" height="200px">'; ?>
										<div class="product-label">
											<!-- <span class="new">NEW</span> -->
										</div>
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo $listaA["etiqueta1"]."</p>"; ?>
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
									<a href="verMas.php?var1=<?php echo $listaA["idinmobiliaria"].""; ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>AGENDAR CITA</button></a>
									</div>
								</div>
							</div>
							<!-- /product -->

							<div class="clearfix visible-sm visible-xs"></div>
						<?php 
							$listaA = mysqli_fetch_array($ejecuta2); 
					} ?>
							
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<br><br><br>
						<div class="store-filter clearfix">
							<span class="store-qty"><?php if($count>1 || $count<1){echo $count." resultados encontrados.";}else{echo $count." resultado encontrado.";}  ?></span>
						
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
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
