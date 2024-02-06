<?php
session_start();
//conectamos servidor
include 'z_serv.php';
//recuperamos variable
$v5 = $_GET['var3']; 
//buscamos paquetes con variable recuperada        
$all = "SELECT * FROM paquetes WHERE idpaquetes = '$v5'";
$eje = mysqli_query($conect, $all);                   
$listaT3 = mysqli_fetch_array($eje);
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
						
						<li class="active"><a href="admin_paquetes.php">Paquetes</a></li>
						<li><a href="admin_empleados.php">Empleados</a></li>
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
					<th class="th">Nombres de Paquete</th><th class="th">Meses</th><th class="th">Precio</th><th class="th">Lim. Casas</th><th class="th">x</th><th class="th">x</th>
				</tr>
			</thead>
            <?php
            //seleccionamos todos los paquetes
            $all2= "SELECT * FROM paquetes";
            $eje2= mysqli_query($conect,$all2);
            $listaT2 = mysqli_fetch_array($eje2);
            $listaT2 = mysqli_fetch_array($eje2);
            	//mostramos todos los paquetes
                for($h=0; $h<$listaT2; $h++){ 
            	?>                
			    <tr class="tr">
                                 
				<td class="td">
		        <?php echo$listaT2['nombreP']; ?>
		        </td>

		        <td class="td">
		        <?php echo$listaT2['meses']; ?>
		        </td>
                
                <td class="td">
		        <?php echo$listaT2['precio']; ?>
		        </td>
               
                <td class="td">
		        <?php echo$listaT2['casasP']; ?>
		        </td>

                <?php $k4= $listaT2["idpaquetes"]; ?>    
                <td class="td">   
                <?php  echo '<a href="admin_paquetes.php?var1='.$k4.'">'; ?>
                <button onclick="return checkDelete()">Eliminar</button>
                </a>
                </td>
                    
                <?php $k4= $listaT2["idpaquetes"];  ?>  
                <td class=td>    
                <?php  echo '<a href="z_Modificar_admin_paquetes.php?var3='.$k4.'">'; ?>
                <button>Modificar</button>
                </a>
                </td>
            
			    </tr>

			    <?php
                $listaT2 = mysqli_fetch_array($eje2);
                }
			    ?>
                              
		</table>
			
    </div>
    	 <?php      
    	 		//verificamos datos del formulario 		        
				if(isset($_POST['save'])){
            	//recuperamos variables
				$campo1 = $_POST["campo1"];//nombre
				$campo2 = $_POST["campo2"];//apellido
                $campo3 = $_POST["campo3"];//correo
                $campo4 = $_POST["campo4"];//casas
				//modificamos tabla de paquetes
				$sql1="UPDATE paquetes SET 
                nombreP='$campo1',
                meses='$campo2',
                precio='$campo3',
                casasP='$campo4'
                WHERE idpaquetes = '$v5'";
             	
             	$insert=mysqli_query($conect, $sql1);

				if($insert){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos generales han sido modificados con éxito.</div>';
                unset($save);
        		echo '<script> window.location="admin_paquetes.php"; </script>';	
				}else{
				unset($save);
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudieron guardar los datos generales.</div>';
                           
				}
				
			}
		?>            

    	<form class="form-horizontal" action="" method="post">
         
				<div class="form-group">
					<label class="col-sm-2 control-label">Nombre del paquete</label>
					<div class="col-sm-4">
						<input type="text" name="campo1" class="form-control" value="<?php echo ''.$listaT3['nombreP']. ''; ?>"  maxlength="16" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Meses</label>
					<div class="col-sm-4">
						<input type="number" name="campo2" class="form-control" value="<?php echo ''.$listaT3['meses']. ''; ?>" onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;" required /> 
					</div>
				</div>
				
               <div class="form-group">
					<label class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-3">
						<input type = "number" name="campo3" class="form-control" value="<?php echo ''.$listaT3['precio']. ''; ?>" placeholder="12.00" onKeyDown="if(this.value.length==12 && event.keyCode!=8) return false;" required>
					</div>
               </div>
               <div class="form-group">
					<label class="col-sm-2 control-label">Limite Casas</label>
					<div class="col-sm-3">
						<input type = "number" name="campo4" class="form-control" value="<?php echo ''.$listaT3['casasP']. ''; ?>" placeholder="12.00" onKeyDown="if(this.value.length==12 && event.keyCode!=8) return false;" required>
					</div>
               </div>
       			<br><br>
       
        		<div class="form-group">
					<label class="col-sm-2 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="admin_paquetes.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>





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