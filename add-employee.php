<?php

include 'includes/header.inc.php'

?>


    <div class="main_content">
        <div class="header">
          
        </div>  
        <div class="info">
                  <!-- tasks wrapper starts -->
                  <div class="tasks_container">
                    <form  id="create-account-form" action="includes/add-employees.inc.php" method="POST">
                            <h2>Register an employee</h2>
                        <div class="input-field">
                            <label for="userid">ID Number</label>
                            <input type="text" id="employeecode" placeholder="ID Number" name="userid">

                        </div>
            
                        <div class="input-field">
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" placeholder="First Name" name="firstname">

                        </div>
                        
                        
                        <div class="input-field">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" placeholder="Last Name"  name="lastname">

                        </div>

                        <div class="input-field">
                            <label for="username">Username</label>
                            <input type="text" id="username" placeholder="Username"  name="username">

                        </div>

                        <div class="input-field">
                          <label>Gender</label>
                            <select name="gender">
                              <option value="">Select</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>

                       </div>


                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Email"  name="email">

                        </div>
                        
                        <div class="input-field">
                        <label for="department">Department</label>
                        <input type="text" id="department" placeholder="Department"  name="department">
                        </div>

                        <input type="hidden" id="emp_by" name="emp_by" value="<?php echo $usercode; ?>">

                        <div class="input-field">
                          <label for="password">Password</label>
                          <input type="password" id="password" placeholder="Password"  name="password">

                       </div>

                       <div class="input-field">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" placeholder="Confirm Password"  name="confirm_password">

                     </div>
                
                        <!--<input type="Submit" value="submit" class="btn"/>-->
                        <button type="Submit" name="submit" class="btn">Submit</button>
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