<?php
session_start();
//conctamos con el servidor
include 'z_serv.php';


//<------------Eliminar------------->//
if(isset($_GET['var1'])){
	//recuperamos variable
	$v1 = $_GET['var1'];
    //sentencia sql//
    $sql3="DELETE FROM empleados WHERE idempleados='$v1'"; 
    //ejecutamos la centencia de sql
    $ejecutar3=mysqli_query($conect, $sql3);
    //verificacion de la ejecucioon
    if(!$ejecutar3){
    	unset($_GET['var1']);
        echo '<script> alert("Este empleado no se puede eliminar porque es tiene inmuebles o citas a su nombre, libere estos para poder despedirlo");</script>';
    }else{
    	unset($_GET['var1']);
        echo '<script> alert("Empleado eliminado");</script>';
        echo '<script> window.location="admin_empleados.php"; </script>'; 
    }
}                 
//<------------Eliminar------------->//


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
						<li class="active"><a href="#">Empleados</a></li>
						<li><a href="admin_inmueblesTotales.php">Inmuebles</a></li>
						<li><a href="admin_empleadoInsertar.php">Registro Empleados</a></li>
						<li><a href="admin_inmueble.php">Registro Inmuebles</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<div class = "section" style="width: 80%; margin-left: 100px;">
			
			<table class="table">
			<thead class="thead">
				<tr class="tr">
					<th class="th">Nombres de Empleado</th><th class="th">apellido</th><th class="th">correo</th><th class="th">telefono</th><th class="th">puesto</th><th class="th">x</th><th class="th">x</th>
				</tr>
			</thead>
            <?php
            //seleccionamos todo el contenido de empleado y lo mostramos
            $all2= "SELECT * FROM empleados";
            $eje2= mysqli_query($conect,$all2);
            $listaT2 = mysqli_fetch_array($eje2); 
                for($h=0; $h<$listaT2; $h++){ 
            ?>                
			    <tr class="tr">
                                 
				<td class="td">
		        <?php echo$listaT2['nombreE']; ?>
		        </td>

		        <td class="td">
		        <?php echo$listaT2['apellidoE']; ?>
		        </td>
                
                <td class="td">
		        <?php echo$listaT2['correo']; ?>
		        </td>
                                 
                <td class="td">
		        <?php echo$listaT2['telefono']; ?>
		        </td>

		        <td class="td">
		        <?php echo$listaT2['puesto']; ?>
		        </td>

                    
                <?php $k4= $listaT2["idempleados"]; ?>    
                <td class="td">   
                <?php  echo '<a href="admin_empleados.php?var1='.$k4.'">'; ?>
                <button onclick="return checkDelete()">Eliminar</button>
                </a>
                </td>
                    
                <?php $k4= $listaT2["idempleados"];  ?>  
                <td class=td>    
                <?php  echo '<a href="z_Modificarempleado.php?var3='.$k4.'">'; ?>
                <button  onclick="return checkDelete()">Modificar</button>
                </a>
                </td>
            
			    </tr>

			    <?php
                $listaT2 = mysqli_fetch_array($eje2);
                }
			    ?>
                                

                                
		</table>
			
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