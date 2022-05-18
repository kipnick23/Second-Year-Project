<?php

include 'includes/header.inc.php'

?>
<?php 
require_once "includes/config.inc.php";

$qry = $con->query("SELECT * FROM users where usercode = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}


?>

    <div class="main_content">
        <div class="header">
          
        </div>  
        <div class="info">

                  <div class="tasks_container">
                    <form  id="create-account-form" action="includes/edit-employee.inc.php" method="POST">
        
                        <div class="title">
                            <h2>Register an employee</h2>
                        </div>
                        
                        
                        <div class="input-field">
                            <label for="userid">ID Number</label>
                            <input type="text" id="employeecode" placeholder="ID Number" name="userid">

                        </div>
            
                        <div class="input-field">
                            <label for="firstname">First Name</label>
                            <input type="text" placeholder="First Name" name="firstname" value="<?php echo isset($firstname) ? $firstname : '' ?>">
                            <input type="hidden" name="usercode" value="<?php echo $usercode; ?>">

                        </div>
                        
                        
                        <div class="input-field">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" placeholder="Last Name"  name="lastname" value="<?php echo isset($lastname) ? $lastname : '' ?>">

                        </div>

                        <div class="input-field">
                            <label for="username">Username</label>
                            <input type="text" id="username" placeholder="Username"  name="username" value="<?php echo isset($username) ? $username : '' ?>">

                        </div>

                        <div class="input-field">
                          <label>Gender</label>
                            <select name="gender">
                                <option value="male" <?php echo isset($gender) && $gender == 'male' ? 'selected' : '' ?>>Male</option>
			                    <option value="female" <?php echo isset($gender) && $gender == 'female' ? 'selected' : '' ?>>Female</option>
                            </select>

                       </div>


                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Email"  name="email" value="<?php echo isset($email) ? $email : '' ?>">

                        </div>
                        
                        <div class="input-field">
                        <label for="department">Department</label>
                        <input type="text" id="department" placeholder="Department"  name="department" value="<?php echo isset($department) ? $department : '' ?>">
                        </div>
        

                        <button type="Submit" name="update" class="btn">Update</button>
                    </form>
                    <b>
                    <?php
                        if (isset($_GET["error"])){
                            if ($_GET["error"] == "passwordmismatch"){
                                echo "<p>Password doesnt match!</p>";
                            }
                            else if ($_GET["error"] == "none"){
                                echo "<p>SUCCESS! you have signed up!</p>";
                            }
                        }
                        ?>
                    </b>
                </div>

              </div>
      </div>
    </div>

</body>

</html>