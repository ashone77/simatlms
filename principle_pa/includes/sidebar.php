     <?php 
     
     switch ($_SESSION['alogin']){
        case "hodcse":
            $userhod = "Computer Science Engineering";
            break;
        case "hodcivil":
            $userhod = "Civil Engineering";
            break;
        case "hodeee":
            $userhod = "Electrical & Electronics Engineering";
            break;
        case "hodme":
            $userhod = "Mechanical Engineering";
            break; 
        case "hodec":
            $userhod = "Electrical & Electronics Engineering";
            break;
        case "hodash":
            $userhod = "Applied Science & Humanities";
            break;
        default:
            $userhod = "Department";
        
    
    }
     
     ?>
     
     <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="../assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                       
                                <p style="margin-left:12px">PR</p>
                               

                         
                        </div>
                    </div>
            
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <!-- <li class="no-padding"><a class="waves-effect waves-grey" href="myprofile.php"> <i class="material-icons prefix">account_circle</i>My Profile</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">settings_input_svideo</i>Home</a></li> -->
                   <!-- <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Department<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="adddepartment.php">Add Department</a></li>
                                <li><a href="managedepartments.php">Manage Department</a></li>
                            </ul>
                        </div>
                    </li> -->
                    
                    <!-- <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">code</i>Leave Type<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="addleavetype.php">Add Leave Type</a></li>
                                <li><a href="manageleavetype.php">Manage Leave Type</a></li>
                            </ul>
                        </div>
                    </li> -->
                    <!-- <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">account_box</i>Employees<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="addemployee.php">Add Employee</a></li>
                                <li><a href="manageemployee.php">Manage Employee</a></li>
       
                            </ul>
                        </div>
                    </li> -->
                    <!-- <li class="no-padding"><a class="waves-effect waves-grey" href="myprofile.php"><i class="material-icons">account_box</i>Profile</a></li>        
                    <li class="no-padding"><a class="waves-effect waves-grey" href="faculty-det.php"> <i class="material-icons prefix">account_circle</i>All Faculties</a></li> -->
   <!-- <li class="no-padding">
    <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">desktop_windows</i>Leave Management<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
    <div class="collapsible-body">
        <ul>
            <li><a href="leaves.php">All Leaves </a></li>
            <li><a href="pending-leavehistory.php">Pending Leaves </a></li>
            <li><a href="approvedleave-history.php">Approved Leaves</a></li>
            <li><a href="notapproved-leaves.php">Not Approved Leaves</a></li>
            <li><a href="apply-leave.php">Apply Leave</a></li>

        </ul>
    </div>
</li> -->
<li class="no-padding"><a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">account_box</i>Home</a></li> 
<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Certificate Management<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="">Bonafide Certificate</a></li>
                                <li><a href="upload.php">Upload Certificate</a></li>
                               
                            </ul>
                        </div>
                    </li>
                   

  <li class="no-padding">
    <a class="waves-effect waves-grey" href="changepassword.php"><i class="material-icons">settings_input_svideo</i>Change Password</a>
  </li>

<li class="no-padding">
    <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
</li>  
                 

                 
              
                </ul>
                   <div class="footer">
                    <p class="copyright"><a href="http://simat.ac.in">SIMAT E-Governance</a>©</p>
                
                </div>
                </div>
            </aside>