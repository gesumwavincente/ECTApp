<?php

 $mysqli = new mysqli('localhost','root','','ectcoke_ectdb') or die(mysqli_error($mysqli));
session_start();
    
if (isset($_POST['submit'])) {
    
  $uid = mysqli_real_escape_string($mysqli, $_POST['uid']);
  $pwd = mysqli_real_escape_string($mysqli, $_POST['pwd']);

  if(empty($pwd || empty($uid))){
     echo "<script>alert('Please fill the fields!')</script>";
  }else{
    $sql = "SELECT * FROM users WHERE user_email='$uid' AND pwd='$pwd';";
    $result = mysqli_query($mysqli, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck < 1 ){
       echo "<script>alert('Username or Password is incorrect!')</script>";
    }else {
      if ($row = mysqli_fetch_assoc($result) ) {
        if ($row['user_email'] == 'gesumwavincente@gmail.com') {
          $_SESSION['au_uid'] = $row['U_id'];
          $_SESSION['au_email'] = $row['user_email'];
          $_SESSION['au_fullname'] = $row['full_name'];
          header("Location: ../design/admin/");
          exit(); 
        }else{
          $_SESSION['cu_uid'] = $row['U_id'];
          $_SESSION['cu_email'] = $row['user_email'];
          $_SESSION['cu_fullname'] = $row['full_name'];
          header("Location: ../design/user/");
          exit(); 
        }
               
      }
    }
   }
}
if (isset($_POST['register'])) {

  $full_name = $_POST['full_name'];
  $user_email = $_POST['user_email'];
  $phone_number = $_POST['phone_number'];
  $pwd = $_POST['pwd'];
  $repwd = $_POST['repwd'];

  
   if ($pwd != $repwd) {
    echo "<script>alert('Password mismatch!')</script>";
   }
else{
      $mysqli->query("INSERT INTO users (full_name, user_email, phone_number, pwd)VALUES('$full_name', '$user_email', '$phone_number',  '$pwd')")  or die($mysqli->error());             
         echo "<script>alert('Created successful!')</script>";
   }     
}

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>ECT- Login Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:200,100,300,500,300,900|RobotoDraft:200,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body style="background: url(5.png) ;background-size: cover; background-repeat: no-repeat;" >

  
<!-- Mixins-->
<!-- Pen Title-->
<div>
<div class="pen-title">
  <!--<a href="ect.co.ke"><img src="logoo.png"></a>-->
</div>

<div class="container container-frame">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form  method="post" action="index.php" >
      <div class="input-container">
        <input type="#{type}"  name="uid" required="required"/>
        <label for="#{label}">Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password"  name="pwd" required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <!-- <button><span>Go</span></button> -->
        <button type="submit" name="submit"><span>Login</span></button>
      </div>
      <!--<div class="footer"><a href="#">Forgot your password?</a></div>-->
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form method="post" action="index.php">
      <div class="input-container">
        <input type="text" id="#{label}" name="full_name" required="required"/>
        <label for="#{label}">Full name</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="email" id="#{label}" name="user_email" required="required"/>
        <label for="#{label}">email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="#{label}"  name="phone_number" required="required" maxlength = "10"/>
        <label for="#{label}">Phone number</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="#{label}" name="pwd"  required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="#{label}" name="repwd" required="required"/>
        <label for="#{label}">Repeat Password</label>
        <div class="bar"></div>
      </div>
    
      <div class="button-container">
        <button type="submit" name="register"><span>Register</span></button>
      </div>
    </form>
  </div>
</div>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
