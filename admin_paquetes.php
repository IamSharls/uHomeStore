<?php
session_start();
include 'z_serv.php';
                   
//<------------Eliminar------------->//
if(isset($_GET['var1'])){

	//recuperar la variable
    $v1 = $_GET['var1'];
    //sentencia sql//
    $sql3="DELETE FROM paquetes WHERE idpaquetes='$v1'"; 
    //ejecutamos la centencia de sql
    $ejecutar3=mysqli_query($conect, $sql3);
    //verificacion de la ejecucioon
    if(!$ejecutar3){
    	unset($_GET['var1']);
        echo '<script> alert("Este paquete no se puede eliminar porque se tienen usuarios que utilizan este paquete, una vez finalizado sus subscripciones se podrá eliminar");</script>';
    }else{
    	unset($_GET['var1']);
        echo '<script> alert("Paquete eliminado");</script>';
        echo '<script> window.location="admin_paquetes.php"; </script>'; 
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
            //seleccionamos todos los elementos dentro de la tabla paquetes
            $all2= "SELECT * FROM paquetes";
            $eje2= mysqli_query($conect,$all2);
            $listaT2 = mysqli_fetch_array($eje2);//0
            $listaT2 = mysqli_fetch_array($eje2);//1
            	//mostramos todo el contenido
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
                <button onclick="return checkDelete()">Modificar</button>
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
				if(isset($_POST['save'])){
            
				$campo1 = $_POST["campo1"];//nombre
				$campo2 = $_POST["campo2"];//apellido
                $campo3 = $_POST["campo3"];//correo
                $campo4 = $_POST["campo4"];//correo
                
				//insertamos datos dentro de la tabla paquetes
                $al = "INSERT INTO `paquetes` (
                `idpaquetes`, 
                `nombreP`, 
                `meses`, 
                `precio`,
                `casasP`) VALUES (
                NULL, 
                '$campo1', 
                '$campo2',
                '$campo3', 
                '$campo4');";
             
				$insert = mysqli_query($conect, $al);
                unset($save);    
				if($insert){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos generales han sido guardados con éxito.</div>';
                echo '<script> alert("Datos ingresados");</script>';
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
						<input type="text" name="campo1" class="form-control" maxlength="16" placeholder="Nombres" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Meses</label>
					<div class="col-sm-4">
						<input type="number" name="campo2" class="form-control" onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;" required /> 
					</div>
				</div>
				
               <div class="form-group">
					<label class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-3">
						<input type = "number" name="campo3" class="form-control" placeholder="12.00" onKeyDown="if(this.value.length==12 && event.keyCode!=8) return false;" required>
					</div>
               </div>
               <div class="form-group">
					<label class="col-sm-2 control-label">Limite Casas</label>
					<div class="col-sm-3">
						<input type = "number" name="campo4" class="form-control" placeholder="12" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" required>
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