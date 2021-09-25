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
        <title>Consolidated Leave</title>
        <link rel="shortcut icon" href="../assets/images/logo.jpeg" type="image/ico" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

            
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
<style>
  #myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: white;
  margin-top: 20px;
  border: 1px solid black;
}
#myDIV2 {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: white;
  margin-top: 20px;
  border: 1px solid black;
}

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
                        <div class="page-title">Consolidated Leave</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                               
                                    

                                    



 

 
                         
                                <h4 style="text-align: left;"> 
                                <button style="background-color: black;color:blanchedalmond" type="button" class="btn btn-dark" onclick="openFormsree()">SORT WITH DEPARTMENT</button>
                                
                                <button style="background-color: black;color:blanchedalmond" type="button" class="btn btn-dark" onclick="myFunctionsree()">CONSOLIDATED LEAVES</button>
                                </h4>


<script>
function myFunctionsree() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
// function openForm() {
//   var x = document.getElementById("myForm");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//   } else {
//     x.style.display = "none";
//   }
// }
function openFormsree() {
  var x = document.getElementById("myDIV2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>  

                    



<div style="display:none" id="myDIV2">
<div style="text-align: end;">
<button id="ho" onclick=" openFormsree()"  style="color:red;border:1px solid black;margin-right:10px;">x</button>


</div>
<div>
<h5 style="color: black;">
  SORT WITH DEPARTMENT 
</h5>

</div>



<form action="faculty-det.php" method="post">
    <h6 style="color: black ;font-style:italic;">SELECT DEPARTMENT</h6>
    <input style="text-align: center;width:300px" placeholder="Select here" list="browsers" name="name">
    <datalist id="browsers" >
    <option value="Civil Engineering">
    <option value="Computer Science Engineering">
    <option value="Applied Science & Humanities">
    <option value="Electrical And Electronics Engineering">
    <option value="Mechanical Engineering">
    <option value="Electronics And Communication Engineering">
  </datalist> <br>
<input style="color:black;font-style:italic;border:2px solid black" type="submit">
</form>

</div>
<div style="display:none" id="myDIV">
<div style="text-align: end;">
<button id="ho" onclick=" myFunctionsree()"  style="color:red;border:1px solid black;margin-right:10px;">X</button>

</div>

<div>
<h5 style="color: black;">
 SHOW CONSOLIDATED LEAVES
</h5>

</div>



<form action="consolidatedtable.php" method="GET">
    <h6 style="color: red;">SELECT START DATE</h6>
    <input style="text-align: center;width:300px" type="date" placeholder="Select here" name="from_date">  <br>
    <h6 style="color: red;">SELECT END DATE</h6>
    <input style="text-align: center;width:300px" type="date" placeholder="Select here" name="to_date"> <br>
    
<input style="color:black;font-style:italic;border:2px solid black " type="submit">
</form>

</div>
<div>
</div>



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