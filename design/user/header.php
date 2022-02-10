<?php
 $mysqli = new mysqli('localhost','root','','ectcoke_ectdb') or die(mysqli_error($mysqli));
    session_start();
  if (!isset($_SESSION['cu_uid'])) {
    header("Location:/ect/nlogin/");
  }
  


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="fontwebawesome/fontawesome-free-5.7.1-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Nunito:400,600,700|Quicksand:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <title>ECT- Admin Dashboard</title>
    <style>
  

.modal input {
    width: 150%;
    margin-bottom: 13px;

}

.modal input[type=submit] {

  width: 40%;
  margin: 12px 0 0 22px;
  background: #E0192e;
  color: white;
  border: none;

  }

  .modal  input[type=text],.modal input[type=password],.modal input[type=number],.modal input[type=email],.modal input[type=date],.modal textarea,.modal select, .modal option {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
.modal button {
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  background-color: #ccc;
}

.modal button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.modal .cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.modal .imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

.modal .container {
  padding: 16px;
}

.modal span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 100; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 10px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 2% auto 5% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.modal .close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.modal .close:hover,
.modal .close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.modal .animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.modal .btn_lgn{
  color: #2e3092;
  transition: 0.5s; 
  font-weight: bold;
  text-transform: uppercase;
  font-size: 14px;
  background:grey;
}

.modal .btn_lgn:hover, .btn_lgn:active, .btn_lgn:focus {
  color: #E0192e ;
  outline: none;
  text-decoration: none;
  text-decoration: underline;

}

.autocomplete {
  position: relative;
  display: inline-block;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
</head>
<body>
    <div class="nav_wrapper">
    <div class="logo"><a href="index.php"><img src="../images/logoo.png" alt="logo" height="90px"></a></div>
        <ul> <li>
            <?php
              if (isset($_SESSION['cu_uid'])) {
                echo '
                  <form action="../includes/logout.php" method="POST">
                  <button type="submit" style="color:lightgrey;" name="log-out">Logout</button>
                  </form>
                ';
              }
            
            ?>
                <li><a href="course.php"><i class="fas fa-list-alt"></i> Courses</a></li>
                <li><a href="results.php?trainindID="><i class="fas fa-poll"></i> Results</a></li>
                <!-- <li><a href="training_attendance.php"><i class="fas fa-users"></i> Training attendance</a></li> -->
                <li><a href="referrers.php"><i class="fas fa-user-friends"></i> Referrals</a></li>
                <li><a href="clientele.php"><i class="fas fa-address-card"></i> Clientele</a></li>
                <li><a href="trainers.php"><i class="fas fa-chalkboard-teacher"></i> Trainers</a></li>
                <li><a href="training.php"><i class="fas fa-chalkboard-teacher"></i> Training Event</a></li>
                
                <li style="position:absolute; color:white;">
                  <button title="Update Profile" onclick="document.getElementById('id04').style.display='block'" type="button"  class="btn  btn-lg" style="padding: 5px; color:white;">
                <?php
                      if (isset($_SESSION['cu_uid'])) {
                        echo' 
                        Welcome '.$_SESSION['cu_fullname'];
                      }
                  ?>
                  </button>
                  </li>
                
                <li>
                   

                </li>
                </ul>
        
    </div>

    <div id="id04" class="modal">
                <form class="modal-content animate" method="post" action="index.php">
                  <span onclick="document.getElementById('id04').style.display='none'" style="color: black;" class="close" title="Close Modal">&times;</span>
                  <div class="container" style="padding: 5px 20px 15px 20px; background-color: #f2f2f2; border: 1px solid lightgrey;  border-radius: 3px;">
                          <h3 style="text-align: center;">Edit Profile</h3>
                          <?php 
                                $result = $mysqli->query('SELECT * FROM users  WHERE U_id = '.$_SESSION['cu_uid'].';') or die($mysqli->error);
                  while ($row=$result->fetch_assoc()):
                           ?>
                           <input type="hidden" name="upid" value="<?php echo $row['U_id'] ?>">
                          <input type="text" value="<?php echo $row['full_name']  ?>" name="upname" placeholder="Firstname">
                          <input type="text" value="<?php echo $row['user_email']  ?>" name="upemail" placeholder="Lastname">
                          <input type="text" value="<?php echo $row['phone_number']  ?>" name="upnum" placeholder="Job Title" >
                          <h3>New Password</h3>
                          <input type="password" name="uppwd"placeholder="New Password"/ required>
                          <input type="password" name="uprepwd"placeholder="Retype Password"/ required>
                          <?php endwhile; ?>             
                  <input type="submit" name="update_profile" value="Update Profile" class="btn btn-info btn-lg" style="width: 95%;"> </div>
                    </form>

           </div>

           <?php
                if (isset($_POST['update_profile'])) {

                $upid = $_POST['upid'];
                $upname = $_POST['upname'];
                $upemail = $_POST['upemail'];
                $upnum = $_POST['upnum'];
                $uppwd = $_POST['uppwd'];
                $uprepwd = $_POST['uprepwd'];
                 

                 if ($uprepwd != $uppwd) {
                   echo "<script>alert('Update failed! Password mismatch!!!')</script>";
                 }else{
                  
                      $mysqli->query("UPDATE users SET full_name='$upname', user_email='$upemail', phone_number='$upnum' ,pwd='$uppwd' WHERE U_id = $upid ") or  die($mysqli->error());
echo "<script>alert('Profile update succcessful!')</script>";
                  } 
                } 

           ?>