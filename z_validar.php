<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
		<?php
			//contecamos servidor
			include 'z_serv.php';
			//verificamos datos enviados del login
			if(isset($_POST['login'])){
				//recuperamos variable
				$usuario = $_POST['user'];
				$pw = $_POST['pw'];
           		//verificamos usuario de la tabla clientes
				$log ="SELECT * FROM clientes WHERE usuario='$usuario' and pw='$pw'";
			
                $filas= mysqli_query($conect,$log);
				if (mysqli_num_rows($filas)>0) {
                
					$row = mysqli_fetch_array($filas);
                    $_SESSION["idclientes"] = $row['idclientes'];
                    $_SESSION["usuario2"] = $row['usuario'];
                    $_SESSION["nombre"] = $row['nombre'];
                    
                    //extra
					echo '<script> window.location = "index2.php"; </script>';
				}
				else{
                    //administrador//
               		//verificamos usuario de la tabla empleados
                    $log2 ="SELECT * FROM empleados WHERE usuario='$usuario' and pw='$pw'";
                   
                    $filas2= mysqli_query($conect,$log2);
                    
                    if (mysqli_num_rows($filas2)>0) {
                        
					$row = mysqli_fetch_array($filas2);
                    $_SESSION["nombreE"] = $row['nombreE'];
                    $_SESSION["idempleados"] = $row['idempleados'];
                    //extra
				  	echo 'Iniciando sesión para '.$_SESSION['nombreE'].' <p>';
					echo '<script> window.location="empleado.php"; </script>';
				    }
				    else{
				    	//administrador//
               		//verificamos usuario de la tabla administrador
                    $log3 ="SELECT * FROM admin WHERE admin='$usuario' and pw='$pw'";
                   
                    $filas3= mysqli_query($conect,$log3);
                    
                    if (mysqli_num_rows($filas3)>0) {
                        
					$row = mysqli_fetch_array($filas3);
					
                    $_SESSION["admin"] = $row['admin'];
                   
				  	echo 'Iniciando sesión para '.$_SESSION['admin'].' <p>';
					echo '<script> window.location="admin_inmueblesTotales.php"; </script>';
				    }
                    
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="index.php?password=sasdasdad&cfmPassword=asdadadasdasdasdas#openModal"; </script>';
				}
			}
		}
		?>	
</body>
</html>