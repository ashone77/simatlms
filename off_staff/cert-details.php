<?php
session_start();
error_reporting(0);
include('includes/studentconfig.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{


// code for action taken on leave
if(isset($_POST['update']))
{ 
$documentno=intval($_GET['documentnumber']);
$description=$_POST['description'];
$status=$_POST['status'];   
date_default_timezone_set('Asia/Kolkata');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="update tblleaves set AdminRemark=:description,Status=:status,AdminRemarkDate=:admremarkdate where id=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="Leave updated Successfully";
}



 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Leave Details </title>
        <link rel="shortcut icon" href="../assets/images/logo.jpeg" type="image/ico" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

                <link href="../assets/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"/>  
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
<style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body>
       <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title" style="font-size:24px;">Leave Details</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Leave Details</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                               
                                 
                                    <tbody>
<?php 
$documentno=intval($_GET['documentnumber']);
$sql = "SELECT * FROM bonafide_cert where DocumentNumber=:documentnumber";
$query = $dbh -> prepare($sql);
$query->bindParam(':documentnumber',$documentno,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>  

                                        <tr>
                                            <td style="font-size:16px;"> <b>Student Name :</b></td>
                                              <td>
                                                <?php echo htmlentities($result->FirstName." ".$result->LastName);?></a></td>
                                              <td style="font-size:16px;"><b>Admission No :</b></td>
                                              <td><?php echo htmlentities($result->AdmssnNo);?></td>
                                              
                                          </tr>

                                          <tr>
                                            <td style="font-size:16px;"><b>Department:</b></td>
                                            <td><?php echo htmlentities($result->Department);?></td>
                                            <td style="font-size:16px;"><b>Quota :</b></td>
                                            <td><?php echo htmlentities($result->Quota);?></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>

                                        <tr>
                                            <td style="font-size:16px;"><b>Certificate Type :</b></td>
                                            <td>Bonafide Certificate</td>
                                            <td style="font-size:16px;"><b>Document Number :</b></td>
                                            <td><?php echo htmlentities($result->DocumentNumber);?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:16px;"><b>Admission Year</b></td>
                                            <td><?php echo htmlentities($result->AdmssnYear);?></td>
                                            <td style="font-size:16px;"><b>Current Year</b></td>
                                            <td><?php echo htmlentities($result->CurrYear);?></td>
                                          
                                        </tr>

                                        <tr>
                                            <td style="font-size:16px;"><b>Bank Name : </b></td>
                                            <td colspan="5"><?php echo htmlentities($result->BankName);?></td></tr><tr>
                                            <td style="font-size:16px;"><b>Bank Branch Name : </b></td>
                                            <td colspan="5"><?php echo htmlentities($result->BranchName);?></td>
                                        </tr>
                                        <tr>
                                        <td style="font-size:16px;"><b>Loan Year</b></td>
                                            <td><?php echo htmlentities($result->LoanYear);?></td>
                                        </tr>
                                        <h5></h5>

<tr>
<td style="font-size:16px;"><b>Certificate Status :</b></td>
<td colspan="5"><?php $stats=$result->Status;
if($stats==1){
?>
<span style="color: green">Approved</span>
 <?php } if($stats==2)  { ?>
<span style="color: red">Not Approved</span>
<?php } if($stats==0)  { ?>
 <span style="color: blue">waiting for approval</span>
 <?php } ?>
</td>
</tr>

<?php 
if($stats==0)
{

?>
<tr>
 <td colspan="5">
  
<form name="adminaction" method="post">
<div id="modal1" class="modal modal-fixed-footer" style="height: 60%">
    <div class="modal-content" style="width:90%">
        <h4>Leave take action</h4>
          <select class="browser-default" name="status" required="">
                                            <option value="">Choose your option</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Not Approved</option>
                                        </select></p>
                                        <p><textarea id="textarea1" name="description" class="materialize-textarea" name="description" placeholder="Description" length="500" maxlength="500" required></textarea></p>
    </div>
    <div class="modal-footer" style="width:90%">
       <input type="submit" class="waves-effect waves-light btn blue m-b-xs" name="update" value="Submit">
    </div>

</div>   

 </td>
</tr>
<?php } ?>
   </form>                                     </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="">
                <div style="background:white" > 
                <h5 style="text-align: center; font-weight: bold;padding-top:10px">Enter Details</h5>
                <br><h6 style="text-align: center;font-weight: bold;">Tution Fee</h6>
                <h5 style="text-align: center;margin:5px">
                <input placeholder="First Year"  style="width: 150px;margin:25px" type="text">
                <input placeholder="Second  Year" style="width: 150px;margin:25px" type="text">
                <input style="width: 150px;margin:25px" placeholder="third Year" type="text">
                <input style="width: 150px;margin:25px" placeholder="Fourth Year"  type="text"></h5>
               
              
                
                <h6 style="text-align: center;font-weight: bold;">Hostel Fee</h6>
                <h5 style="text-align: center;margin:5px">
                <input placeholder="First Year"  style="width: 150px;margin:25px" type="text">
                <input placeholder="Second  Year" style="width: 150px;margin:25px" type="text">
                <input style="width: 150px;margin:25px" placeholder="third Year" type="text">
                <input style="width: 150px;margin:25px" placeholder="Fourth Year"  type="text"></h5>
                 
                <h6 style="text-align: center;font-weight: bold;">Transportaion Fee</h6>
                <h5 style="text-align: center;margin:5px">
                <input placeholder="First Year"  style="width: 150px;margin:25px" type="text">
                <input placeholder="Second  Year" style="width: 150px;margin:25px" type="text">
                <input style="width: 150px;margin:25px" placeholder="third Year" type="text">
                <input style="width: 150px;margin:25px" placeholder="Fourth Year"  type="text"></h5>
                <h6 style="text-align: center;font-weight: bold;"> <button  type="button" class="btn btn-primary">Submit</button</h6>
                </div>
                </form>
            </main>
         
        </div>
        <div>
            
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
         <script src="assets/js/pages/ui-modals.js"></script>
        <script src="assets/plugins/google-code-prettify/prettify.js"></script>
        
    </body>
</html>
<?php } ?>