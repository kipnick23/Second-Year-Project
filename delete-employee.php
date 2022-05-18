<?php
if (!empty($_GET['id'])) {
    require_once 'includes/config.inc.php';

    $usercode = $_GET['id'];
    $del_query = "DELETE FROM `users` WHERE usercode = '" . $usercode . "'";
    $result = mysqli_query($con, $del_query);
    if ($result) {
        header('location:/project/employee-reports.php?msg=del');
    }else {
        header('location:/project/employee-reports.php?msg=delfailed');
    }
}
