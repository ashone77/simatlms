<?php
//index.php
//include autoloader

require_once 'dompdf/autoload.inc.php';

//connecting database...
$con=mysqli_connect('localhost','root','','studentmodule');
$res=mysqli_query($con,"select * from bonafide_cert where DocumentNumber=1");


// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();

while($row=mysqli_fetch_assoc($res)){


    $cert='<html>
<link rel="stylesheet" href="cert.css">
<body>';
$cert.='
<header>
        <img   class="header" src="header.jpeg" alt="header">
    </header>

<section class="content">

      <h4  style="font-size:1.1rem;">No. SIMAT/ACAD/103/2021-22/…….. (Doc.No)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date : '. date("Y/m/d").'</h4>
       
    <h4 style="font-size:1.1rem;">To<br>
    <style="font-size:1.1rem;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Bank Manager<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bank Name …………..<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bank Branch ………………<br>
    Sir,<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub: Availing of Bank Loan in respect of Mr/Ms. ………'.$row['FirstName'].'…………</h4>
              <p class="s">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to Certify that <b>Mr/Ms……………….</b> is a bonafide  (I/II/III/IV)…………….. year student of this institution in the 4 year <b>B. Tech Degree Course(…………………… Branch)</b> admitted in merit based selection process for the academic year (Yr.of Admn)) ……………. bearing <b>Admission No:………………….</b>. This certificate is issued to the candidate to get the bank loan sanctioned from <b>(Bank Name & Branch) …………….</b>. The fee structure pertaining to the period of study is given below.
                 <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Institution is approved by AICTE, New-Delhi vide letter F. No. South-West/1-9317992659/2021/EOA dt. 15/07/2021, affiliated to APJ Abdul Kalam Technological University, Thiruvananthapuram vide No.KTU/A/456/2015 Dated, Thiruvananthapuram,10/08/2021 and also approved by Govt. of Kerala vide G.O.(MS) No.82/09/H.Edn dt 04/07/09.</p>              
</p>

<table border="1" cellpadding="4"  style="border-collapse:collapse;">

    <tr>
<th>Particulars</th>
<th>Ist year(Rs.)</th>
<th>2nd year(Rs.)</th>
<th>3rd year(Rs.)</th>
<th>4th year(Rs.)</th>
    </tr>
    <tr>
        <td>Tuition Fee.</td>
        <td class="data">.....</td>
        <td class="data">.....</td>
        <td class="data">.....</td>
        <td class="data">.....</td>
        
    </tr>
    <tr>
        <td>Caution Deposit</td>
        <td class="data">10,000</td>
        <td class="data">NIL</td>
        <td class="data">NIL</td>
        <td class="data">NIL</td>
    </tr>
    <tr>
        <td>Special Fee</td>
        <td class="data">10,000</td>
        <td class="data">10,000</td>
        <td class="data">10,000</td>
        <td class="data">10,000</td>
    </tr>
    <tr>
        <td>Placement & Training Fee.</td>
        <td class="data">NIL</td>
        <td class="data">500</td>
        <td class="data">750</td>
        <td class="data">1250</td>
    </tr>
    <tr>
        <td>Hostel Fee</td>
        <td class="data">.....</td>
        <td class="data">.....</td>
        <td class="data">.....</td>
        <td class="data">.....</td>
    </tr>
    <tr>
        <td>Transportation Fee</td>
        <td class="data">.....</td>
        <td class="data">.....</td>
        <td class="data">.....</td>
        <td class="data">.....</td>
    </tr>
    <tr>
        <td><b>Total<b></td>
        <td class="data"></td>
        <td class="data"></td>
        <td class="data"></td>
        <td class="data"></td>
    </tr>
</table>
<p class="s-container"><b>
    It is requested that the payment may please be released to us by DD/Online Transfer (Bank Account No: 31042301293 & IFSC: SBIN0013222, SBI Koottanad) under intimation to this office.
</p><br>
<h4 class="principal">Principal</b></h4>

</section>
<footer>
        <img   class="footer" src="footer.jpeg" alt="header">
    </footer>
</div>';

}
//$document->loadHtml($cert);

//$document->loadHtml($page);

// $connect = mysqli_connect("localhost", "root", "", "studentmodule");

// $query = "
// 	SELECT * FROM bonafide_cert WHERE DocumentNumber=1;
	
// ";
// $result = mysqli_query($connect, $query);

// $output = "
// 	<style>
// table {
//     font-family: arial, sans-serif;
//     border-collapse: collapse;
//     width: 100%;
// }

// td, th {
//     border: 1px solid #dddddd;
//     text-align: left;
//     padding: 8px;
// }

// tr:nth-child(even) {
//     background-color: #dddddd;
// }
// </style>
// <table>
// 	<tr>
// 		<th>Category</th>
// 		<th>Product Name</th>
// 		<th>Price</th>
// 	</tr>
// ";

// while($row = mysqli_fetch_array($result))
// {
// 	$output .= '
// 		<tr>
// 			<td>'.$row["FirstName"].'</td>
// 			<td>'.$row["LastName"].'</td>
// 			<td>$'.$row["Quota"].'</td>
// 		</tr>
// 	';
// }



//echo $output;

$document->loadHtml($cert);

//set page size and orientation

$document->setPaper('A4', 'portrait');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Webslesson", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>