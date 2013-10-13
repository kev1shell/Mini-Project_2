<?php

//reschedule_challege.php
//
//Author: Kevin Shell
//Date  : 10/11/2013
//

include './function_library.php';
include './header.php';

?>

<form action = "update_challenge.php" method="post">
    To: <input name="To_text" type="text" value="<?php echo $_POST['source_user'];?>" disabled/> </br>
    From: <input name="From_text" type="text" value="<?php echo $_POST['target_user'];?>" disabled/> </br>
    Time: <input name="TIME" type="TIME" value="<?php echo $_POST['TIME'];?>"/> </br>
    Date: <input name="DATE" type="DATE" value="<?php echo $_POST['DATE'];?>"/> </br>
    Place: <input name="Place" type="text" value="<?php echo $_POST['Place'];?>"/> </br>
    <input type="hidden" name='msg_code' value='0'>
    <input type="hidden" name='source_user' value="<?php echo $_POST['target_user'];?>">
    <input type="hidden" name='target_user' value="<?php echo $_POST['source_user'];?>">
    <input type="hidden" name='msg_id' value="<?php echo $_POST['msg_id'];?>">
    <input name="submit" type="submit" value="Update"/>
</form>

<form action = "index.php" method="post">
    <input name="submit" type="submit" value="Cancel"/>
    
<?php /*footer*/ include './footer.php'; ?>
