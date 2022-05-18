<?php

include 'includes/header.inc.php'

?>
<?php

// mysql connection
require_once 'includes/config.inc.php';
if ($type == 2){
    $query = "SELECT * FROM `projects` WHERE emp_id = $usercode ORDER BY projectid DESC";
}else{
    $query= "SELECT * FROM `projects` WHERE emp_by = $usercode ORDER BY projectid DESC";
}


$results = mysqli_query($con, $query);
$records = mysqli_num_rows($results);
$msg = "";
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "update") ? "Project Updated!" : (($msg == "del") ? "Project deleted successfully!" : "Updated successfully!");
} else {
    $alert_msg = "";
}

$query2 = "SELECT username FROM `users` where emp_by = $usercode";
$result = mysqli_query($con, $query2);
$row2 = mysqli_fetch_assoc($result)

?>

    <div class="main_content">
        <div class="header">
        <?php if (!empty($alert_msg)) {?>
        <div class="alert alert-success"><?php echo $alert_msg; ?></div>
        <?php }?>
        </div>
        <div class="info">

        <table width=80% class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Response</th>
                <th scope="col">Status</th>
                <th scope="col">Date-Updated</th>
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
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['response']; ?></td>
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
                                    <td><?php echo $row['date_updated']; ?></td>
                                    <td>                                    
                                    <?php if($type == 2) { ?>
                                        <a href='/project/edit-task.php?id=<?php echo $row['projectid']; ?>'>Update</a>
                                    <?php }
                                    else { ?>
                                        <a href='/project/view-task.php?id=<?php echo $row['emp_id']; ?>'>assigned to</a>
                                        <a href='/project/edit-task.php?id=<?php echo $row['projectid']; ?>'>Update</a>
                                        <a href='/project/delete-task.php?id=<?php echo $row['projectid']; ?>' onClick="javascript:return confirm('Do you really want to delete?');" >DELETE</a>
                                    <?php } ?>
                                    
                                    </td>
                                </tr>

                            <?php
                            }
                }
                ?>
            </tbody>
        </table>
            
        </div>
    </div>

</body>

</html>