<?php
    $localhost = "localhost";
    $uname = "root";
    $pword = "";
    $dbName = "";

    $conn = mysqli_connect($localhost, $uname, $pword, $dbName);

    if(!$conn){
        die ("Connection failed :".mysqli_connect_error());
    }