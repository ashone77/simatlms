<?php
require('fpdf184/fpdf.php');

//db connection
include('includes/config.php');

//get invoices data
$sql ="SELECT * FROM tblemployees WHERE EmpId='SPT18CS010'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{         


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,$result->FirstName,0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line
}

}

$pdf->Output();
?>