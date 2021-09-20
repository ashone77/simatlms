<?php

//db connection
include('includes/config.php');
include('vendor/autoload.php');

  $sql = "SELECT tblprincipal.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblemployees.Designation,tblemployees.Department,tblemployees.lv_casual,tblprincipal.LeaveType,tblprincipal.PostingDate,tblprincipal.Status,tblprincipal.ToDate,tblprincipal.FromDate from tblprincipal join tblemployees on tblprincipal.empid=tblemployees.EmpId order by tblprincipal.FromDate asc";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  $finalData;
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
<th rowspan="2">From Date</th> 
<th rowspan="2">To Date</th> 
<th rowspan="2">First Name</th> 
<th rowspan="2">Last Name</th>
<th rowspan="2">Designation</th>
<th rowspan="2">Department</th>
<th colspan="6">No of leaves taken till date </th>';
$html .= '</tr>';
$html .= '<tr align="center">
<th>CL</th>
<th>COL</th>
<th>HPL</th>
<th>DL</th>
<th>LOP</th>
<th>EL</th>
</tr>';



  if($query->rowCount() > 0)
  {
       

  foreach($results as $result)
  {         
        


$html .= '<tr>
<td>'.$cnt.'</td>
<td>'.$result->FromDate.'</td>
<td>'.$result->ToDate.'</td>
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

</tr>';

;
$cnt++;

}

echo $html;

} else {
  $html = "Not found";
  echo $html;
}
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = time().'.pdf';
$mpdf->output($file,'I');
