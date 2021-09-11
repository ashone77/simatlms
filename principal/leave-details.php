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
$sql="update tblprincipal set IsRead=:isread where id=:did";
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
$sql="update tblprincipal set AdminRemark=:description,Status=:status,AdminRemarkDate=:admremarkdate where id=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();

switch($_SESSION['ltype']){
    case "Commuted Half Day":
        $leavetbl = "lv_commuted_half";
        break;
    case "Commuted Full Day":
        $leavetbl = "lv_commuted_full";
        break;
    case "Casual Leave":
        $leavetbl = "lv_casual";
        break;
    case "Loss of Pay":
        $leavetbl = "lv_lop";
        break;
    case "Earned Leave":
        $leavetbl = "lv_earned";
        break;


    default:
        echo("Leave type not specified in the leave details");
}

$emp_id = $_SESSION['id'];
$dcount = $_SESSION['daycount'];

$sql2 = "update tblemployees set $leavetbl=$leavetbl+$dcount,nofleaves=nofleaves+$dcount where id=$emp_id";
$query = $dbh->prepare($sql2);
// $query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();

switch($_SESSION['deptcode']){

    case "2":
        $selectTable = "tblleaves_cse";
        break;
    case "3":
        $selectTable = "tblleaves_ash";
        break;
    case "1":
        $selectTable = "tblleaves_civil";
        break;
    case "4":
        $selectTable = "tblleaves_eee";
        break;
    case "5":
        $selectTable = "tblleaves_me";
        break;
    case "6":
        $selectTable = "tblleaves_ece";
        break;

    default:
        $selectTable = "tblleaves";

}

$update_hod="update $selectTable set AdminRemark=:description,Status=:status,AdminRemarkDate=:admremarkdate where id=:did";
$query = $dbh->prepare($update_hod);
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
        <link rel="shortcut icon" href="../assets/images/logo.jpeg" type="image/ico" />
        <title>Principal | Leave Details </title>
        
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

        <!-- JS Mail Script -->
        <script src="https://smtpjs.com/v3/smtp.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script type="text/javascript">
            
            
            function sendEmail() {
            Email.send({
                Host: "smtp.gmail.com",
                Username: "simatlms5@gmail.com",
                Password: "#Simat@LMS100%",
                To: 'aswinvharidas@gmail.com',
                From: "simatlms5@gmail.com",
                Subject: "Leave application approved",
                Body: "Your leave application has been approved by the Principal. ",
                // Attachments: [
                // {
                // 	name: "File_Name_with_Extension",
                // 	path: "Full Path of the file"
                // }]
            })
                .then(message =>{
                            //console.log (message);
                            if(message=='OK'){
                            alert('Your mail has been send. Thank you for connecting.');
                            }
                            else{
                                console.error (message);
                                alert('There is error at sending message. ')
                                
                            }

                        });
            }
        </script> -->

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
    $lid=intval($_GET['leaveid']);
    $sql = "SELECT tblprincipal.EmpId as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblemployees.Gender,tblemployees.Phonenumber,tblemployees.EmailId,tblemployees.nofleaves,tblemployees.lv_casual,tblemployees.lv_lop,tblemployees.lv_commuted_half,tblemployees.lv_commuted_full,tblemployees.dept_code,tblprincipal.LeaveType,tblprincipal.ToDate,tblprincipal.FromDate,tblprincipal.Description,tblprincipal.PostingDate,tblprincipal.Status,tblprincipal.AdminRemark,tblprincipal.AdminRemarkDate,tblprincipal.DayCount, tblprincipal.AltArrangement from tblprincipal join tblemployees on tblprincipal.empid=tblemployees.EmpId where tblprincipal.id=:lid";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':lid',$lid,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
        foreach($results as $result)
        {   
            $dept_id=$result->dept_code;
            $_SESSION['deptcode']=$dept_id;      
?>  

<tr>
    <td style="font-size:16px;"> <b>Faculty Name :</b></td>
        <td><a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>" target="_blank">
        <?php echo htmlentities($result->FirstName." ".$result->LastName);?></a></td>
        <td style="font-size:16px;"><b>Faculty Code :</b></td>
        <td><?php echo htmlentities($result->EmpId);?></td>
        <td style="font-size:16px;"><b>Gender :</b></td>
        <td><?php echo htmlentities($result->Gender);?></td>
        
        
</tr>
<tr>
    <td style="font-size:16px;"><b>SL No:</b></td>
    <td><?php echo htmlentities($result->id);$_SESSION['id']=$result->id;?></td>
</tr>

<tr>
    <?php $facultyid = $result->EmailId ?>

        <td style="font-size:16px;"><b>Email id :</b></td>
    <td><?php echo htmlentities($result->EmailId);?></td>
        <td style="font-size:16px;"><b>Contact No. :</b></td>
    <td><?php echo htmlentities($result->Phonenumber);?></td>
    <td>&nbsp;</td>
        <td>&nbsp;</td>
</tr>

<!-- Mail Script -->
<script type="text/javascript">
    function sendEmail() {
        
            Email.send({
                
                Host: "smtp.gmail.com",
                Username: "simatlms5@gmail.com",
                Password: "#Simat@LMS100%",
                To:"<?php echo htmlentities($result->EmailId);?>",
                From: "simatlms5@gmail.com",
                Subject: "Leave Application Status Updated",
                Body: "Your leave application has been checked and updated, please login to the E-Governance Portal to check your leave status. ",
                // Attachments: [
                // {
                // 	name: "File_Name_with_Extension",
                // 	path: "Full Path of the file"
                // }]
            })
                .then(message =>{
                            //console.log (message);
                            if(message=='OK'){
                            alert('Your mail has been send. Thank you for connecting.');
                            updateMailSent()
                            
                            }
                            else{
                                console.error (message);
                                alert('There is error at sending message. ')
                                
                            }

                        });
                     
            }
</script>
<script>
function updateMailSent(){
    <?php   
    $did=intval($_GET['leaveid']);
    $sql="update tblprincipal set MailSent=1 where id=$did";
    $query = $dbh -> prepare($sql);
    $query->execute();
    echo 'alert("JavaScript Alert Box by PHP")';
    ?>  
}
</script>

                                        

<tr>
        <td style="font-size:16px;"><b>Leave Type :</b></td>
    <td><?php echo htmlentities($result->LeaveType);
    $_SESSION['ltype']=$result->LeaveType;?></td>
        <td style="font-size:16px;"><b>Leave Date . :</b></td>
    <td>From <?php echo htmlentities($result->FromDate);?> to <?php echo htmlentities($result->ToDate);?></td>
    <td style="font-size:16px;"><b>Posting Date</b></td>
    <td><?php echo htmlentities($result->PostingDate);?></td>
    
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
    <td style="font-size:16px;"><b>Days of Leave:</b></td>
    <td><?php echo htmlentities($result->DayCount);$_SESSION['daycount']=$result->DayCount;?></td>
</tr>

<tr>
    <td style="font-size:16px;"><b>Leave Description : </b></td>
    <td colspan="5"><?php echo htmlentities($result->Description);?></td>
</tr>
<tr>
    <td style="font-size:16px;"><b>Alternate Arranegement : </b></td>
    <td colspan="5"><?php echo nl2br(htmlentities ($result->AltArrangement ));?></td>
                                          
</tr>

<tr>
<td style="font-size:16px;"><b>Leave Status :</b></td>
<td colspan="5"><?php $stats=$result->Status;
if($stats==3){
    ?>
    <span style="color: chocolate">Forwarded by HOD</span>
    
    
     <?php }if($stats==1){
?>
<span style="color: green">Approved</span>


 <?php } if($stats==4)  { ?>
<span style="color: orange">Application Returned</span>
<?php } if($stats==2)  { ?>
<span style="color: red">Not Approved</span>
<?php } if($stats==0)  { ?>
 <span style="color: blue">Waiting for approval</span>
 <?php } ?>
</td>
</tr>

<tr>
<td style="font-size:16px;"><b>HOD Remark: </b></td>
<td colspan="5"><?php
if($result->AdminRemark==""){
  echo "waiting for Approval";  
}
else{
echo htmlentities($result->AdminRemark);
}
?></td>
 </tr>

 <tr>
<td style="font-size:16px;"><b>HOD Action taken date : </b></td>
<td colspan="5"><?php
if($result->AdminRemarkDate==""){
  echo "NA";  
}
else{
echo htmlentities($result->AdminRemarkDate);
}
?></td>
 </tr>
<?php 
if($stats==3)
{

?>
<tr>
 <td colspan="5">
  <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Take&nbsp;Action</a>
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
      
       <form method="post">
	<input type="button" value="Send Mail"
		onclick="sendEmail(sree)" />
</form>
    </div>

</div>   

 </td> 
</tr>
  <?php } ?> <?php if($stats==1 || $stats==2 || $stats == 4){?>
    <tr>
 <td colspan="5">
 <input type="button" class="waves-effect waves-light btn blue m-b-xs" name="sendmail" value="Send Email" onclick="sendEmail()">

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