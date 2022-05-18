<?php
require_once "config.inc.php";
if (isset($_POST['update'])) {
        $projectid = $_POST['projectid'];
		$response = $_POST['response'];
        $status = $_POST['status'];
		

		$sql = "UPDATE `projects` SET `response`='$response',`status`='$status' WHERE `projectid`='$projectid';";

		$result = $con->query($sql);

		if ($result == TRUE) {
			header('Location: ../manage-tasks.php?msg=update');
		}
        else{
			echo "Error:" . $sql . "<br>" . $con->error;
		}
}
else{
	header('Location: ../signup.php');
	exit();
}