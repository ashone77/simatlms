<?php

///Coded by :D

session_start();
error_reporting(0);
$docno = $_GET['documentno'];
use Mpdf\Tag\P;

include('./includes/config.php');
$dbh;
$con=mysqli_connect('localhost','root','','studentmodule');
// $res=mysqli_query($con,"select * from bonafide_cert");
 $did = $_POST["Ano"];

    $sql = "select * from bonafide_cert where DocumentNumber=:docno";
    
    $query = $GLOBALS['dbh'] -> prepare($sql);
    $query->bindParam(':docno',$docno,PDO::PARAM_STR);

    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    
    if($query->rowCount() > 0)



    {
    foreach($results as $result)
    {   
        
       


require_once('tcpdf/tcpdf.php');
    
   
   


$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$obj_pdf->SetFooterMargin(0);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 0);
    // $obj_pdf->SetHeaderData('<img src="header.jpeg>');
    // $obj_pdf->SetHeaderData('<img src="footer.jpeg>');
    $obj_pdf->SetMargins(5,0,5);
    $obj_pdf->AddPage();
    
    
        
    
    // $obj_pdf->SetCreator(PDF_CREATOR);
    // $obj_pdf->SetTitle("Consolidated Leaves");
    // $obj_pdf->SetHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    // $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'', PDF_FONT_SIZE_MAIN));
    // $obj_pdf->setFooterFont(Array(PDF_FONT_SIZE_DATA, '', PDF_FONT_SIZE_DATA));
    // $obj_pdf->SetDefaultMonospacedFont('helvetica');
    // $obj_pdf->setFooterMargin(PDF_MARGIN_FOOTER);
    // $obj_pdf->SetMargins(PDF_MARGIN_LEFT,'', PDF_MARGIN_RIGHT);
   
    // $obj_pdf->SetAutoPageBreak(True, 10);
    // $obj_pdf->SetFont('helvetica', '', 7);
        $Cert='';
    $Cert.= '
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
    .s-container{
        width:100%;
        text-align:justify;
        font-size:11.6rem; 
       }
    
    </style>

</head>
<body>
<header>
<img  class="header"  src="header.jpeg" alt="header">
</header>
<section class="container">

      <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. SIMAT/ACAD/103/2021-22/'.$result->DocumentNumber.' (Doc.No)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date : '. date("Y/m/d").'</h4>
    <h4 style="width:10rem;">
    To<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Bank Manager<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$result->BankName.'<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$result->BankBranch.'<br>
    Sir,<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub: Availing of Bank Loan in respect of Mr/Ms '.$result->FirstName.' '.$result->LastName.'</h4>
              <p class="s-container">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to Certify that <b>Mr/Ms &nbsp;'.$result->FirstName.' '.$result->LastName.' </b> is a bonafide <b>(I/II/III/IV)&nbsp;&nbsp;'.$result->CurrYear.'&nbsp;&nbsp;</b>year student of this institution in the 4 year <b>B. Tech Degree Course ('.$result->Department.'  Branch)</b> admitted in merit based selection process for the academic year <b>(Yr.of Admn) '.$result->AdmssnYear.'</b> bearing <b>Admission No: '.$result->AdmssnNo.'</b>. This certificate is issued to the candidate to get the bank loan sanctioned from <b>(Bank Name & Branch) '.$result->BankName.'  '.$result->BankBranch.'</b>. The fee structure pertaining to the period of study is given below.
                 <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Institution is approved by AICTE, New-Delhi vide letter F. No. South-West/1-9317992659/2021/EOA dt. 15/07/2021, affiliated to APJ Abdul Kalam Technological University, Thiruvananthapuram vide No.KTU/A/456/2015 Dated, Thiruvananthapuram,10/08/2021 and also approved by Govt. of Kerala vide G.O.(MS) No.82/09/H.Edn dt 04/07/09.
                </p>         
    <table cellspacing="0" cellpadding="3" border="1">
    <tr style="text-align: center; font-weight:bold">
    <th style="padding:50rem;">Particulars</th>
    <th>Ist year(Rs.)</th>
    <th>2nd year(Rs.)</th>
    <th>3rd year(Rs.)</th>
    <th>4th year(Rs.)</th>
        </tr>
        <tr style="text-align:center;">
        <td>Tuition Fee.</td>
        <td class="data">'.$result->TuitionFirst.'</td>
        <td class="data">'.$result->TuitionSecond.'</td>
        <td class="data">'.$result->TuitionThird.'</td>
        <td class="data">'.$result->TuitionFourth.'</td>
    </tr>
    <tr style="text-align: center;">
    <td>Caution Deposit</td>
    <td class="data">10,000</td>
    <td class="data">NIL</td>
    <td class="data">NIL</td>
    <td class="data">NIL</td>
</tr>
<tr style="text-align: center;">
    <td>Special Fee</td>
    <td class="data">10,000</td>
    <td class="data">10,000</td>
    <td class="data">10,000</td>
    <td class="data">10,000</td>
</tr>
<tr style="text-align: center;">
    <td>Placement & Training Fee.</td>
    <td class="data">NIL</td>
    <td class="data">500</td>
    <td class="data">750</td>
    <td class="data">1250</td>
</tr>
<tr style="text-align: center;">
    <td>Hostel Fee</td>
    <td class="data">'.$result->HstlFirst.'</td>
    <td class="data">'.$result->HstlSecond.'</td>
    <td class="data">'.$result->HstlThird.'</td>
    <td class="data">'.$result->HstlFourth.'</td>
</tr>
<tr style="text-align: center;">
    <td>Transportation Fee</td>
    <td class="data">'.$result->TrFirst.'</td>
    <td class="data">'.$result->TrSecond.'</td>
    <td class="data">'.$result->TrThird.'</td>
    <td class="data">'.$result->TrFourth.'</td>
</tr>
<tr style="text-align: center; font-weight:bold">
    <td>Total</td>
    <td class="data">'.intval($result->TuitionFirst+$result->HstlFirst+$result->TrFirst+10000+10000).'</td>
    <td class="data">'.intval($result->TuitionSecond+$result->HstlSecond+$result->TrSecond+10000+500).'</td>
    <td class="data">'.intval($result->TuitionThird+$result->HstlThird+$result->TrThird+10000+750).'</td>
    <td class="data">'.intval($result->TuitionFourth+$result->HstlFourth+$result->TrFourth+10000+1250).'</td>
</tr> 
</table>
            <p class="s-container"><b>
                It is requested that the payment may please be released to us by DD/Online Transfer (Bank Account No: 31042301293 & IFSC: SBIN0013222, SBI Koottanad) under intimation to this office.
            </p><br>
            <h4 class="principal" style="text-align:right;">Principal</b></h4>
            
</section>

<footer>
        <img class="footer" src="footer.jpeg" alt="footer">
    </footer>

</div>

</body>
</html>





';
// class PDF extends TCPDF { 
//     public function Header() { 
//     // No Header 
//     } 
//     public function Footer() { 
//     // No Footer 
//     } 
// } 


    $obj_pdf->writeHTML($Cert);
    $obj_pdf->Output("certificate.pdf", "I");
    }
    }


?>

