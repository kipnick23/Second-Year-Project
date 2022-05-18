<?php
include 'includes/header.inc.php'

?>
<?php

// mysql connection
require_once 'includes/config.inc.php';

$qry = $con->query("SELECT * FROM projects where projectid = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}


?>

    <div class="main_content">
        <div class="head">
            WELCOME <?php echo $username ?>
        </div>

       
        <div class="tasks_container">
            <header>Task details</header>

            <form action="index.php">
                <div class="userform">
                    <div class="details personal">
                        <div class="fields">
                        <ul>
                    <li>Project name: <?php echo isset($projectname) ? $projectname : '' ?> </li>
                    <li>Project description: <?php echo isset($description) ? $description : '' ?></li>
                    <li>Date Created: <?php echo isset($date_created) ? $date_created : '' ?> </li>
                    </ul>
                        </div>
                    </div>
                    <button class="sumbit">
                    <span>Go back</span>
                </button>
            </form>

        </div> 
    </div>

</body>

</html>