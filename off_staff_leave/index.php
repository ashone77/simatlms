<?php
session_start();
include('includes/config.php');
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}
}?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAT</title>
    <link rel="shortcut icon" href="../assets/images/logo.jpeg" type="image/ico" />
        
        <!-- Title -->
        <title>SIMAT e-GOVERNANCE</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->

        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>

             <link href="../assets/css/materialdesign.css" rel="stylesheet">
        <link href="./assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        	
        <!-- Theme Styles -->

        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>

        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        
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
                <nav style= "background-image: linear-gradient(to right, rgba(43, 0, 0), rgba(0, 16, 79))">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s4">      
                            <span class="chapter-title">SIMAT e-GOVERNANCE | HR </span>
                        </div>
                      
                         
                        <div ><img class="sreeku"  style="
                        width: 55px;
                        height:50px;
                        float:right; 
                         margin-top: 5px;
                         "
                         src="../assets/images/half.png">
                        </div>
                        
                    </div>
                    
                
                </nav>
            </header>
            
            

        
           
           
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                   
                
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" >
                <li class="no-padding"><a class="waves-effect waves-grey" href="../index.php"><i class="material-icons">account_box</i>Home</a></li>
                   
                   <li class="no-padding"><a class="waves-effect waves-grey" href="../facindex.php"><i class="material-icons">account_box</i>Faculty Login</a></li>
                   
               

                      <li class="no-padding"><a class="waves-effect waves-grey" href="../admin/index.php"><i class="material-icons">account_box</i>Admin Login</a></li>

                      <li class="no-padding"><a class="waves-effect waves-grey" href="../hod/index.php"><i class="material-icons">account_box</i>HOD Login</a></li>

                      <li class="no-padding"><a class="waves-effect waves-grey" href="../principal/index.php"><i class="material-icons">account_box</i>Principal Login</a></li>

                      <li class="no-padding"><a class="waves-effect waves-grey" href="../HR/index.php"><i class="material-icons">account_box</i>HR Login</a></li>
                      <li class="no-padding"><a class="waves-effect waves-grey" href="../off_staff/index.php"><i class="material-icons">account_box</i>Office Staff login</a></li>
                </ul>
          <div class="footer">
                    <p class="copyright"><a href="simat.ac.in">SIMAT e-GOVERNANCE </a>©</p>
                
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
                                      <span class="card-title" style="font-size:20px;">HR LOGIN</span></span>
                                         
                                       <div class="row">
                                           <form class="col s12" name="signin" method="post">
                                               <div class="input-field col s12">
                                                   <input id="username" type="text" name="username" class="validate" autocomplete="off" required >
                                                   <label for="email">Username</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" type="password" class="validate" name="password" autocomplete="off" required>
                                                   <label for="password">Password</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">
                                               
                                                
                                                   <input style="color: white; background-color:#006e12; border-style:none; padding:7px;"  type="submit" name="signin" value="Sign in" >
                                                  
                                               

                                           </form>
                                           <button style="color: white; background-color:#005b6e; border-style:none; padding:5px;" onclick="window.location.href='changepassword.php'">
                                            Forgot Password
                                          </button>
                                         
                                           </div>
                                           
                                           
                                           
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

        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>

        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>

        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>

        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>

        <script src="../assets/js/alpha.min.js"></script>
        
    </body>
</html>