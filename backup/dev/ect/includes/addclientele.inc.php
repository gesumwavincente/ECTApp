<?php
    if(isset($_POST[''])){
        require 'dbh.inc.php';

        $name = $_POST['fname'];
        $phone = $_POST['phone_no'];
        $email = $_POST['email'];
        $institution = $_POST['ins'];
        $profession = $_POST['prof'];

        
            $sql = "SELECT name FROM clientele WHERE email=? OR phone=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location:../design/clientele.php?error=sqlerror");
                exit();
            }else{
               mysqli_stmt_bind_param($stmt,ss,$username,$phone);
               mysqli_stmt_execute($stmt);
               mysqli_stmt_store_result($stmt);
               $resultCheck = mysqli_stmt_num_rows($stmt);
               if($resultCheck > 0){
                    header("Location:../design/clientele.php?error=recordavailable&fname=".$name."&phone_no=".$phone."&email=".$email."&ins=".$institution."&prof=".$profession);
                    exit();
               }else{
                   $sql = "INSERT INTO clientele()VALUES(?,?,?,?,?)";
                   $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location:../design/clientele.php?error=sqlerror");
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt,"sssss", $name, $phone, $email, $institution, $profession);
                        mysqli_stmt_execute($stmt);
                        header("Location:../design/clientele.php?signup=success");
                        exit();
                    }
            }
        }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }else{
        header("Location:../design/clientele.php");
    }