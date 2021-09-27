<?php
session_start();
include('includes/studentconfig.php');
include('./mail.php');
if(isset($_POST['submit'])){
    $docno = $_POST['docno'];
    $name=$_FILES['myfile']['name'];
    $type=$_FILES['myfile']['type'];
    $data=file_get_contents($_FILES['myfile']['tmp_name'],'rb');
    
    // $docno = $_POST['docno'];
    // $allowedExts = array("pdf");
    // $temp = explode(".", $_FILES["pdf_file"]["name"]);
    // $extension = end($temp);
    // $upload_pdf=$_FILES["pdf_file"]["name"];
    // move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"uploads/pdf/" . $_FILES["pdf_file"]["name"]);
    // $sql = "INSERT INTO bonafide_cert(pdf_file) VALUES (:uploadpdf) WHERE DocumentNumber=:docno";
    // $query = $dbh->prepare($sql);
    // $query->bindParam(':uploadpdf',$upload_pdf,PDO::PARAM_STR);
    // $query->bindParam(':docno',$docno,PDO::PARAM_STR);
    // $query->execute();
    
    
    $sql = "UPDATE bonafide_cert SET Status=1, pdf_file =:pdfdoc, mime=:filetype WHERE DocumentNumber =:docno";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pdfdoc',$data,PDO::PARAM_LOB);
    $query->bindParam(':filetype',$type,PDO::PARAM_STR);
    $query->bindParam(':docno',$docno,PDO::PARAM_STR);
    $query->execute();

    $sql1 = "SELECT EmailId,FirstName,LastName FROM bonafide_cert WHERE DocumentNumber=:docno";
    $query = $dbh->prepare($sql1);
    $query->bindParam(':docno',$docno,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        foreach($results as $result)
        {
            
            $mailid = strval($result->EmailId); 
            $name = $result->FirstName.' '.$result->LastName; 
            smtp_mailer($mailid,'Your Certificate Application has been Approved.',$name,$docno); 
        }
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
    <link rel="shortcut icon" href="../assets/images/logo.jpeg" type="image/ico" />
        
        <!-- Title -->
        <title>SIMAT e-GOVERNANCE | HOD</title>
        
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
    <?php include('includes/header.php');?>
            
            <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <!-- <div class="page-title"><h4>Faculty Leave Management System</h4></div> -->

                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">UPLOAD CERTIFICATE</span></span>
                                         
                                       <div class="row">
                                           <form class="col s12" name="submit" method="post" enctype="multipart/form-data">
                                           <div class="input-field col s12"> 
                                                 <h5 style="font-size: 16px;font-weight:bold">Enter Document Number:</h5> 
                                           </div>

                                           <div class="input-field col s12">
                                            
                                                   <input id="docno" type="text" name="docno" class="validate" autocomplete="off" required >
                                                   <label for="docno" >Document Number</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input  type="file"  name="myfile" required>
                                                   
                                               </div>
                                               
                                               <div class="col s12 m-t-sm">
                                              
                                                <input type="submit" name="submit" class="waves-effect waves-light btn blue m-b-xs" value="Upload" >
                                          
                                                  
                                               

                                           </form>
                                           
                                        
                                         
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