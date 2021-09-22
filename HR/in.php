<?php
//db connection
include('includes/config.php');

$sql = "SELECT tblprincipal.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblemployees.Designation,tblemployees.Department,tblemployees.lv_casual,tblprincipal.LeaveType,tblprincipal.PostingDate,tblprincipal.Status,tblprincipal.ToDate,tblprincipal.FromDate from tblprincipal join tblemployees on tblprincipal.empid=tblemployees.EmpId order by tblprincipal.FromDate asc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>HTML to PDF Eample</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="html2pdf.bundle.min.js"></script>
        <style>
            
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
        

		<script>
			function generatePDF() {
				// Choose the element that our invoice is rendered in.
				const element = document.getElementById('invoice');
				// Choose the element and save the PDF for our user.
				html2pdf().from(element).save();
			}
		</script>
	</head>
	<body>
	
		<div id="invoice">
        <table style="width:100%">
  <tr>
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
  </tr>
     <?php
     
     $cnt = 1;
     if($query->rowCount() > 0){ 
        foreach($results as $result){ ?>
         <tr>
         <td><?php echo htmlentities($cnt);?></td>
            <td><?php echo htmlentities($result->FromDate);?></td> 
            <td><?php echo htmlentities($result->ToDate);?></td>
            <td><?php echo htmlentities($result->FirstName);?></td> 
            <td><?php echo htmlentities($result->LastName);?></td>
            <td><?php echo htmlentities($result->Designation);?></td> 
            <td><?php echo htmlentities($result->Department);?></td>
         
            <td><?php echo htmlentities($result->lv_casual);?>  </td>
            <td>  &nbsp;&nbsp;&nbsp;&nbsp;- </td>
            <td>  &nbsp;&nbsp;&nbsp;&nbsp;- </td>
            <td>  &nbsp;&nbsp;&nbsp;&nbsp;- </td>
            <td>  &nbsp;&nbsp;&nbsp;&nbsp;- </td>
            <td>  &nbsp;&nbsp;&nbsp;&nbsp;- </td>
        </tr><?php
    $cnt++;
     } }?>



 
</table> <br>
<h4 style="text-align: right;"><button onclick="generatePDF()">Download as PDF</button></h4>


       
           
                 
	</body>
</html>