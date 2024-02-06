<?php
require ('fpdf/fpdf.php');
include 'z_serv.php';
$v4 = $_GET['var'];
$pag="SELECT * FROM pagos inner join paquetes on pagos.idpaquetes=paquetes.idpaquetes inner join clientes on pagos.idclientes=clientes.idclientes WHERE idpagos = '$v4'";
$resultado = mysqli_query($conect, $pag);
$listaT = mysqli_fetch_array($resultado);


$pdf=new FPDF();  //crea el objeto
$pdf->AddPage();  //añadimos una página.


//logo de la tienda
$pdf->Image('img/logo2.png',5,5,20);;

// Encabezado de la factura
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190, 10, "FACTURA", 0, 2, "C");
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(190,5, utf8_decode("Número de factura: ").$listaT['idpagos'], 0, "C", false);
$pdf->Ln(2);

// Datos del pago
$pdf->SetFont('Arial','B',12);
$top_datos=45;
$pdf->SetXY(40,50);
$pdf->Cell(190, 10, "Datos del pago:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(190, 
5, 
utf8_decode("Nombre del paquete:".$listaT['nombreP']."\n").
utf8_decode("Precio:".$listaT['precio'] ." \n").
utf8_decode("Fecha de Compra:".$listaT['FechaCompraP']." \n").
utf8_decode("Fecha de Vencimiento:".$listaT['FechaVenP']." \n"),
 0, 
 "J", 
 false);


// Datos del cliente
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(125,50);
$pdf->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(
190, 
5, 
utf8_decode("Nombre:".$listaT['nombre']." \n").
utf8_decode("Apellidos:".$listaT['apellidos']." \n").
utf8_decode("Correo:".$listaT['correo']." \n").
utf8_decode("Dirección:".$listaT['direccion']." \n").
utf8_decode("Teléfono:".$listaT['telefono']." "), 
0, 
"J", 
false);

$pdf->Output();//cierra el objeto pdf
?>