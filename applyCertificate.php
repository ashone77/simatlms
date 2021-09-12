

<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT EmpId,Password,Status,dept_code,lv_casual FROM tblemployees WHERE EmpId=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->Status;
    $_SESSION['eid']=$result->EmpId;
    $_SESSION['deptcode']=$result->dept_code;
    $_SESSION['lvcasualcount']=$result->lv_casual;
    
  } 
if($status==0)
{
$msg="Your account is Inactive. Please contact admin";
} else{
$_SESSION['emplogin']=$_POST['username'];

echo "<script type='text/javascript'> document.location = 'myprofile.php'; </script>";
} }

else{
  echo "<script>alert('Invalid Details');</script>";
  

}

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAT</title>
    <link rel="shortcut icon" href="assets/images/logo.jpeg" type="image/ico" />
        
        <!-- Title -->
        <title>SIMAT LMS</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


</head>
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
             <link href="assets/css/materialdesign.css" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav style= "background-image: linear-gradient(to right, rgba(43, 0, 0), rgba(0, 16, 79))" class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s4">      
                            <span class="chapter-title">SIMAT LMS | Faculty Leave Management System</span>
                        </div>
                        <div ><img class="sreeku"  style="
                        width: 55px;
                        height:50px;
                        margin-bottom:20px;
                        margin-top:5px;
                         float:right; "
                         src="assets/images/half.png">
                        </div>
                       
                           
                        </form>
                     
                        
                    </div>
                </nav>
            </header>
           
           
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                   
                
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" >
                    <li>&nbsp;</li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href=""><i class="material-icons">account_box</i>Faculty Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="../simatlms/hod"><i class="material-icons">account_box</i>HOD Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="../simatlms/principal"><i class="material-icons">account_box</i>Principal Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="../simatlms/HR/"><i class="material-icons">account_box</i>HR Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="../simatlms/admin"><i class="material-icons">account_box</i>Admin Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="../simatlms/applyCertificate.php"><i class="material-icons">account_box</i>Apply Certificate</a></li>
             
                </ul>
          <div class="footer">
                    <p class="copyright"><a href="simat.ac.in">SIMAT E-Governance</a>©</p>
                
                </div>
                </div>
            </aside>
            
            <main class="mn-inner">
                <div class="row">
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form  method="post">
                                    <div>
                                        <h3>APPLY FOR CERTIFICATE</h3>
                                         
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">




<div class="input-field col m6 s12">
<label for="firstName">First Name</label>
<input id="firstName" name="firstName"  type="text" required>
</div>

<div class="input-field col m6 s12">
<label for="lastName">Last Name </label>
<input id="lastName" name="lastName"type="text" autocomplete="off" required>
</div>

<div class="input-field col s12">
<label for="Ano">Admision Number</label>
<input  name="Ano" type="text" id="text"  autocomplete="off" required>

</div>

<div class="input-field col s12">
<h6>Select Department</h6>
<select  id="Dept" name="Dept" required>
  <option value="cse">Computer Science and Engineering</option>
  <option value="mech">Mechanical Engineering</option>
  <option value="civil">Civil Engineering</option>
  <option value="eee">Electrical and Electronics Engineering</option>
  <option value="ec">Electronics and Communication Engineering</option>
</select>

  <br>
  </div>
  <div class="input-field col s12">
  <h6>Select Quata</h6>
<select id="Quota" name="Quota" required>
  <option value="MGT">Management</option>
  <option value="Merit">Merit</option>
</select>

  <br>
  </div>
  <div  class="input-field col s12">

<h6>Select Year of Admision</h6>
<input class="date-own form-control" required placeholder="Select Here"  type="text">


  <script type="text/javascript">
      $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy',
         startdate:new Date(2018),
      
       });
  </script>


</div>
<div>
<h6>Current Academic Year</h6>
<select id="Ayear" name="Ayear" required>
  <option value="1">First</option>
  <option value="2">Second</option>
  <option value="3">Third</option>
  <option value="4">Fourth</option>
</select>

  <br>
  </div>
  <div>
<h6>Year of Study which the Loan is applied for</h6>
<select id="Ayear" name="Ayear" required>
  <option value="1">First</option>
  <option value="2">Second</option>
  <option value="3">Third</option>
  <option value="4">Fourth</option>
</select>

  <br>
  </div>
  
<div class="input-field col s12">
<label for="BName">Bank Name</label>
<input  name="BName" type="text" id="BName"  autocomplete="off" required>

</div>

<div class="input-field col s12">
<label for="Branch">Bank Branch</label>
<input  name="Branch" type="text" id="Branch"  autocomplete="off" required>

</div>



  <input type="checkbox" id="conformation" name="conformation" required >
  <label style="color: black;"  for="conformation"> This form is applying for genuine purpose</label><br>


</div>
</div>

                                                        
<div class="input-field col s12">
<button type="submit" name="update"  id="update" class="waves-effect waves-light btn indigo m-b-xs">APPLY</button>

</div>

                                                        </div>
                                                    </div>
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
        
    </body>
</html>
