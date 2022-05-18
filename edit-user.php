<?php
include 'includes/header.inc.php'

?>
<?php

// mysql connection
require_once 'includes/config.inc.php';

$qry = $con->query("SELECT * FROM users where usercode = ".$usercode)->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}


?>

    <div class="main_content">
        <div class="head">
            WELCOME <?php echo $username ?>
        </div>

       
        <div class="tasks_container">
            <header>Update your details</header>

            <form action="includes/edit-user.inc.php" method="POST">
                <div class="userform">
                    <div class="details personal">
                        <span class="title">Personal Details</span>

                        <div class="fields">
                        <div class="input-field">
                            <label>ID Number</label>
                            <input type="text" placeholder="ID number" name="userid" value="<?php echo isset($userid) ? $userid : '' ?>">
                        </div>

                            <div class="input-field">
                                <label>First Name</label>
                               <input type="text" placeholder="First name" name="firstname" value="<?php echo isset($firstname) ? $firstname : '' ?>">
                               <input type="hidden" name="usercode" value="<?php echo $usercode; ?>">
                            </div>

                            <div class="input-field">
                                <label>Last Name</label>
                                <input type="text" placeholder="Last name" name="lastname" value="<?php echo isset($lastname) ? $lastname : '' ?>">
                            </div>

                            <div class="input-field">
                                <label>Gender</label>
                                <select name="gender">
                                <option value="male" <?php echo isset($gender) && $gender == 'male' ? 'selected' : '' ?>>Male</option>
			                    <option value="female" <?php echo isset($gender) && $gender == 'female' ? 'selected' : '' ?>>Female</option>
                                </select>

                            </div>

                            <div class="input-field">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : '' ?>">
                            </div>              

                            <div class="input-field">
                                <label>Department</label>
                                <input type="text" name="department" id="department" placeholder="Department" value="<?php echo isset($department) ? $department : '' ?>">
                            </div>
                            <button type="Submit" name="update" class="btn">Update</button>
                        </div>
                    </div>
                    <input type="Submit" value="Save Changes" name="update" class="submit">
                </div>
            </form>
        </div> 
    </div>

</body>

</html>