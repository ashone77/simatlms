<?php 
session_start();

	include("config.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password) && !is_numeric($email))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_name,password) values ('$email','$','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>

<!--	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>-->

	<div  class="outer-container">
		
		<!--<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>-->

		<form action="signup.php" method="post" class="form">
        <div class="container">
       <!-- <div class="container">-->
            <!-- <div class="row">
            <div class="col-md-5"> -->
            <h1><b>Registration Portal</b></h1>
            <br>
            <hr class="line">
           <!-- <hr class="mb-3">-->
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
            <!-- <hr class="mb-3"> -->
            <hr class="line">
            <div class="button-container">
               
            <a  href="login.php" style="font-weight:bold; width:100%;" type="submit" id="registered" name="create" value="Sign Up">SignUp</a>
                </form>


	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!--	<script type="text/javascript">
$(function(){
    $('#registered').click(function(e){

      

 var valid = this.form.checkValidity();
 if (valid){
        var firstname=$('#firstname').val();
        var lastname=$('#lastname').val();
        var email=$('#email').val();
        var phonenumber=$('#phonenumber').val();
        var password=$('#password').val();
        
            e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url : 'functions.php',
                    data : {firstname:firstname,lastname:lastname,email:email,phonenumber:phonenumber,password:password},
                    success: function(data){

                        Swal.fire({
            'title': "Successful",
            'text' : 'Successfully registered!',
            'type': 'success'
                        }).then(function(){
                            window.location.href="login.php"    //redirect to next page here!!!
                        })

                    },
                    error :function(data){

                        Swal.fire({
            'title': 'Errors',
            'text':'There were errors while saving data',
            'type': 'success'
                        })
                    }
                });
        }
        else{
        }
    });
});
</script>-->
</body>
</html>