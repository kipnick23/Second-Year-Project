<?php
session_start();
$usercode = $_SESSION['usercode'];
$username = $_SESSION['username'];
$type = $_SESSION['type']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-TASK</title>
    <link rel="shortcut icon" type="image/png" href="icons/favicon.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" hreft="css/login.css">
    <script src="https://kit.fontawesome.com/ceb6832a1f.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@200;300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

</head>
<body>
  <nav class="navbar">
    <div class="navbar__container">
        <a href="index.php" id="navbar__logo"><i class="fa-solid fa-list-check"></i>E-Task</a>
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="contacts.php" class="navbar__links">   
                About us
                </a>
            </li>
            <!--<li class="navbar__item">
                <a href="#" class="navbar__links">   
                Records
                </a>
            </li>**same as contacts-->

            <li class="action">
              <div class="profile" onclick="menuToggle();">
                  <img src="images/user.png" alt="">
              </div>
      
              <div class="menu">
                  <h3>
                      <?php
                      if ($type == 2) {
                        echo "User Account";
                      }
                      else {
                      echo "Admin";
                      }?>
                      <div>
                          <?php
                          echo "$username";
                          ?>
                      </div>
                  </h3>
                  <ul>
                      <li>
                          <span class="material-icons icons-size">person</span>
                          <a href="view-user.php">My Account</a>
                      </li>
                      <li>
                          <span class="material-icons icons-size">mode</span>
                          <a href="edit-user.php">Edit Account</a>
                      </li>
                      <li>
                          <span class="material-icons icons-size">insert_comment</span>
                          <a href="includes/logout.inc.php">Logout</a>
                      </li>
                  </ul>
              </div>
            </li>
        </ul>
    </div> 
      <script>
          function menuToggle(){
              const toggleMenu = document.querySelector('.menu');
              toggleMenu.classList.toggle('active')
          }
      </script>
  </nav>

<div class="wrapper">
    <div class="sidebar">
        <ul>
          <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
          <?php
          if ($type == 2){
            echo "<li><a href='manage-tasks.php'><i class='fas fa-project-diagram'></i>Manage Tasks</a></li>";
            echo "<li><a href='contacts.php'><i class='fas fa-map-pin'></i>Contacts</a></li>";
          }
          else {
            echo "<li><a href='manage-tasks.php'><i class='fas fa-project-diagram'></i>Manage Tasks</a></li>";
            echo "<li><a href='manage-employees.php'><i class='fas fa-blog'></i>Manage Users</a></li>";
            echo "<li><a href='add-task.php'><i class='fas fa-user'></i>Create Task</a></li>";
            echo "<li><a href='add-employee.php'><i class='fas fa-address-card'></i>Add User</a></li>";
            echo "<li><a href='employee-reports.php'><i class='fas fa-address-book'></i>Employee Reports</a></li>";
            echo "<li><a href='contacts.php'><i class='fas fa-map-pin'></i>Contacts</a></li>";

          }
          ?>
        </ul> 
    </div>
</div>