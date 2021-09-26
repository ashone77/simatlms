<?php
session_start();
include('includes/config.php');
if(isset($_POST['create']))
{
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="INSERT INTO stlogin(FirstName,LastName,email,password) VALUES(:fname,:lname,:email,:password)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':fname', $fname, PDO::PARAM_STR);
$query-> bindParam(':lname', $lname, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
 echo "Employee record added Successfully";
}
else 
{
echo "Something went wrong. Please try again";
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
        <title>SIMAT e-GOVERNANCE</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
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
                            <span class="chapter-title">SIMAT e-GOVERNANCE SYSTEM</span>
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
                    <li class="no-padding"><a class="waves-effect waves-grey" href="./index.php"><i class="material-icons">account_box</i>Home</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="index.php"><i class="material-icons">account_box</i>Student Login</a></li>
                  <!--  <li class="no-padding"><a class="waves-effect waves-grey" href="../simatlms/hod"><i class="material-icons">account_box</i>HOD Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="../simatlms/principal"><i class="material-icons">account_box</i>Principal Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="../simatlms/HR/"><i class="material-icons">account_box</i>HR Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="../simatlms/admin"><i class="material-icons">account_box</i>Admin Login</a></li>
                
        -->
                </ul>
          <div class="footer">
                    <p class="copyright"><a href="http://simat.ac.in">SIMAT e-GOVERNANCE</a>©</p>
                
                </div>
                </div>
            </aside>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <!-- <div class="page-title"><h4>Faculty Leave Management System</h4></div> -->

                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">Student SignUp</span>
                                         
                                       <div class="row">
                                           <form class="col s12" name="signup" method="post">
                                            <!--<div class="input-field col s12">-->
                                               <div class="row">
                <div class="col">
                    <div class="form-group"> 
            <label for="firstname"><b>First Name</b></label> 
            <input class="form-control" id="firstname" type="text" name="firstname" required><br>
           </div></div>
            <div class="col">
                    <div class="form-group">
            <label for="lastname"><b>Last Name</b></label> 
            <input class="form-control" id="lastname" type="text" name="lastname" required><br>
            </div>
            </div>
            </div>
            <label for="email"><b>Email Address</b></label> 
            <input class="form-control" id="email" type="email" name="email" required><br>

            <label for="phonenumber"><b>Phone Number</b></label> 
            <input class="form-control" id="phonenumber" type="number" name="phonenumber" required><br>

            <label for="password"><b>Password</b></label> 
            <input class="form-control" id="password" type="password" name="password" required><br>
          <!--   <hr class="mb-3">
            <hr class="line">-->
            <div class="button-container">
               
            <button type="submit" name="create"  id="add" class="waves-effect waves-light btn indigo m-b-xs">Create Account</button>
                </form>


	</div>
                                                  <!-- <input id="username" type="text" name="username" class="validate" autocomplete="off" required >
                                                   <label for="email">Student Code</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" type="password" class="validate" name="password" autocomplete="off" required>
                                                   <label for="password">Password</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">
                                               
                                                
                                                   <input style="color: white; background-color:#006e12; border-style:none; padding:7px;"  type="submit" name="signin" value="Sign in" >
                                                  
                                               .
                                           </form>
                                           <button style="color: white; background-color:#005b6e; border-style:none; padding:5px;" onclick="window.location.href='forgot-password.php'">
                                            Forgot Password
                                          </button>
                                           </div>
                                           
        -->
                                           
                                      </div>
                                  </div>
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