<?php
require_once "config.inc.php";
if (isset($_POST['update'])) {
        $usercode = $_POST['usercode'];
        $userid = $_POST['userid'];
		$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
		$email = $_POST['email'];
        $department = $_POST['department'];
		

		$sql = "UPDATE `users` SET `userid`='$userid',`firstname`='$firstname',`lastname`='$lastname',`gender`='$gender',`email`='$email',`department`='$department' WHERE `usercode`='$usercode';";

		$result = $con->query($sql);

		if ($result == TRUE) {
			header('Location: ../manage-employees.php?update=success');
		}
        else{
			echo "Error:" . $sql . "<br>" . $con->error;
		}
}
else{
	header('Location: ../signup.php');
	exit();
}