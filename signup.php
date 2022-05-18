<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-TASK</title>
    <link rel="shortcut icon" type="image/png" href="icons/favicon.png" />
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/ceb6832a1f.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@200;300&display=swap" rel="stylesheet">
    </head>
<body>
    <nav class="navbar">
    <div class="navbar__container">
        <a href="signup.php" id="navbar__logo"><i class="fa-solid fa-list-check"></i>E-Task</a>
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="signup.php" class="navbar__links">   
                Home
                </a>
            </li>
        </nav> 

    <div class="main">
        <div class="content">

            <h1>Empoyee & task <br>Management <br>System</h1>

                <section class="formcontainer">
                    <h2>Register for a new account</h2>
                    <div class="formcontent">
                    <form action="includes/signup.inc.php" method="POST">
                        <div class="user-details">
                        <div class="input-box">
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" placeholder="First name" name="firstname">
                        </div>    
                        <div class="input-box">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" placeholder="Last name" name="lastname">
                        </div>   
                        <div class="input-box">
                            <label for="username">Username</label>
                            <input type="text" id="username" placeholder="Username" name="username">  
                        </div>   
                        
                        <div class="input-box">
                            <label for="email">Email</label>
                            <input type="text" id="email" placeholder="email" name="email">
                        </div>   
                         <div class="input-box">
                            <label>Password</label>
                            <input type="password" name="password">
                        </div>
                        <div class="input-box">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password">
                        </div>

                        </div>
                        
                        <div class="input-box">
                          <label>Gender</label>
                            <select name="gender">
                              <option value="">Select</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>

                       </div>
                        <div class="button">
                            <input type="submit" name="submit" value="Sign up">
                            <input type="reset" value="Reset">
                        </div>
                    </form>
                    <div class="link">
                    <?php
                        if (isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                             echo "<p>Fill in all fields!</p>";
                            }
                            else if ($_GET["error"] == "invalidusername"){
                                echo "<p>Choose proper username!</p>";
                             }
                            else if ($_GET["error"] == "invaliemail"){
                                echo "<p>Choose proper email!</p>";
                            }
                            else if ($_GET["error"] == "passwordmismatch"){
                                echo "<p>Password doesnt match!</p>";
                            }
                            else if ($_GET["error"] == "stmtfailed"){
                                echo "<p>OOPS.. something went wrong try again!</p>";
                            }
                            else if ($_GET["error"] == "usernametaken"){
                                echo "<p>Username already taken!</p>";
                            }
                            else if ($_GET["error"] == "none"){
                                echo "<p>SUCCESS! you have signed up!</p>";
                            }

                        }

                        ?>
                    Alreay have an account?
                    <a href="login.php">Login </a> here</a></p>            
                    </div>
                    </div>
                </section>


        </div>
    </div>
</body>
</html>