<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>MIS Report</title>
    <link rel="icon" href="img/log.png" type="img/log.jpg">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/registration.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">

       

        <form action="login.php" method="post">
        <input class="ok" type="reset"  value="Clear">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="l1" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="Password" name="l2" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forget">
                <label><input type="checkbox"> Remember Me</label>
                <a href="forgotpass.html">Forget Password?</a>
            </div>

            <button type="submit" class="btn" name="sublog">Login</button>

            <div class="register-link">
                <p>Don't have an Account? <a href="registration.php">Register</a>
                </p>
            </div>

        </form>

        <?php
         if (isset($_POST["sublog"])) 
         {
           $un = $_POST["l1"];
           $pass = $_POST["l2"];
            require_once "database.php";
            $sql = "SELECT * FROM user_reg WHERE username = '$un'";
            $res = mysqli_query($con, $sql);
            $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if ($user) 
            {
                if ($pass==$user['pss']) {
                    session_start();
                    $_SESSION["user"] = $un;
                    header("Location: home.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
             }
             else{
                echo "<div class='alert alert-danger'>username does not match</div>";
            }
         }
        ?>
    </div>
</body>

</html>