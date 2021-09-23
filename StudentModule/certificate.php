<?php
require('vendor/autoload.php');
$con=mysqli_connect('localhost','root','','studentmodule');
$res=mysqli_query($con,"select * from bonafide_cert");




//adding html by :D
while($row=mysqli_fetch_assoc($res)){

$tot=$row['CurrYear'] + $row['AdmssnYear'];


$cert='<html>
<link rel="stylesheet" href="cert.css">
<body>';
$cert.='
<header>
        <img   class="header" src="header.jpeg" alt="header">
    </header>

<section class="content">

      <h4  style="font-size:1.1rem;">No. SIMAT/ACAD/103/2021-22/...'.$row['DocumentNumber'].'... (Doc.No)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date : '. date("Y/m/d").'</h4>
       
    <h4 style="font-size:1.1rem;">To<br>
    <style="font-size:1.1rem;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Bank Manager<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bank Name ……'.$row['BankName'].'…<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bank Branch …'.$row['BankBranch'].'...<br></p>
    Sir,<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub: Availing of Bank Loan in respect of Mr/Ms .....'.$row['FirstName'].'..'.$row['LastName'].'....</h4>
              <p class="s">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to Certify that <b>Mr/Ms .....'.$row['FirstName'].'..'.$row['LastName'].'....</b> is a bonafide <b>(I/II/III/IV)…'.$row['CurrYear'].'….</b>year student of this institution in the 4 year <b>B. Tech Degree Course(…'.strtoupper($row['Department']).'… Branch)</b> admitted in merit based selection process for the academic year <b>(Yr.of Admn)…'.$row['AdmssnYear'].'...</b> bearing <b>Admission No:…'.$row['AdmssnNo'].'….</b>. This certificate is issued to the candidate to get the bank loan sanctioned from <b>(Bank Name & Branch) ...'.$row['BankName'].'…'.$row['BankBranch'].'.</b> The fee structure pertaining to the period of study is given below.
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
        <td class="data">...</td>
        <td class="data">...</td>
        <td class="data">...</td>
        <td class="data">...</td>
        
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
        <td class="data">...</td>
        <td class="data">...</td>
        <td class="data">...</td>
        <td class="data">...</td>
    </tr>
    <tr>
        <td>Transportation Fee</td>
        <td class="data">...</td>
        <td class="data">...</td>
        <td class="data">...</td>
        <td class="data">...</td>
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
</p>
<h4 class="principal">Principal</b></h4>

</section>
<footer>
        <img   class="footer" src="footer.jpeg" alt="header">
    </footer>
</div>';





$cert.='</body></html>';
}




// if(mysqli_num_rows($res)>0)
//     {
//         $html='<table>';
//             $html.='<tr>
//             <td>ID</td>
//             <td>Name</td>
//             <td>Email</td>
//             </tr>';
//         while($row=mysqli_fetch_assoc($res))
//         {
//             $html.='<tr>
//             <td>'.$row['ID'].'</td>
//             <td>'.$row['Name'].'</td>
//             <td>'.$row['Email'].' </td>
//             </tr>';
//         }
//         $html.='</table>';
//         echo $html;
//     }  
//     else
//     {
//         echo "Data not found!!";

//     } 



//converting to pdf

$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($cert);
$file=time().'.pdf';
$mpdf->output($file,'I');

//I to show pdf in the browser
//F downloads and saves in specified file in before time()
?> 