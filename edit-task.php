<?php

include 'includes/header.inc.php'

?>

<?php 
require_once "includes/config.inc.php";

$qry = $con->query("SELECT * FROM projects where projectid = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}


$query = "SELECT * FROM users ORDER BY usercode DESC";
$result = mysqli_query($con, $query);

$statusquery = "SELECT `status` FROM projects ORDER BY status DESC";
$statusresult = mysqli_query($con, $statusquery);

?>
    <div class="main_content">
        <div class="header">
          
        </div>  
        <div class="info">

                  <div class="tasks_container">
                    <form  id="create-account-form" action="includes/edit-task.inc.php" method="POST">
        
                        <div class="title">
                            <h2>Update Task</h2>
                        </div>
                        
                        
                        <div class="input-field">
                            <label for="projectname">Project Name</label>
                            <input type="text" id="projectname" placeholder="Project Name" name="projectname" value="<?php echo isset($projectname) ? $projectname : '' ?>" disabled></input>
                            <input type="hidden" name="projectid" value="<?php echo $projectid; ?>">


                        </div>
            
                        <div class="input-field">
                            <label for="description">Project Description</label>
                            <textarea name="description" cols="30" rows="10" id="description" placeholder="Task Description" disabled><?php echo isset($description) ? $description : '' ?></textarea>

                        </div>

                        <div class="input-field">
                            <label for="response">Your response</label>
                            <textarea name="response" cols="30" rows="10" id="response" placeholder="Your Response"></textarea>

                        </div>
                      
                      <div class="input-field">
			                    <label>Status</label>
			                    <div class="col-sm-7">
			                      <select class="form-control" name="status" id="status">
			                      	<option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>New</option>
			                      	<option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>In Progress</option>
			                      	<option value="2" <?php echo isset($status) && $status == 2 ? 'selected' : '' ?>>Completed</option>
			                      </select>
			                    </div>
			            </div>
                        
                        <input type="Submit" value="Update" name="update" class="btn">
                    </form>

                </div>

              </div>
      </div>
    </div>
</body>

</html>