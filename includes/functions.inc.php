<?php

function emptyInputSignup($firstname, $lastname, $username, $gender, $email, $password){
    $result;
    if(empty($firstname) || empty($lastname) || empty($username) || empty($gender) || empty($email) || empty($password)){
        $result = true; 
    }else {
        $result= false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true; 
    }else {
        $result= false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true; 
    }else {
        $result= false;
    }
    return $result;
}

function pwdMatch($password, $confirm_password){
    $result;
    if($password !== $confirm_password){
        $result = true; 
    }else {
        $result= false;
    }
    return $result;
}

function UidExists($con, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit(); 
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($con, $firstname, $lastname, $username, $gender, $email, $password){
    $sql = "INSERT INTO users (firstname, lastname, username, gender, email, password) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit(); 
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $username, $gender, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
        exit();
}

//LOGIN

function emptyInputLogin($username, $password){
    $result;
    if(empty($username) || empty($password)){
        $result = true; 
    }else {
        $result= false;
    }
    return $result;
}

function loginUser($con, $username, $password){
    $uidExists = UidExists($con, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["usercode"] = $uidExists["usercode"];
        $_SESSION["username"] = $uidExists["username"];
        $_SESSION["type"] = $uidExists["type"];
        header("location: ../index.php");
        exit();
    }
}

//addemployee

function createEmployee($con, $userid, $firstname, $lastname, $username, $gender, $email, $department, $emp_by, $password, $usertype){
    $sql = "INSERT INTO users (userid, firstname, lastname, username, gender, email, department, emp_by, password ,type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../add-employee.php?error=stmtfailed");
        exit(); 
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssssssi", $userid, $firstname, $lastname, $username, $gender, $email, $department, $emp_by, $hashedPwd, $usertype);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../add-employee.php?error=none");
        exit();
}


