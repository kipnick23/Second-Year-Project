<?php

include 'includes/header.inc.php'

?>
<?php
// mysql connection
require_once 'includes/config.inc.php';
$query = "SELECT * FROM `users`WHERE type=2 AND emp_by=$usercode";
$query_run = mysqli_query($con, $query);
$row = mysqli_num_rows($query_run);

$results = mysqli_query($con, $query);
$records = mysqli_num_rows($results);
$msg = "";
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "add") ? "New Record has been added successfully!" : ($msg == "delfailed") ? "Failed to delete" : (($msg == "del") ? "Record has been deleted successfully!" : "Record has been updated successfully!");
} else {
    $alert_msg = "";
}

$query2 = "SELECT * FROM projects WHERE emp_by=$usercode ORDER BY projectid";  
$query_run2 = mysqli_query($con, $query2);
$rows = mysqli_num_rows($query_run2);

$query3 = "SELECT * FROM projects WHERE emp_by=$usercode AND status=2 ORDER BY projectid";  
$query_run3 = mysqli_query($con, $query3);
$rows3 = mysqli_num_rows($query_run3);

?>
    <div class="main_content">
        <div class="header">
        <div class="card_holder">
        <div class="card">
                <?php
                echo '<h4> Total Employees: '.$row.'</h4>';
                ?>
            </div>

            <div class="card">
                <?php
                echo '<h4> Total tasks: '.$rows.'</h4>';
                ?>
            </div>
            <div class="card">
                <?php
                echo '<h4> Accomplished tasks: '.$rows3.'</h4>';
                ?>
            </div>
        </div>
        <?php if (!empty($alert_msg)) {?>
        <div><?php echo $alert_msg; ?></div>
        <?php }?>
        </div>
        <div class="info">

        <table class="table">
            <thead>
                <tr>
                    <th> My Employees</th>
                </tr>
                <tr>
                <th scope="col">code</th>
                <th scope="col">ID</th>
                <th scope="col">firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">username</th>
                <th scope="col">gender</th>
                <th scope="col">email</th>
                <th scope="col">department</th>
                <th scope="col">Date Employed</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($records)) {
                    while ($row = mysqli_fetch_assoc($results)) {
                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['usercode']; ?></th>
                                    <td><?php echo $row['userid']; ?></td> 
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td><?php echo $row['date_created']; ?></td>
                                    <td>
                                    <a href="/project/delete-employee.php?id=<?php echo $row['usercode']; ?>" onClick="javascript:return confirm('Do you really want to terminate the employee?');" >Terminate</a>
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