<?php
session_start();
$con = mysqli_connect("localhost","root","","msi_database");

if(isset($_POST["submit"]))

{
	$fn=$_POST["t1"];
	$gen=$_POST["t2"];
	$nod=$_POST["t3"];
	$email=$_POST["t4"];
	$usern=$_POST["t5"];
    $pass=$_POST["t6"];
	$conpass=$_POST["t7"];
    $hint=$_POST["t8"];


	    if($email=='email')
		{
		  
		}

        if($pass == $conpass)
    	{
    		    $reg_query="INSERT INTO user_reg VALUES('$fn','$gen','$nod','$email','$usern','$pass','$hint')";
	           $red_query_run =mysqli_query($con, $reg_query);

	          if( $red_query_run)
	          {
		           $_SESSION['status'] = "you are sucessfully registerd ";
      			   header("Location: registration.php");
	          }
	          else
	          {
		          	$_SESSION['status']="Something went wrong";
		          	header("Location: registration.php");
	          }


    	}
    	else
    	{
    		$_SESSION['status']="Passward and confirm Passward Does not Match";
		    header("Location: login.php");

    	}
    

 
}

?>