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
    To: <input name="To" type="text" /> </br>
    From: <input name="From" type="text" /> </br>
    Time: <input name="TIME" type="TIME" /> </br>
    Date: <input name="DATE" type="DATE" /> </br>
    Place: <input name="Place" type="text" /> </br>
    <input name="submit" type="submit" value="Submit"/>
</form>

<form action = "index.php" method="post">
    <input name="submit" type="submit" value="Cancel"/>

<?php /*footer*/ include './footer.php'; ?>
