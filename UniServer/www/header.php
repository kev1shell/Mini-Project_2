<?php

//header.php
//
//Author: Kevin Shell
//Date  : 10/11/2013
//

session_start();
?>
<!DOCTYPE html>
<html>
<body>
<div id="container" style="clear:both;alignment-baseline:central;">
    
<div id="header" style="background-color:#009900;clear:both;text-align:center;">
<h1 style="margin-bottom:0;">Mini Project II</h1></div>

<div id="menu" style="background-color:#00FF66;text-align: center;">

<a href="index.php">Home</a>
<a href="create_challenge.php">Challenge</a>
<a href="reschedule_challenge.php">Reschedule</a>
    
</div>
    
<div id="login" style="clear:both;text-align: center;">
    <?php if(isset($_SESSION['user_name'])) if($_SESSION['user_name']==""){?>
    <a href="login.php">Login</a>
    <?php } ?>
    <?php if(isset($_SESSION['user_name'])) if($_SESSION['user_name']!=""){?>
    Logged in as: <?php echo $_SESSION['user_name']." "?> <a href="logout.php">Logout</a>
    <?php }?>
</div>

<?php //<div id="content" style="background-color:#FFFFFF;height:220px;width:1000px;"></div>?>


</div>
 
</body>
</html>
