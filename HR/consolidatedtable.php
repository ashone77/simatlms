<?php
use Mpdf\Tag\SetPageFooter;
use Mpdf\Utils\Arrays;

function fetch_data(){
    include('./includes/config.php');

    $output = '';
    $sql = "SELECT tblprincipal.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblemployees.Designation,tblemployees.Department,tblemployees.lv_casual,tblprincipal.LeaveType,tblprincipal.PostingDate,tblprincipal.Status,tblprincipal.ToDate,tblprincipal.FromDate from tblprincipal join tblemployees on tblprincipal.empid=tblemployees.EmpId order by tblprincipal.FromDate asc";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if($query->rowCount() > 0){ 
        foreach($results as $result){ 
            $output .= '
        <tr>
            <td>'.$cnt.'</td>
            <td>'.$result->FromDate.'</td>
            <td>'.$result->ToDate.'</td>
            <td>'.$result->FirstName.'</td>
            <td>'.$result->LastName.'</td>
            <td>'.$result->Designation.'</td>
            <td>'.$result->Department.'</td>
            <td>'.$result->lv_casual.'</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;-</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;-</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;-</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;-</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;-</td>
        </tr>'; $cnt++;
        }
    }
    return $output;

}

if(isset($_POST["create_pdf"])){
    
    require_once('tcpdf/tcpdf.php');
    $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
    $obj_pdf->SetFont('helvetica', '', 8);

    $content = '';

    $content .= '    
    <head>
    <style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
</style>
</head>
    <table width=100%>
    <tr>
        <th rowspan="2" >SL.NO</th>
        <th rowspan="2">FromDate</th> 
        <th rowspan="2">ToDate</th> 
        <th rowspan="2">FirstName</th> 
        <th rowspan="2">LastName</th>
        <th rowspan="2">Designation</th>
        <th rowspan="2">Department</th>
        <th colspan="6">No of leaves taken till date </th>
    </tr>
    <tr align="center">
        <th>CL</th>
        <th>COL</th>
        <th>HPL</th>
        <th>DL</th>
        <th>LOP</th>
        <th>EL</th>
    </tr>
    ';

    $content .= fetch_data();

    $content .= '</table>';

    $obj_pdf->writeHTML($content);
    $obj_pdf->Output("Consolidated_Leave.pdf", "I");



}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolidated Table</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
    </style>
</head>
<body>
        <table width=100%>
            <tr>
                <th rowspan="2" >SL. NO</th>
                <th rowspan="2">From Date</th> 
                <th rowspan="2">To Date</th> 
                <th rowspan="2">First Name</th> 
                <th rowspan="2">Last Name</th>
                <th rowspan="2">Designation</th>
                <th rowspan="2">Department</th>
                <th colspan="6">No of leaves taken till date </th>
            </tr>
            <tr align="center">
                <th>CL</th>
                <th>COL</th>
                <th>HPL</th>
                <th>DL</th>
                <th>LOP</th>
                <th>EL</th>
            </tr>
            <?php echo fetch_data();?>
        </table>

        <form method="post">
            <input type="submit" name="create_pdf" id="create_pdf" value="submit">
        </form>
</body>
</html>