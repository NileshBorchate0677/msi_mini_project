<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=`, initial-scale=1.0">

        <!-- Meta Description (Important for SEO) -->
    <meta name="description" content="Easily generate MIS reports in PDF format from user-provided data. Quick and reliable report generation with just a few clicks. Perfect for businesses and organizations.">

        <!-- Meta Keywords (Optional but useful) -->
        <meta name="keywords" content="MIS reports, PDF generation, report generation tool, user data reports, automated report creation, business reports, MIS PDF generator">

        <!-- Meta Author -->
        <meta name="author" content="Your Website Name">

        <!-- Open Graph for Social Media (Optional) -->
        <meta property="og:title" content="Generate MIS Reports in PDF | Fast and Easy">
        <meta property="og:description" content="Generate professional MIS reports in PDF format directly from user data. Simple, quick, and automated for businesses.">
        <meta property="og:image" content="URL-to-your-image">
        <meta property="og:url" content="https://yourwebsite.com">

        <!-- Twitter Card for Social Sharing (Optional) -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Generate MIS Reports in PDF | Fast and Easy">
        <meta name="twitter:description" content="Quickly create MIS reports in PDF format from user-provided data.">
        <meta name="twitter:image" content="URL-to-your-image">

        <title>MIS Report</title>
        <link rel="icon" href="img/log.jpg" type="img/log.jpg">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="css/registration.css">
    </head>

    <body>
        
        <div class="container">
                     
          <div class="title">Registration</div>
                    <div>
                    <input class="ok" type="reset" value="Clear">
                    </div>

            <form action="regisbtn.php" method="post">
                

                        <?php

                            if(isset($_SESSION['status']) && ($_SESSION['status']) !='')
                            {
                                ?>
                                         <div class="alert alert-warning alert-dismissible fade show col-md-10" role="alert">
                                           <?php
                                            
                                             echo $_SESSION['status'];

                                            ?>
                                         
                                        </div>
                                <?php
                            }

                        ?> 
             

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name : </span>
                        <input type="name" name="t1" placeholder="Enter your full name" required>
                    </div>

                    <div class="input-box">
                        <span class="details"for="gender" >Gender:</span>
                        <select id="gender"name="t2" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <span class="details"for="department" >Name of Department:</span>
                        <select id="department" name="t3" placeholder="Select your Department"required>
                         <option value="">Select Your Department </option>
                            <option value="MCA">MCA</option>
                            <option value="BCA">BCA</option>
                            <option value="MBA">MBA</option>
                            <option value="BBA">BBA</option>
                            <option value="BSc">BSc</option>
                            <option value="B.con">B.com</option>
                            <option value="BA">B.A</option>
                            <option value="B.tech">B.tech</option>
                            <option value="B.voc">B.voc(Softwewre developement)</option>
                            <option value="B.Voc">B.voc (Agriculture)</option>
                            <option value="M.Sc">M.Sc - chemistry</option>
                            <option value="M.Sc">M.Sc - Physics</option>
                            <option value="M.Sc">M.Sc - Botney</option>
                            <option value="M.Sc">M.Sc - Zoology</option>
                            <option value="M.Sc">M.Sc - Maths</option>
                            <option value="M.Sc">M.Sc - Comptuer Sci</option>
                            <option value="mcm">M.C.M </option>
                            <option value="mhrd">M.H.R.D </option>
                            <option value="MCM">M.C.M </option>
                            <option value="m.tech">M.Tech (Cosmatics) </option>
                            <option value="BLISc">B.L.I.Sc </option>
                        </select>
                    </div>

                    <div class="input-box">
                        <span class="details">Department Email : </span>
                        <input type="email" name="t4" placeholder="Enter Department Email" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Username : </span>
                        <input type="username"  name="t5" placeholder="Enter your Username" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Password : </span>
                        <input type="password" name="t6" placeholder="Enter your Password" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Confirm Password : </span>
                        <input type="password" name="t7" placeholder="Conform Your Password" required>

                    </div>
                    
                    <div class="input-box">
                        <span class="details">Who is your fav teacher?</span>
                        <input type="hint"  name="t8" placeholder=" For Hint Question" required>
                    </div>

                </div>

                <div class="log">Already have an Account? <a href="login.php">Login Here</a> </div><br>
                  
                <div class="form-btn" >
                    <input type="submit"  class="btn btn-primary col-md-12" value="Register" name="submit" > 
                </div>
               
            </form><br><br>
            <br>
                 
            
        </div>
    </body>
 
</html>