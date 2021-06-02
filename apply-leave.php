<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
    {   
header('location:index.php');
}
else{
    // insert code for checking if leave count is less than 12
    // code for inserting into leave table
    if(isset($_POST['apply']))
    {
        $empid=$_SESSION['eid'];
        $leavetype=$_POST['leavetype'];
        $fromdate=$_POST['fromdate'];  
        $todate=$_POST['todate'];
        $description=$_POST['description'];
        $dept=$_SESSION['deptcode'];
        $leavedays=$_POST['nofdays'];
        $status=0;
        $isread=0;
        if($fromdate > $todate){
            $error=" ToDate should be greater than FromDate ";
        }elseif($_SESSION['lvcasualcount']>=12){
            $error="You have exceeded your Casual Leave limit. Please contact your HOD.";
        }
        

        switch($dept){

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

    

        $sql="INSERT INTO $selectTable(LeaveType,ToDate,FromDate,Description,Status,IsRead,empid,DayCount,dept_code) VALUES(:leavetype,:todate,:fromdate,:description,:status,:isread,:empid,:nofdays,:deptcode)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
        $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
        $query->bindParam(':todate',$todate,PDO::PARAM_STR);
        $query->bindParam(':description',$description,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->bindParam(':isread',$isread,PDO::PARAM_STR);
        $query->bindParam(':empid',$empid,PDO::PARAM_STR);
        $query->bindParam(':nofdays',$leavedays,PDO::PARAM_STR);
        $query->bindParam(':deptcode',$dept,PDO::PARAM_STR);
        $query->execute();

        $sql2="INSERT INTO tblleaves(LeaveType,ToDate,FromDate,Description,Status,IsRead,empid,DayCount,dept_code) VALUES(:leavetype,:todate,:fromdate,:description,:status,:isread,:empid,:nofdays,:deptcode)";
        
        $query = $dbh->prepare($sql2);
        $query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
        $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
        $query->bindParam(':todate',$todate,PDO::PARAM_STR);
        $query->bindParam(':description',$description,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->bindParam(':isread',$isread,PDO::PARAM_STR);
        $query->bindParam(':empid',$empid,PDO::PARAM_STR);
        $query->bindParam(':nofdays',$leavedays,PDO::PARAM_STR);
        $query->bindParam(':deptcode',$dept,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            $msg="Leave applied successfully";
        }
        else 
        {
            $error="Something went wrong. Please try again";
        }
    
    }
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Faculty | Apply Leave</title>
        <link rel="shortcut icon" href="assets/images/logo.jpeg" type="image/ico" />
        
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
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
                        <div class="page-title">Apply for Leave</div>
                    </div>
                    <div class="col s12 m12 l8">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <h3>Apply for Leave</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>Note </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<!-- Select Leave Type -->
 <div class="input-field col  s12">
<select  name="leavetype" autocomplete="off">
<option value="">Select leave type...</option>
<?php $sql = "SELECT  LeaveType from tblleavetype";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                            
<option value="<?php echo htmlentities($result->LeaveType);?>"><?php echo htmlentities($result->LeaveType);?></option>
<?php }} ?>
</select>
</div>



<!-- Leave Details -->
<div class="input-field col m6 s12">
<label for="fromdate"></label>
<input id="mask1" name="fromdate" type="date" class='input-group date'  autocomplete="off" required>
</div>
<div class="input-field col m6 s12">
<label for="todate"></label>
<input id="mask1" name="todate" type="date" class='input-group date'  autocomplete="off" required>

</div>
<?php $max=12-$_SESSION['lvcasualcount']; ?>
<div class="input-field col m6 s12">
<label for="days">No of days:</label>
<input type="number" id="nofdays" name="nofdays" min="1" max ="<?php echo htmlentities($max);?>"> 
</div>
<div class="input-field col m12 s12">
<label for="birthdate">Description</label>    

<textarea id="textarea1" name="description" class="materialize-textarea" length="500" required></textarea>




</div>

</div>
<br> <br>
<h4>Aternate arangements</h4> <br> <br>
<form>
  <div class="form-group">
  <h6>SELECT DATE:</h6>
  <input type="date" class='input-group date'  autocomplete="off" required>
  <h6>SUBJECT:</h6>
  <input type="text" class='input-group date' placeholder="SUBJECT CODE"  autocomplete="off" required>
  <input type="text" class='input-group date' placeholder="SUBJECT NAME"  autocomplete="off" required>
  <h6>SEM&BRANCH&PERIOD</h6>
  <input type="text" class='input-group date' placeholder="SEM/BRANCH/PERIOD"  autocomplete="off" required>
   
</form>
      <button type="submit" name="apply" id="apply" class="waves-effect waves-light btn indigo m-b-xs">Apply</button>                                             

                                                </div>
                                            </div>
                                        </section>
                                     
                                    
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
          <script src="assets/js/pages/form-input-mask.js"></script>
                <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    </body>
</html>
<?php } ?> 