<?php
if (isset($_POST["submit"])){
    
require_once "config.inc.php";

$name=trim($_POST['projectname']);
$description=trim($_POST['description']);
$empid=trim($_POST['userid']);
$emp_by=trim($_POST['emp_by']);


if ($con->connect_error){
    die("Connection Error:". $con->connect_error);
} 
else 
{
    $sqli = "INSERT INTO projects (projectname, description, emp_id, emp_by) VALUES('$name','$description','$empid','$emp_by')";
    
    if ($con->query($sqli) === TRUE) {
        echo "submitted successfully";
        header("Location: ../add-task.php?=success");
    } else {
        echo "Error: " . $sqli . "<br>" . $con->error;
    }
    $con->close(); 

}
    
}else{
    header("location: ../signup.php");
    exit();
}


