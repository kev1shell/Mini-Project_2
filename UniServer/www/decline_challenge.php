<?php

//decline_challenge.php
//
//Author: Kevin Shell
//Date  : 10/12/2013
//

include './function_library.php';
    
$source_user=$_POST['source_user'];
$target_user=$_POST['target_user'];
$msg_id=$_POST['msg_id'];
$dbcon = connectToDatabase();

$source_id =  get_user_id($source_user);
$target_id = get_user_id($target_user);

$sql_a="DELETE FROM message_table_" . $source_id . " where id in (".$msg_id.")";
$sql_b="DELETE FROM message_table_" . $target_id . " where id in (".$msg_id.")";
if(debugging()){ echo $sql_a; echo $sql_b;}
if ($dbcon->query($sql_a) && $dbcon->query($sql_b)){
    header('Location:index.php');
    echo "why am i still here?";
}
else echo "Delete failed \n";

$dbcon->close();

?>
