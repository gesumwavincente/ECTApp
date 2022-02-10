<?php
    include_once '../includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Nunito:400,600,700|Quicksand:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>ECT- Admin Dashboard</title>
</head>
<body>
    <div class="side_bar_wrapper">
        
            <a href="index.php"><img src="../images/logoo.png" alt="logo" height="90px"></a>
            <div class="side_container">
                
            
                <h3><i class="fas fa-home"></i> Dashboard</h3>
            <ul> 
                <li><a href="clientele.php"><i class="fas fa-address-card"></i> Clientele</a></li>
                <li><a href="training_attendance.php"><i class="fas fa-users"></i> Training attendance</a></li>
                <li><a href="results.php"><i class="fas fa-poll"></i> Results</a></li>
                <li><a href="referrers.php"><i class="fas fa-user-friends"></i> Referrers</a></li>
                <li><a href="exams.php"><i class="fas fa-check-double"></i> Exams</a></li>
            </ul>
            <h3><i class="fas fa-info-circle"></i> More</h3>
                <ul>
                    <li><a href="users.php"><i class="fas fa-users-cog"></i> Users</a></li>
                    <li><a href="trainers.php"><i class="fas fa-chalkboard-teacher"></i> Trainers</a></li>
                    <li><a href="course.php"><i class="fas fa-list-alt"></i> Courses</a></li>
                    <li><a href="training.php"><i class="fas fa-hard-hat"></i> Trainings</a></li>
                </ul>
            <h3><i class="fas fa-calendar-alt"></i> Calender</h3>
                <ul>
                    <li><a href="events.php"><i class="fas fa-calendar-week"></i> Events</a></li>
                </ul>
            </div>
        
    </div>
    <div class="nav_wrapper">
        <button>Logout</button>
    </div>