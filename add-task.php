<?php

include 'includes/header.inc.php'

?>

<?php
include_once 'includes/config.inc.php';

$query = "SELECT * FROM users WHERE emp_by=$usercode ORDER BY usercode DESC";
$result = mysqli_query($con, $query);

?>
    <div class="main_content">
        <div class="header">
          
        </div>  
        <div class="info">

                  <div class="tasks_container">
                    <form action="includes/add-task.inc.php" method="POST">
        
                        <div class="title">
                            <h2>Assign a Task</h2>
                        </div>
                        
                        
                        <div class="input-field">
                            <label for="projectname">Project Name</label>
                            <input type="text" id="projectname" placeholder="Project Name" name="projectname" ></input>


                        </div>
            
                        <div class="input-field">
                            <label for="description">Project Description</label>
                            <textarea name="description" cols="30" rows="10" id="description" placeholder="Task Description"></textarea>

                        </div>
                        
                        
                        <div class="input-field">
			                    <label>Assign To</label>
                          
			                      <select name="userid">
			                        <option value="">Select</option>
			                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
			                        <option value="<?php echo $row['usercode']; ?>" ><?php echo $row['username']; ?><?php echo $row['lastname']; ?></option>
			                        <?php } ?>
			                      </select>
			            
                          </div>

                        <input type="hidden" id="emp_by" name="emp_by" value="<?php echo $usercode; ?>">

                        <!--<input type="Submit" value="submit" class="btn"/>-->
                        <input type="Submit" value="submit" name="submit" class="btn"/>
                    </form>

                </div>

              </div>
      </div>
    </div>
</body>

</html>