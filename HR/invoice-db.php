<?php

//db connection
include('includes/config.php');
include('vendor/autoload.php');

?>

<!-- //get invoices data
// $sql ="SELECT * FROM tblemployees WHERE EmpId='SPT18CS010'";
// $query = $dbh -> prepare($sql);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
// if($query->rowCount() > 0)
// {
// foreach($results as $result)

// {          -->

     
  <?php 
  $sql = "SELECT tblprincipal.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblemployees.Designation,tblemployees.Department,tblemployees.lv_casual,tblprincipal.LeaveType,tblprincipal.PostingDate,tblprincipal.Status from tblprincipal join tblemployees on tblprincipal.empid=tblemployees.EmpId order by lid desc";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;

  $html = '<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>';



$html .= '<table style="width:100%"';
$html .= '<tr>';
$html .= '<th rowspan="2" >SL. NO</th>
<th rowspan="2">First Name</th> 
<th rowspan="2">Last Name</th>
<th rowspan="2">Designation</th>
<th rowspan="2">Department</th>
<th colspan="6">No of leaves taken till date </th>
<th colspan="6">NO of leaves taken on current month</th>';
$html .= '</tr>';
$html .= '<tr align="center">
<th>CL</th>
<th>COL</th>
<th>HPL</th>
<th>DL</th>
<th>LOP</th>
<th>EL</th>
<th>CL</th>
<th>COL</th>
<th>HPL</th>
<th>DL</th>
<th>LOP</th>
<th>EL</th>
</tr>';

echo $html;

  if($query->rowCount() > 0)
  {
       

  foreach($results as $result)
  {         
        


$dataRow = '<tr>
<td>'.$cnt.'</td>
<td>'.$result->FirstName.'</td>
<td>'.$result->LastName.'</td>
<td>'.$result->Designation.'</td>
<td>'.$result->Department.'</td>
<td>'.$result->lv_casual.'</td>
<td>  &nbsp;&nbsp;&nbsp;&nbsp;- </td>
<td>  &nbsp;&nbsp;&nbsp;&nbsp;- </td>
<td>  &nbsp&nbsp&nbsp&nbsp;- </td>
<td>  &nbsp;&nbsp;&nbsp;&nbsp;- </td>
<td>  &nbsp;&nbsp;&nbsp;&nbsp;- </td>
<td>'.$result->id.'</td>
<td>'.$result->id.'</td>
<td>'.$result->id.'</td>
<td>'.$result->id.'</td>
<td>'.$result->id.'</td>
<td>'.$result->id.'</td>
<td>0<td>
</tr>';

echo $dataRow;
$cnt++;

}

} else {
  $html = "Not found";
  echo $html;
}

?>

<!-- 
<table style="width:100%">
  <tr>
    <th rowspan="2">SL. NO</th>
    <th rowspan="2">Name</th> 
    <th rowspan="2">Designation</th>
    <th rowspan="2">Department</th>
    <th colspan="6">No of leaves taken till date </th>
    <th colspan="6">NO of leaves taken on current month</th> 
  </tr>
  <tr align="center">
    <th>cl</th>
    <th>col</th>
    <th>hpl</th>
    <th>dl</th>
    <th>lop</th>
    <th>el</th>
    <th>cl</th>
    <th>col</th>
    <th>hpl</th>
    <th>dl</th>
    <th>lop</th>
    <th>el</th>
  </tr>
 
</table> -->