<?php

include 'includes/header.inc.php'

?>
<?php
// mysql connection
require_once 'includes/config.inc.php';
if($type==0){
    $query = "SELECT * FROM `users` WHERE type=1";
}else{
    $query = "SELECT * FROM `users`WHERE type=2 AND emp_by=$usercode";
}


$results = mysqli_query($con, $query);
$records = mysqli_num_rows($results);
$msg = "";
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "add") ? "Employee added successfully!" : (($msg == "del") ? "Employee removed successfully!" : "Updated successfully!");
} else {
    $alert_msg = "";
}


?>

    <div class="main_content">
        <div class="header">
        <?php if (!empty($alert_msg)) {?>
        <div><?php echo $alert_msg; ?></div>
        <?php }?>
        </div>
        <div class="info">

        <table width=80% class="table">
            <thead>
                <tr>
                <th scope="col">code</th>
                <th scope="col">ID</th>
                <th scope="col">firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">username</th>
                <th scope="col">gender</th>
                <th scope="col">email</th>
                <th scope="col">department</th>
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
                                    <td><?php echo $row['userid']; ?></td> <!--. ' ' . $row['last_name']-->
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td>
                                    <a href="#" id="button" class="button">VIEW</a>
                                    <a href="/project/edit-employee.php?id=<?php echo $row['usercode']; ?>">EDIT</a>
                                    <a href="/project/delete-employee.php?id=<?php echo $row['usercode']; ?>" onClick="javascript:return confirm('Do you really want to terminate the employee?');" >DELETE</a>
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