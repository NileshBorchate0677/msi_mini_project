<?php
 if (isset($_REQUEST["sublog"])) 
    {
        $un=$_REQUEST["l1"];
        $pass=$_REQUEST["l2"];
            require_once "database.php";
            $sql="select * from user_reg where username ='$un' password='$pass'";
				$res=mysqli_query($con,$sql);
            $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if ($user) 
            {
                if (password_verify($pass, $user["l2"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: home.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
             }
             else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
    }
?>