<?php

//db connection
include('includes/config.php');
include('vendor/autoload.php');



//get invoices data
$sql ="SELECT * FROM tblemployees WHERE EmpId='SPT18CS010'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)

{         

     
   
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
<th rowspan="2">'.$result->FirstName.'</th> 
<th rowspan="2">Designation</th>
<th rowspan="2">Department</th>
<th colspan="6">No of leaves taken till date </th>
<th colspan="6">NO of leaves taken on current month</th>';
$html .= '</tr>';
$html .= '<tr align="center">
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
</tr>';

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

echo $html;


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