<?php

//create_challenge.php
//
//Author: Kevin Shell
//Date  : 10/11/2013
//

//includes
include './function_library.php';
include './header.php';

//load session
session_start();
if(isset($_SESSION['user_name'])){
    if($_SESSION['user_name']==""){
        header('Location: login.php');
    }
    else{
?>

<form action = "send_challenge.php" method="post">
    To: <input name="target_user" type="text" /> </br>
    From: <input name="From_text" type="text" value="<?php echo $_SESSION['user_name'];?>" disabled/> </br>
    Time: <input name="TIME" type="TIME" /> </br>
    Date: <input name="DATE" type="DATE" /> </br>
    Place: <input name="Place" type="text" /> </br>
    <input type="hidden" name='msg_code' value='0'>
    <input type="hidden" name='source_user' value="<?php echo $_SESSION['user_name'];?>">
    <input name="submit" type="submit" value="Submit"/>
</form>

<form action = "index.php" method="post">
    <input name="submit" type="submit" value="Cancel"/>

<?php        
    }//end else
}//end if
else{
    header('Location: index.php');
}
?>
    
<?php /*footer*/ include './footer.php'; ?>
