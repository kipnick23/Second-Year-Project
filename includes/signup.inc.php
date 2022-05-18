<?php

if (isset($_POST["submit"])){

$firstname=trim($_POST['firstname']);
$lastname=trim($_POST['lastname']);
$username=trim($_POST['username']);
$gender=trim($_POST['gender']);
$email=trim($_POST['email']);
$password=trim($_POST['password']);
$confirm_password=trim($_POST['confirm_password']);


require_once "config.inc.php";
require_once "functions.inc.php";

if (emptyInputSignup($firstname, $lastname, $username, $gender, $email, $password) !==false){
    header("location: ../signup.php?error=emptyinput");
    exit();
}

if (invalidUid($username) !==false){
    header("location: ../signup.php?error=invalidusername");
    exit();
}

if (invalidEmail($email) !==false){
    header("location: ../signup.php?error=invalidemail");
    exit();
}
if (pwdMatch($password, $confirm_password) !==false){
    header("location: ../signup.php?error=passwordmismatch");
    exit();
}

if (UidExists($con, $username, $email) !==false){
    header("location: ../signup.php?error=usernametaken");
    exit();
}

createUser($con, $firstname, $lastname, $username, $gender, $email, $password);

}
else {
    header("location: ../signup.php");
    exit();
}



