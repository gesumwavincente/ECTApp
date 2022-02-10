<?php

if (isset($_POST['submit'])) {
  
  $conn = mysqli_connect("localhost","root","","kobby_ict");

  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  if(empty($uid) || empty($pwd || empty($email))){
    header("Location: ../index.php?login=empty");
     exit();
  }else {
    $sql = "SELECT * FROM login WHERE username='$uid'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck < 1){
      header("Location: ../index.php?login=error1");
      exit();
    }else {
      if ($row = mysqli_fetch_assoc($result)) {
        //dehashing the password
        $dehashPwdCheck = password_verify($pwd, $row['password']);
      }if ($dehashPwdCheck == false) {
        header("Location: ../index.php?login=error2");
        exit();
      }elseif ($dehashPwdCheck == true) {
        //login user here
        $_SESSION['u_id'] = $row['username'];

        header("Location: ../index.php?login=success");
        exit();
      }
    }
      }
}else {
  header("Location: ../index.php?login=error");
  exit();
}
