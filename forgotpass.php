<?php
 require_once "database.php";
 // Check connection
 if ($con->connect_error) 
 {
    die("Connection failed: " . $con->connect_error);
 }

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $hint_answer = $_POST["hint_answer"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // Basic validation
    if ($new_password != $confirm_password) {
        echo "Error: New password and confirm password do not match.";
     } else {
        // Check if username and hint answer match in the database
        $sql = "SELECT * FROM user_reg WHERE username='$username' AND hint ='$hint_answer'";
        $result = $con->query($sql);


        if ($result->num_rows > 0) {
            // Update password
            
            $update_sql = "UPDATE user_reg SET pss =' $new_password' WHERE username='$username'";
            if ($con->query($update_sql) === TRUE) {
                echo "Password reset successfully!";
                
            } else {
                echo "Error updating password: " . $con->error;
            }
        } else {
            echo "Error: Username or hint answer is incorrect.";
        }
    }
 } else {
    // If someone tries to access this PHP file directly without submitting the form, redirect them to the form page
    header("Location: forgot_password.html");
    exit;
 }

  // Close connection
 $con->close();
?>
