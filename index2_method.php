<?php
session_start();
//conectamos servidor
include 'z_serv.php';
//recuperamos variables
$v1 = $_GET['var9'];
//hacemos consulta del paquete seleccionado
$all = "SELECT * FROM paquetes WHERE idpaquetes= '$v1'";
$eje = mysqli_query($conect, $all);
$listaT = mysqli_fetch_array($eje);
//obtenemos la informacion del cliente
$all2 = "SELECT * FROM clientes WHERE usuario= '".$_SESSION['usuario2']."'";
$eje2 = mysqli_query($conect, $all2);
$listaT2 = mysqli_fetch_array($eje2);


//establesemos la zona horaria
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
//obtenemos fecha
$fecha_actual = date("Y-m-d"); 
//verificamos si el cliente registrado es subscriptor si no se manda a pagina compra
$log ="SELECT * FROM subscriptor inner join clientes on subscriptor.idclientes=clientes.idclientes
WHERE usuario= '".$_SESSION['usuario2']."'";	

$filas= mysqli_query($conect,$log);

if (mysqli_num_rows($filas)>0) {
         $subscriptor=true;               	
}else{
		 $subscriptor=false;
}
if(isset($_SESSION['usuario2']) && $subscriptor==false) {
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >

		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/method.css">

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
						<li><a href="index2.php"><i class="fas fa-home"></i>Inicio</a></li>
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
						<li><a href="index2_package.php">Paquetes</a></li>
						<li class="active"><a href="">Metodo de pago</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		<div class="conte">
			<div class="centradoM"><br><br>
			<form class="form-horizontal" action="index2_method.php?var9=<?php echo "$v1";?>" method="post">
			<img class="img-responsive" src="http://i76.imgup.net/accepted_c22e0.png">
		    </div><br><br>
				 <div id="card-success" class="hidden">
				  <i class="fa fa-check"></i>
				  <p>Pago Completado!</p>
				</div>

				<div id="form-errors" class="hidden">
				  <i class="fa fa-exclamation-triangle"></i>
				  <p id="card-error">Error</p>
				</div>
			<div id="form-container">

				  <div id="card-front">
				    <div id="shadow"></div>
					    <div id="image-container">
					      <span id="amount">Total: <strong><?php echo$listaT['precio']; ?>$</strong></span>
					      <span id="amount">Nombre: <strong><?php echo$listaT['nombreP']; ?> </strong>Meses:<strong> <?php echo$listaT['meses']; ?></b></strong></span>

					      <span id="card-image">
					      
					        </span>
					    </div>
				    <!--- end card image container --->

					    <label for="card-number">
					        Número tarjeta
					    </label>
				    	<input type="text" id="card-number" placeholder="1234 5678 9101 1112" length="16" >

					    <div id="cardholder-container">
					      <label for="card-holder">Nombre
					      </label>
					      <input type="text" id="card-holder" placeholder="e.g. John Doe" />
					    </div>
				    <!--- end card holder container --->
					    <div id="exp-container">
					      <label for="card-exp">
					          Expiración
					      </label>
					      <input id="card-month" type="text" placeholder="MM" length="2">
					      <input id="card-year" type="text" placeholder="YY" length="2">
					    </div>
				        <div id="cvc-container">
					      <label for="card-cvc"> CVC/CVV</label>
					      <input id="card-cvc" placeholder="XXX-X" type="text" min-length="3" max-length="4">
					      <p>3 o 4 digitos</p>
				    	</div>
				    <!--- end CVC container --->
				    <!--- end exp container --->
				  </div>
			  <!--- end card front --->
					  <div id="card-back">
					    <div id="card-stripe"></div>
					  </div>
			  <!--- end card back --->
			 		 <input type="text" id="card-token" />


			</div>
			<br><br>
			<input type="submit" name="save2" style="margin-left: 70%;" value="Comprar">
			 		
			</form>
		</div>
		
		<br><br><br><br><br><br><br><br>
		<?php    
        //verificamos datos enviados
		if(isset($_POST['save2'])){
				//recuperamos variables
				$meses = $listaT['meses'];
				$paquetes = $listaT['idpaquetes'];
				//asignamos fecha actual
			 	$campo1 = date("Y-m-d",strtotime($fecha_actual));
			 	//hacemos operacion fecha final
				$campo2 = date("Y-m-d",strtotime($fecha_actual."+ $meses month"));

				$campo3=$listaT2['idclientes'];

				//paquete
				$sql1="UPDATE clientes SET 
                idpaquetes='$v1'
                WHERE idclientes='$campo3' ";

                $ejecut=mysqli_query($conect, $sql1);
               	
               	//registramos dentro del historial
                $al = "INSERT INTO `pagos` (
                `idpagos`, 
                `idpaquetes`, 
                `idclientes`,
                `FechaCompraP`,
                `FechaVenP`
                ) VALUES (
                NULL, 
                '$paquetes', 
                '$campo3',
                '$campo1',
                '$campo2'
            	);";
             
				$insert = mysqli_query($conect, $al);
				//registramos subscriptor
                $al = "INSERT INTO `subscriptor` (
                `idsubscripcion`, 
                `FechaCompra`, 
                `FechaVencimiento`, 
                `RFC`, 
                `idclientes` 
                ) VALUES (
                NULL, 
                '$campo1', 
                '$campo2', 
                '', 
                '$campo3');";
             
				$insert = mysqli_query($conect, $al);
                    
				if(!$insert){
					echo "$meses<br>";
					echo "$campo1<br>";
					echo "$campo2<br>";
					echo "$campo3<br>";
				
			        echo '<script> alert("Algo ha pasado no se puede efectuar la compra");</script>';
                    echo '<script> window.location="index2_package.php"; </script>';
			        unset($_POST['save2']);
			    }else{
			    	unset($_POST['save2']);
			        echo '<script> alert("Subscripcion comprada!!! Bienvenido.");</script>';
			        echo '<script> window.location="index2.php"; </script>';
			          
			    }
			
		}
		?>

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
	 echo '<script> alert("ustedes ya es subscriptor o no esta logueado.");</script>';
	echo '<script> window.location="index.php"; </script>';
}
?>