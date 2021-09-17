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


<<<<<<< HEAD
$html .= '<tr>
<td>1</td>
<td>Name</td>
<td>Designation</td>
<td>Department</td>
<td>Casual Leave</td>
<td></td>
<td>cl</td>
<td>col</td>
<td>hpl</td>
<td>dl</td>
<td>lop</td>
<td>el</td>
<td>hpl</td>
<td>dl</td>
<td>lop</td>
<td>el</td>
</tr>';
=======
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm
>>>>>>> parent of 1748544 (Revert "Revert "Merge branch 'master' of https://github.com/ashone77/simatlms"")

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