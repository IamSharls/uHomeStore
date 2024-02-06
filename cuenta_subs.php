<?php

include 'z_serv.php';
session_start();

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
   
   <style>
    .acep{
   color:#239B56;
      }
     .den{
   color:#C0392B;
}
.rev{
   color:#F1C40F;
}
       .table{
	background-color: white;
	text-align: left;
	border-collapse: collapse;
	width: 80%;
}

.th, td{
	padding: 20px;
    font-style:italic;
    font-size: 15px;
}
        
        </style>
        
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- ENCABEZADO HEADER -->
			<div id="top-header">
				<div class="container">
					
					<ul class="header-links pull-right">
					    <li><a href="index2.php"><i class="fas fa-home"></i> Inicio</a></li>
						<li><a href="#openModal"><i class="fa fa-user-o"></i> <?php echo ''.$_SESSION['usuario2']. ''; ?> </a></li>
                        <li><a href="z_logout.php"><i class="fas fa-sign-in-alt"></i> Salir</a></li>
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
						<div class="col-md-6" style="text-align: right; color;">
							<div class="header-search">
								<h1 style="color: #D10024;">Bienvenido: <?php echo ''.$_SESSION['usuario2']. ''; ?></h1>
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
						<li><a href="cuenta.php">Solicitudes</a></li>
						<li><a href="cuenta_paquete.php">Paquetes</a></li>
						<li class="active"><a href="cuenta_subs.php">Historial</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
    <center><h2>Pagos.</h2></center><br>

		<?php 
			//seleccionamos la informacion de cliente
            $id = $_SESSION['idclientes'];       
            //seleccionamos el paquete del cliente
            $all = "SELECT * FROM pagos inner join clientes on pagos.idclientes=clientes.idclientes inner join paquetes on pagos.idpaquetes=paquetes.idpaquetes
            WHERE  pagos.idclientes= '$id'";
            $eje = mysqli_query($conect, $all);
            $listaT = mysqli_fetch_array($eje); 

            if($listaT==NULL){
			?>
			<center>
			<h2>No tiene ningun pago en su cuenta.</h2>
			<h3>¿Quiere adquirir alguno servicio? Consulte aquí</h3><i class="far fa-hand-point-right"></i><a href="index2_package.php">  Paquetes </a><i class="far fa-hand-point-left"></i>
			</center>
			<?php 
			}else{
			?>
			<?php
			//establecemos zona horaria
			date_default_timezone_set('America/Mexico_City');
			setlocale(LC_TIME, 'es_MX.UTF-8');
			$fecha_actual = date("Y-m-d"); 
             
			for($h=0; $h<$listaT; $h++){ 
			?>
			<!-- Si no-->
			<center>
			<div class="invoice-box">
			  <table cellpadding="0" cellspacing="0">
			    <tr class="top">
			      <td colspan="4">
			        <table>
			          <tr>
			            <td class="title">
			              <img src="img/logo2.png" style="width:200px; max-width:400px;">
			              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			            </td>
			            <td style="text-align: right;">
                            Referencia de Pago: <?php echo$listaT['idpagos']; ?><br> Paquete: <?php echo$listaT['nombreP']; ?><br> Limite Casas:<?php echo$listaT['casasP']; ?><br>
			            </td>
			            <td><a href="pdf.php?var=<?php echo $listaT["idpagos"].""; ?>"><button>Imprimir factura</button></a></td>
			          </tr>
			        </table>
			      </td>
			    </tr>
			</center>
			    

			  </table>
			</div>
			<div class="container">
  <div class="card">
<div class="card-header">
Fecha:
<strong><?php echo$listaT['FechaCompraP']; ?></strong> 
  <span class="float-right"> <strong>Fecha que expirá:</strong><?php echo$listaT['FechaVenP']; ?></span>

</div>

</div>
</div>
		
			<?php
			$listaT = mysqli_fetch_array($eje);
			} 
			}
			?>
		<br><br><br><br><br><br><br><br><br><br><br><br>


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