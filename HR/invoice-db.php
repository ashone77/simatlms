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
    
$html = '<table>';
$html .= '<tr><td>FirstName</td></tr>';
$html .= '<tr><td>'.$result->FirstName.'</td></tr>';
echo $html;


    




}

}

?>