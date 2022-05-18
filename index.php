<?php
include 'includes/header.inc.php'

?>
<?php

// mysql connection
require_once 'includes/config.inc.php';

if ($type == 2){
    $query = "SELECT * FROM `projects` WHERE emp_id = $usercode AND status='0' ORDER BY projectid DESC"; 
}else{
    $query= "SELECT * FROM `projects` WHERE emp_by = $usercode AND status='0' ORDER BY projectid DESC";
}

$results = mysqli_query($con, $query);
$records = mysqli_num_rows($results);
$msg = "";
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "update") ? "Project Updated!" : (($msg == "del") ? "Project deleted successfully!" : "Record has been updated successfully!");
} else {
    $alert_msg = "";
}

?>

    <div class="main_content">
        <div class="header">
            <div class="card">
                WELCOME <?php echo $username ?>
            </div>

            <div class="card">
                
            </div>

        </div>

        <div class="info">
        <div class="tasks__container">
        <table class="table">
            <thead>
                <tr>
                    <th>NEW TASKS</th>
                </tr>
            </thead>
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($records)) {
                    while ($row = mysqli_fetch_assoc($results)) {
                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['projectid']; ?></th>
                                    <td><?php echo $row['projectname']; ?></td> <!--. ' ' . $row['last_name']-->
                                    <td>
                                        <?php  if($row['status'] == 1){
                                        echo "In Progress <span style='color:#d4ab3a;' class=' glyphicon glyphicon-refresh' >";
                                        }elseif($row['status'] == 2){
                                           echo "Completed <span style='color:#00af16;' class=' glyphicon glyphicon-ok' >";
                                        }elseif($row['status'] == 0){
                                            echo "New <span style='color:#00af16;' class=' glyphicon glyphicon-ok' >";
                                        }
                                        else{
                                          echo "Incomplete <span style='color:#d00909;' class=' glyphicon glyphicon-remove' >";
                                        } ?>
                                    </td>
                                    <td>
                                    <?php if($type == 2) { ?>
                                        <a href="/project/viewtask.php?id=<?php echo $row['projectid']; ?>" id="button" class="button">VIEW</a>
                                    <?php }
                                    else { ?>
                                        <a href="/project/viewtask.php?id=<?php echo $row['projectid']; ?>" id="button" class="button">VIEW</a>
                                        <a href='/project/delete-task.php?id=<?php echo $row['projectid']; ?>' class='btn btn-danger' onClick="javascript:return confirm('Do you really want to delete?');" >DELETE</a>
                                    <?php } ?>
                                    </td>
                                </tr>

                            <?php
                            }
                } else { ?>
                    <tr>
                        <td>No new tasks Yet</td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
        </div>   
        </div>
    </div>
    <script src="js/employeereport.js"></script>
</body>

</html>