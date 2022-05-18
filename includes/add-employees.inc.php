<?php
if (isset($_POST["submit"])){

$userid=trim($_POST['userid']);
$firstname=trim($_POST['firstname']);
$lastname=trim($_POST['lastname']);
$username=trim($_POST['username']);
$gender=trim($_POST['gender']);
$email=trim($_POST['email']);
$department=trim($_POST['department']);
$emp_by=trim($_POST['emp_by']);
$password=trim($_POST['password']);
$confirm_password=trim($_POST['confirm_password']);
$usertype=('2');

require_once "config.inc.php";
require_once "functions.inc.php";

if (pwdMatch($password, $confirm_password) !==false){
    header("location: ../add-employee.php?error=passwordmismatch");
    exit();
}

createEmployee($con, $userid, $firstname, $lastname, $username, $gender, $email, $department, $emp_by, $password, $usertype);

}
else {
    header("location: ../signup.php");
    exit();
}



