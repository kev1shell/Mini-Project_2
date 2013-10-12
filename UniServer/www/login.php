<?php

//login.php
//
//Author: Kevin Shell
//Date  : 10/12/2013
//
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
    
<form action = "login_user.php" method="post">
    User Name: <input name="user_name" type="text" />
    <input name="submit" type="submit" value="Login"/>
</form>

</div>
 
</body>
</html>

<?php include './footer.php';?>
