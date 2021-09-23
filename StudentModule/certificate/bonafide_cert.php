<?php

use Mpdf\Tag\P;

include('./includes/config.php');
$dbh;
$con=mysqli_connect('localhost','root','','studentmodule');
$res=mysqli_query($con,"select * from bonafide_cert");
// $did = $_GET['documentnumber'];

    $sql = "select * from bonafide_cert where DocumentNumber=1";
    $query = $GLOBALS['dbh'] -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {   

    // $query->bindParam(':did',$lid,PDO::PARAM_STR);



require_once('tcpdf/tcpdf.php');
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->AddPage();
    // $obj_pdf->SetCreator(PDF_CREATOR);
    // $obj_pdf->SetTitle("Consolidated Leaves");
    // $obj_pdf->SetHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    // $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'', PDF_FONT_SIZE_MAIN));
    // $obj_pdf->setFooterFont(Array(PDF_FONT_SIZE_DATA, '', PDF_FONT_SIZE_DATA));
    // $obj_pdf->SetDefaultMonospacedFont('helvetica');
    // $obj_pdf->setFooterMargin(PDF_MARGIN_FOOTER);
    // $obj_pdf->SetMargins(PDF_MARGIN_LEFT,'', PDF_MARGIN_RIGHT);
    // $obj_pdf->setPrintHeader(false);
    // $obj_pdf->setPrintFooter(false);
    // $obj_pdf->SetAutoPageBreak(True, 10);
    $obj_pdf->SetFont('helvetica', '', 7);

    $Cert = '
    
    //add code here!!!!!
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ';


    $obj_pdf->writeHTML($Cert);
    $obj_pdf->Output("cert.pdf", "I");
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>