<?php

//accept_challenge.php
//
//Author: Kevin Shell
//Date  : 10/12/2013
//

include './function_library.php';
    
$source_user = $_POST['source_user'];
$target_user = $_POST['target_user'];
$id = $_POST['msg_id'];
$msg_code=3;

$dbcon = connectToDatabase();

$source_id = get_user_id($source_user);
$target_id = get_user_id($target_user);

$sql_a = "UPDATE message_table_" . $source_id . " SET msg_code='$msg_code' WHERE id='$id'";
$sql_b = "UPDATE message_table_" . $target_id . " SET msg_code='$msg_code' WHERE id='$id'";

if($dbcon->query($sql_a) && $dbcon->query($sql_b)){
    header('Location:index.php');
    exit;
}
else{
    echo "Update failed, please try again later";
    if(debugging()){
        echo $dbcon->errno;
        echo $sql_a." || ";
        echo $sql_b;
            
    }
    exit;
}

?>

