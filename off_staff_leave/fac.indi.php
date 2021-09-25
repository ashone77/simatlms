<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

// code for update the read notification status
$isread=1;
$did=intval($_GET['leaveid']);  
date_default_timezone_set('Asia/Kolkata');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="update tblleaves set IsRead=:isread where id=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();

// code for action taken on leave
if(isset($_POST['update']))
{ 
$did=intval($_GET['leaveid']);
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
        <title>HR | Faculty Details </title>
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
                        <div class="page-title" style="font-size:24px;">faculty Details</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Faculty Details</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                               
                                 
                                    <tbody>
<?php 
$lid=intval($_GET['facultyid']);
$sql = "SELECT * from tblemployees where id=$lid";
$query = $dbh -> prepare($sql);
// 
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>  

<tr>
    <td style="font-size:16px;"> <b>Employe Name :</b></td>
    <td><a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>" target="_blank">
    <?php echo htmlentities($result->FirstName." ".$result->LastName);?></a></td>
    <td style="font-size:16px;"><b>Emp Id :</b></td>
    <td><?php echo htmlentities($result->EmpId);?></td>
    <td style="font-size:16px;"><b>Gender :</b></td>
    <td><?php echo htmlentities($result->Gender);?></td>
</tr>

<tr>
    <td style="font-size:16px;"><b>SL No:</b></td>
    <td><?php echo htmlentities($result->id);$_SESSION['id']=$result->id;?></td>
</tr>

<tr>
    <td style="font-size:16px;"><b>Emp Email id :</b></td>
    <td><?php echo htmlentities($result->EmailId);?></td>
    <td style="font-size:16px;"><b>Emp Contact No. :</b></td>
    <td><?php echo htmlentities($result->Phonenumber);?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

<tr>
    <td style="font-size:16px;"><b>Total Leaves Taken:</b></td>
    <td><?php echo htmlentities($result->nofleaves);?></td>
    <td style="font-size:16px;"><b>Casual Leaves:</b></td>
    <td><?php echo htmlentities($result->lv_casual);?></td>
    <td style="font-size:16px;"><b>Loss of Pay Leaves:</b></td>
    <td><?php echo htmlentities($result->lv_lop);?></td>
    
</tr>

<tr>
    <td style="font-size:16px;"><b>Commuted Half-Day Leaves:</b></td>
    <td><?php echo htmlentities($result->lv_commuted_half);?></td>
    <td style="font-size:16px;"><b>Commuted Full-Day Leaves:</b></td>
    <td><?php echo htmlentities($result->lv_commuted_full);?></td>
</tr>








<?php 
if($stats==0)
{

?>


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
            </main>
         
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