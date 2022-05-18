<?php
if (!empty($_GET['id'])) {
    require_once 'includes/config.inc.php';

    $project_id = $_GET['id'];
    $del_query = "DELETE FROM `projects` WHERE projectid = '" . $project_id . "'";
    $result = mysqli_query($con, $del_query);
    if ($result) {
        header('location:/project/manage-tasks.php?msg=del');
    }
}
