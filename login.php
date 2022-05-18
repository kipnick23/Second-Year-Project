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
        <a href="login.php" id="navbar__logo"><i class="fa-solid fa-list-check"></i>E-Task</a>
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="login.php" class="navbar__links">   
                Home
                </a>
            </li>
        </nav> 

    <div class="main">
        <div class="content">
            <div>
            <h1>Empoyee & task <br><span>Management</span> <br>System</h1>

            </div>

                <section class="formcontainer">
                    <h2>Login to your account</h2>
                    <div class="formcontent">
                    <form action="includes/login.inc.php" method="POST">
                        <div class="user-details">
                        <div class="input-box">
                            <label for="username">Username</label>
                            <input type="text" id="username" placeholder="Username" name="username">
                        </div>   
                         <div class="input-box">
                            <label>Password</label>
                            <input type="password" id="password" placeholder="Password" name="password">
                        </div>

                        <div class="button">
                            <input type="submit" name="submit" value="Log in">
                            <input type="reset" value="Reset">
                        </div>
                    </form>
                    <p class="link">Dont have an account?<br>
                    <a href="signup.php">Register </a> here</a></p>
                    </div>
                    <div class="link">
                    <?php
            if (isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "wronglogin"){
                    echo "<p>Incorrect Login information!</p>";
                }

            }

            ?>                 
                    </div>
                    

                </section>
        </div>
    </div>
</body>
</html>