<?php
require('fpdf184/fpdf.php');

//db connection
include('includes/config.php');

//get invoices data
$query = mysqli_query($con,"select * from invoice
	inner join clients using(clientID)
	where
	invoiceID = '".$_GET['invoiceID']."'");
$invoice = mysqli_fetch_array($query);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'Gemul Cars Co',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line






















$pdf->Output();
?>
