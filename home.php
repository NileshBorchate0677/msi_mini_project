<?php
session_start();
$_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    
    <title>MIS report</title>
    <link rel="icon" href="img/log.png" type="log.jpg">
    <link rel="stylesheet" href="css/home1.css">
    
</head>
<body>
    <?php
    $userhome=$_SESSION["user"];
    if($userhome == true)
    {
    
    }
    else{
    header('location:login.php');
    }
    ?>
<div class="navbar">
    <div class="logo">
        <img src="img/log.jpg" alt="Logo">
    </div>
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="upcomeing.html">Upcoming Events</a></li>
        <li><a href="updatepass.html">Change Password</a></li>
    </ul>
    <button class="option-btn"> <a href="logout.php"><img src="img/logoutbtn.jpg" alt=""></a> </button>
</div>

    <div class="containerh">
        <div class="headertext">
            <span>Information Management System</span>
            <h1>"Welcome to Precision Analytics: Transforming Data into Strategic MIS Insights"</h1>
            <p>"Harmony in Data, Symphony in Decisions: Embark on a Beautiful Journey of College Management with Our MIS Report Generator."</p>
            <br>
            <a href="mispdf.html">Create New MIS</a>
        </div>
</div>

</body>
</html>