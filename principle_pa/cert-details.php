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
$tutfee1 = $_POST['tutfee1'];
$tutfee2 = $_POST['tutfee2'];
$tutfee3 = $_POST['tutfee3'];
$tutfee4 = $_POST['tutfee4'];
$hsfee1 = $_POST['hsfee1'];
$hsfee2 = $_POST['hsfee2'];
$hsfee3 = $_POST['hsfee3'];
$hsfee4 = $_POST['hsfee4'];
$trfee1 = $_POST['trfee1'];
$trfee2 = $_POST['trfee2'];
$trfee3 = $_POST['trfee3'];
$trfee4 = $_POST['trfee4'];

date_default_timezone_set('Asia/Kolkata');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="UPDATE bonafide_cert set TuitionFirst=:tutfee1, TuitionSecond=:tutfee2, TuitionThird=:tutfee3, TuitionFourth=:tutfee4, HstlFirst=:hsfee1, HstlSecond=:hsfee2, HstlThird=:hsfee3,HstlFourth=:hsfee4, TrFirst=:trfee1, TrSecond=:trfee2, TrThird=:trfee3, TrFourth=:trfee4 where DocumentNumber=:documentnumber";
$query = $dbh->prepare($sql);
$query->bindParam(':tutfee1',$tutfee1,PDO::PARAM_STR);
$query->bindParam(':tutfee2',$tutfee2,PDO::PARAM_STR);
$query->bindParam(':tutfee3',$tutfee3,PDO::PARAM_STR);
$query->bindParam(':tutfee4',$tutfee4,PDO::PARAM_STR);
$query->bindParam(':hsfee1',$hsfee1,PDO::PARAM_STR);
$query->bindParam(':hsfee2',$hsfee2,PDO::PARAM_STR);
$query->bindParam(':hsfee3',$hsfee3,PDO::PARAM_STR);
$query->bindParam(':hsfee4',$hsfee4,PDO::PARAM_STR);
$query->bindParam(':trfee1',$trfee1,PDO::PARAM_STR);
$query->bindParam(':trfee2',$trfee2,PDO::PARAM_STR);
$query->bindParam(':trfee3',$trfee3,PDO::PARAM_STR);
$query->bindParam(':trfee4',$trfee4,PDO::PARAM_STR);
$query->bindParam(':documentnumber',$documentno,PDO::PARAM_STR);

$query->execute();
$msg="Certificate details updated Successfully";
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
                                        <tr>
                                            <td style="font-size:16px;"><b>Tuition Fee</b></td>
                                            <td><?php echo htmlentities($result->AdmssnYear);?></td>
                                            <td style="font-size:16px;"><b>Current Year</b></td>
                                            <td><?php echo htmlentities($result->CurrYear);?></td>
                                          
                                        </tr>
                                        
                                        <h5></h5>

<tr>
<td style="font-size:16px;"><b>Certificate Status :</b></td>
<td colspan="5"><?php $stats=$result->Status;
if($stats==1){
?>
<span style="color: green">Approved</span>
 <?php } if($stats==2)  { ?>
<span style="color: darkorange">Office Staff Updated</span>
<?php } if($stats==0)  { ?>
 <span style="color: blue">Awaiting Verification</span>
 <?php } ?>
</td>
</tr>
<form target="_blank" action="../StudentModule/certificate/bonafide_cert.php?documentno=<?php echo htmlentities($result->DocumentNumber);?>" method="post">
<tr>
    <td><h5 style="font-weight:bold;color:#434544">Tution Fee</h5> </td></tr><tr>

                                            <td style="font-size:16px;"><b>Tuition Fee-First Year:</b></td>
                                            <td style=""><?php echo htmlentities($result->TuitionFirst);?></td>
                                            <td style="font-size:16px;"><b>Tution Fee-Second Year:</b></td> 
                                            <td><?php echo htmlentities($result->TuitionSecond);?></td> </tr><tr>
                                            <td style="font-size:16px;"><b>Tution Fee-Third Year:</b></td>
                                            <td><?php echo htmlentities($result->TuitionThird);?></td>
                                            <td style="font-size:16px;"><b>Tution Fee-Forth Year:</b></td>
                                            <td><?php echo htmlentities($result->TuitionFourth);?></td>
                                          
                                        </tr>
                                       
    <td><h5 style="font-weight:bold;color:#434544">Hostel Feeses</h5> </td></tr><tr>
                                        <tr>
                                            <td style="font-size:16px;"><b>Hostel Fee-First Year:</b></td>
                                            <td style=""><?php echo htmlentities($result->HstlFirst);?></td>
                                            <td style="font-size:16px;"><b>Hostel Fee-Second Year:</b></td> 
                                            <td><?php echo htmlentities($result->HstlSecond);?></td> </tr><tr>
                                            <td style="font-size:16px;"><b>Hostel Fee-Third Year:</b></td>
                                            <td><?php echo htmlentities($result->HstlThird);?></td>
                                            <td style="font-size:16px;"><b>Hostel Fee-Forth Year:</b></td>
                                            <td><?php echo htmlentities($result->HstlFourth);?></td>
                                          
                                        </tr>
                                        <tr>
    <td><h5 style="font-weight:bold;color:#434544">Transporation Feeses</h5> </td></tr><tr>
                                        <tr>
                                            <td style="font-size:16px;"><b>Transporation Fee-First Year:</b></td>
                                            <td style=""><?php echo htmlentities($result->TrFirst);?></td>
                                            <td style="font-size:16px;"><b>Transporation Fee-Second Year:</b></td> 
                                            <td><?php echo htmlentities($result->TrSecond);?></td> </tr><tr>
                                            <td style="font-size:16px;"><b>Transporation Fee-Third Year:</b></td>
                                            <td><?php echo htmlentities($result->TrThird);?></td>
                                            <td style="font-size:16px;"><b>Transporation Fee-Forth Year:</b></td>
                                            <td><?php echo htmlentities($result->TrFourth);?></td>
                                          
                                        </tr>
                                        
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                                <button type="submit" class="waves-effect waves-light btn blue m-b-xs" name="update" value="Submit">Generate Certificate</button>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
               
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