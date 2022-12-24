<?php 


define('INCLUDE_CHECK',true);

require "db/conn.php";


  $connection=new Database;
	$a=$_POST['firstname'];
	$b=$_POST['lastname'];
	$c=$_POST['username'];
	$d=$_POST['email'];
	$e=$_POST['password'];
	$f=$_POST['uname'];
	$g=$_POST['profile'];
	
if(isset($_POST['register'])) {
	
		$saved=mysqli_query("Insert into member(firstname,lastname,username,email,password,uname,profile)values('$a','$b','$c','$d','$e','$f','$g')");
  if ($saved) {
    header('location:signup.php?status=error&msg= succsoss full registerd');
}	  
}

 ?>
 
 <!DOCTYPE html>
<html>
<head>
	<title>mekelleshope-Registration-Form</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

  <script src="bootstrap/js/jquery.min.js"></script>
</head>
<body>
<div class="container-fluid" >
  <div class="text-center">
  </div>
  <div class="row" style="max-height: 700px;">
    <div class="col-sm-5" style="float:left;margin-top:0px; margin-left: 100px;">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <a href="../index.php"><h3 style="color: #fff;">Mekelleshop.com</h3></a>
          <h4>Registration Form</h4>
        </div>
        <div class="panel-body">
        <form method="post" action="" name="myForm" onsubmit="return validateForm()">
          <?php 

                        if (isset($_GET['status'])) {
                            $id=$_GET['status'];
                            $msg=$_GET['msg'];
                            ?>
                            <div id="$id" class="alert alert-danger">
                                <strong></strong><h4 style=";"> &nbsp; <?php echo $msg; ?>! <a href="index.php" style="color: ;">click here</a></h4>
                            </div>
                            <?php
                        }

                        ?>
      
        <div class="form-group">
           <label for="usr" class="text">First Name:-</label>
           <input type="text" class="form-control" placeholder="first Name" id="usr" name="firstname" required="" />

            </div><br><br><br>
             <div class="form-group">
           <label for="usr" class="text">Last Name:-</label>
          <input type="text" class="form-control" placeholder="Last Name" id="usr" name="lastname" required="" />
            </div><br><br>
             <div class="form-group">
           <label for="usr" class="text">User Name:-</label>
            <input type="text" class="form-control" id="usr"  placeholder="user name" name="username" required=""> 
            </div><br><br>
          <div class="form-group">
           <label for="E-mail" class="text">E-mail:-</label>
             <input type="email" class="form-control" id="usr"  placeholder="E-mail" name="email" required="">
              </div><br><br>
          <div class="form-group">
             <label for="pass" class="text">Password:-</label>
             <input  type="password" class="form-control" id="usr" minlength="6" placeholder="password" name="password" required="">
               </div><br><br>
		
			   <form action="verification.php" method="POST">
      
      <div class="form-group">
        <label for="uname"><strong>Phone Number</strong></label>
        <input type="text" id="number" placeholder="Enter +91phone number" name="uname" required>
      </div>
      <div id="recaptcha-container"></div>
      <button type="button" onclick="phoneAuth();">Send Otp</button>
    
			<div class="form-group">
      <input type="text" id="verificationCode" placeholder="Enter verification code">
      
      </div>
     
      <button type="button" onclick="codeverify();">Verify code</button>
	
    </form>
			   
			   
			   
			   
			   
			   
               <div class="form-group" style="display: none;">
             <label for="pass" class="text">profilepic:-</label>
             <input  type="text" value="default.jpg" class="form-control" id="usr" name="profile" required="">
               </div><br><br>
               
               
       <label><input type="checkbox" value="" checked >By Clicking Register You Are Agree To All <a href="terms.text" style="text-decoration: underline;">Terms & Cocies</a></label><br><br>

               <div class="form-group">
                  <input type="submit" value="Register" class="btn btn-danger" id="usr" name="register" style="width: 100%; height: 50px; border-radius:360px; background:#000;border: none; ">
                </div>
                <label><a href="index.php" style="color: red; text-decoration: underline;">alredy have an account Login</a></label>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
    appId: "1:99446038979:web:6876f093329352b3c71d76",
    apiKey: "AIzaSyDqoyvnqM44fvu4Gvlfc_Dj1Di2VztJxK4",
    authDomain: "phone-auth-76a5e.firebaseapp.com",
    projectId: "phone-auth-76a5e",
    storageBucket: "phone-auth-76a5e.appspot.com",
    messagingSenderId: "99446038979",
    measurementId: "G-CCJ2B0YHR3"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
</script>
    <script src="firebase.js" type="text/javascript"></script>
	
	<script>
	window.onload = function() {
    render();
};

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}

function phoneAuth() {
    //get the number
    var number = document.getElementById('number').value;
    // alert(number);
    //it takes two parameter first one is number and second one is recaptcha
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
        //s is in lowercase
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        console.log(coderesult);
        alert("Message sent");
    }).catch(function(error) {
        alert(error.message);
    });
}

function codeverify() {
    var code = document.getElementById('verificationCode').value;


    coderesult.confirm(code).then(function(result) {
        alert("Successfully Verified");
		
        var user = result.user;
        console.log(user);
    }).catch(function(error) {
        alert(error.message);
    });
}
	</script>
	
</body>
</html>