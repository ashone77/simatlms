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
        // $alternatearr=$_POST['altarr'];
        $dept=$_SESSION['deptcode'];
        $leavedays=$_POST['nofdays'];
        $arrangement=$_POST['arrangement2'];
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

    

        $sql="INSERT INTO $selectTable(LeaveType,ToDate,FromDate,Description,Status,IsRead,empid,DayCount,dept_code,MailSent,AltArrangement) VALUES(:leavetype,:todate,:fromdate,:description,:status,:isread,:empid,:nofdays,:deptcode,0,:arrangement2)";
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
        $query->bindParam(':arrangement2',$arrangement,PDO::PARAM_STR);
        $query->execute();

        $sql2="INSERT INTO tblleaves(LeaveType,ToDate,FromDate,Description,Status,IsRead,empid,DayCount,dept_code,MailSent,AltArrangement) VALUES(:leavetype,:todate,:fromdate,:description,:status,:isread,:empid,:nofdays,:deptcode,0,:arrangement2)";
        
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
        $query->bindParam(':arrangement2',$arrangement,PDO::PARAM_STR);
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
                        <div class="page-title">Leave Application</div>
                    </div>
                    <div class="col s12 m12 l8">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <h5>Provide the details below :</h5  >
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

<div class="input-field col m12 s12">
    <h4>ALTERNATE ARRANGEMENT</h4>
    <p>(If you have more than one arrangement then you can add it one by one)</p> <br> <br>
</div>

</div>




</form>
<form id="myForm" >
        <div class="input-field col m4 s12">
            <h6>Date</h6>
            <input type="date" > <br> <br>
        </div>
        <div class="input-field col m8 s12">
            <h6>Subject</h6> 
            <input type="text" placeholder="Subject" required><br> <br>
        </div>
        <div class="input-field col m4 s12">
            <h6>Period</h6> 
            <input type="text" placeholder="Period" required  ><br> <br>
        </div>
        <div class="input-field col m4 s12">
            <h6>Semester</h6>
            <input type="text" placeholder="Semester" required><br><br>
        </div>
        <div class="input-field col m4 s12">
            <h6>Branch</h6>
            <input type="text" placeholder="Branch" required><br><br>
        </div>
        <div class="input-field col m12 s12">
            <h6>Alternate Faculty: </h6>
            <input type="text" placeholder="Alternate faculty" required >
        </div>
    </form> 
    
    <button style="margin-top: 10px;" onclick="myFunction()" type="button" class="btn btn-primary">ADD FACULTY</button>
    <button style="background-color: brown;margin-top:10px;" onclick="embedElements()" type="button" class="btn  ">SHOW & EDIT ARRANGEMENTS</button>
    <script>
            let date=[]
            let sub=[]
            let period=[]
            let sem=[]
            let branch=[]
            let altf=[]
            let arrangement=[]  
            
    </script>
          
    <script>
        function addmore(){
            document.getElementById("myForm").elements[0].value=""
            document.getElementById("myForm").elements[1].value=""
            document.getElementById("myForm").elements[2].value=""
            document.getElementById("myForm").elements[3].value=""
            document.getElementById("myForm").elements[4].value=""
            document.getElementById("myForm").elements[5].value=""
    
        }
    
        
    
        function myFunction(){
            let a=""+document.getElementById("myForm").elements[0].value;+"'"
            let b=""+document.getElementById("myForm").elements[1].value;+"'"
            let c=""+document.getElementById("myForm").elements[2].value;+"'"
            let d=""+document.getElementById("myForm").elements[3].value;+"'"
            let e=""+document.getElementById("myForm").elements[4].value;+"'"
            let f=""+document.getElementById("myForm").elements[5].value;+"'"
    
            date.push(a)
            sub.push(b)
            period.push(c)
            sem.push(d)
            branch.push(e)
            altf.push(f)
    
            arrangement.push(a+"   "+b+"   "+c+"   "+d+"   "+e+"   "+f)
            
    
            console.log(date)
            console.log(sub)
            console.log(period)
            console.log(sem)
            console.log(branch)
            console.log(altf)
            console.log(arrangement)
            addmore()      
            //displayArrangement()  
    
            //document.getElementById("demo").innerHTML = x;
            ///document.getElementById("demo2").innerHTML =y;
        }
    </script> <br> <br> 
    
 
   <!-- <div>
        <p>Arrangements: </p>
        <p id="arrangement"></p>
        <br><br>
    </div>
    <div>
<p name="arrangement" id="arrangement"></p>
        <textarea  name="arrangement" id="arrangement2" cols="30" rows="30"></textarea>
        <br><br>
    </div>-->
    <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
    
  
    
        <div id="result"></div>
       
        
        <script>
        {
            
            function embedElements(){
                document.getElementById('result').innerHTML="";
                arrangement.forEach(el => {
                    let i=0
                    document.getElementById('result').innerHTML += `<textarea id=`+i+`>${el}</textarea><br />`;
                // here result is the id of the div present in the dom
                i=i+1
                });
            };
        }
    </script> 


<button type="submit" name="apply" id="apply" class="waves-effect waves-light btn indigo m-b-xs">Apply Leave</button>                                             

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