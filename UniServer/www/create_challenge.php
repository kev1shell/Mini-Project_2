<?php

//create_challenge.php
//
//Author: Kevin Shell
//Date  : 10/11/2013
//

//includes
include './function_library.php';
include './header.php';

?>

<form action = "send_challenge.php" method="post">
    First Name: <input name="To" type="text" /> </br>
    Last Name: <input name="From" type="text" /> </br>
    Birthday: <input name="Time" type="text" /> </br>
    Email: <input name="Date" type="DATE" /> </br>
    Email: <input name="Place" type="text" /> </br>
    <input name="submit" type="submit" value="Submit"/>
</form>

<form action = "index.php" method="post">
    <input name="submit" type="submit" value="Cancel"/>

<?php /*footer*/ include './footer.php'; ?>
