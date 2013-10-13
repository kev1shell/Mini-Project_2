<?php

//update_challenge.php
//
//Author: Kevin Shell
//Date  : 10/13/2013
//
include './function_library.php';
    
$source_user = $_POST['source_user'];
$target_user = $_POST['target_user'];
$TIME = $_POST['TIME'];
$DATE = $_POST['DATE'];
$Place = $_POST['Place'];
$id = $_POST['msg_id'];
$msg_code=0;

$dbcon = connectToDatabase();

$source_id = get_user_id($source_user);
$target_id = get_user_id($target_user);

if(debugging()){
    echo 'source_id: '.$source_id;
    echo ' target_id: '.$target_id;
    echo ' TIME: '.$TIME;
    echo ' DATE: '.$DATE;
    echo ' Place: '.$Place;
    echo ' id: '.$id;
    
}

$sql_a = "UPDATE message_table_" . $source_id . " SET source_user='$source_user', target_user='$target_user', TIME='$TIME', DATE='$DATE', Place='$Place', msg_code='$msg_code' WHERE id='$id'";
$msg_code+=1;
$sql_b = "UPDATE message_table_" . $target_id . " SET source_user='$source_user', target_user='$target_user', TIME='$TIME', DATE='$DATE', Place='$Place', msg_code='$msg_code' WHERE id='$id'";

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
