<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
// code for Inactive  employee    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "update tblemployees set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manageemployee.php');
}



//code for active employee
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "update tblemployees set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manageemployee.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Manage Faculty</title>
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
open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  right: 15px;
  border: 3px solid black;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
        </style>
    </head>
    <body>
       <?php include('includes/header.php');?>
    
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Manage Faculties</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Faculty Info</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Faculty Id</th>
                                            <th>name</th>
                                            <th>Depart</th>
                                             <th>Status</th>
                                             <th>Reg Date</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    

                                    

<?php

$dept=$_POST["name"];
if ($dept=="Civil Engineering") {
    $sql = "SELECT EmpId,FirstName,LastName,Department,Status,RegDate,id from  tblemployees where Department='Civil Engineering'";
  }elseif($dept=="Computer Science Engineering"){
    $sql = "SELECT EmpId,FirstName,LastName,Department,Status,RegDate,id from  tblemployees where Department= 'Computer Science Engineering' ";   
  }elseif($dept=="Applied Science & Humanities"){
    $sql = "SELECT EmpId,FirstName,LastName,Department,Status,RegDate,id from  tblemployees where Department= 'Applied Science & Humanities' ";   
  }elseif($dept=="Electrical And Electronics Engineering"){
    $sql = "SELECT EmpId,FirstName,LastName,Department,Status,RegDate,id from  tblemployees where Department= 'Electrical And Electronics Engineering' ";   
  }elseif($dept=="Mechanical Engineering"){
    $sql = "SELECT EmpId,FirstName,LastName,Department,Status,RegDate,id from  tblemployees where Department= 'Mechanical Engineering' ";   
  }else if($dept=="Electronics And Communication Engineering"){
    $sql = "SELECT EmpId,FirstName,LastName,Department,Status,RegDate,id from  tblemployees where Department= 'Electronics And Communication Engineering' ";   
  }else{
    $sql = "SELECT EmpId,FirstName,LastName,Department,Status,RegDate,id from  tblemployees  ";  
  }

$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                        <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->EmpId);?></td>
                                            <td><?php echo htmlentities($result->FirstName);?>&nbsp;<?php echo htmlentities($result->LastName);?></td>
                                            <td><?php echo htmlentities($result->Department);?></td>
                                             <td><?php $stats=$result->Status;
if($stats){
                                             ?>
                                                 <a class="waves-effect waves-green btn-flat m-b-xs">Active</a>
                                                 <?php } else { ?>
                                                 <a class="waves-effect waves-red btn-flat m-b-xs">Inactive</a>
                                                 <?php } ?>


                                             </td>
                                              <td><?php echo htmlentities($result->RegDate);?></td>
                                            <td><a href="../HR/fac.indi.php?facultyid=<?php echo htmlentities($result->id);?>">VIEW</a>
                                        <?php if($result->Status==1)
 {?>

<?php } else {?>

                                            <a href="manageemployee.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to active this employee?');""> title="Active">done</i>
                                            <?php } ?> </td>
                                        </tr>
                                         <?php $cnt++;} }?>
 </tbody>
 
                                </table> <br>
                                <button style="background-color: black;color:blanchedalmond" type="button" class="btn btn-dark" onclick="openForm()">SORT WITH  DEPARTMENT</button>
                              
<div style="background-color: white;width:200px; text-align:center;margin-top:20px;" class="form-popup" id="myForm">

<form action="faculty-det.php" method="post">
    <h6 style="color: black ;font-style:italic">SELECT DEPARTMENT</h6>
    <input style="text-align: center;" placeholder="Select here" list="browsers" name="name">
    <datalist id="browsers" >
    <option value="Civil Engineering">
    <option value="Computer Science Engineering">
    <option value="Applied Science & Humanities">
    <option value="Electrical And Electronics Engineering">
    <option value="Mechanical Engineering">
    <option value="Electronics And Communication Engineering">
  </datalist>
<input style="background-color: black;color:blanchedalmond;font-style:italic;border:5px solid white " type="submit">
</form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
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
        
    </body>
</html>
<?php } ?>