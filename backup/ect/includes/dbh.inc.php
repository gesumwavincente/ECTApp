<?php
    $localhost = "localhost";
    $uname = "root";
    $pword = "";
    $dbName = "ktl_ect2";

    $conn = mysqli_connect($localhost, $uname, $pword, $dbName);

    if(!$conn){
        die ("Connection failed :".mysqli_connect_error());
    }