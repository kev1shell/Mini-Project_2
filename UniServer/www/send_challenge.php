<?php

//send_challenge.php
//
//Author: Kevin Shell
//Date  : 10/11/2013
//

//includes
include './function_library.php';

//load session:
session_start();
if(debugging()) echo 'session resumed ';

//test input parameters
if(debugging()){
    echo 'source_user: '.$_POST['source_user'];
    echo 'target_user: '.$_POST['target_user'];
    echo 'TIME: '.$_POST['TIME'];
    echo 'DATE: '.$_POST['DATE'];
    echo 'Place: '.$_POST['Place'];
    
}
if(isset($_POST['source_user']) && isset($_POST['target_user']) && isset($_POST['TIME'])
        && isset($_POST['DATE']) && isset($_POST['Place'])){
    if(debugging()) echo 'input parameters initiallized, prodeeding... ';
    //set source and target users
    $source_user = $_POST['source_user'];
    $target_user = $_POST['target_user']; 
    
    //Ensure source and target users both exist.
    $source_id = get_user_id($source_user);
    $target_id = get_user_id($target_user);
    if($source_id==-1){
        //source_user does not exist.
        if(debugging()) echo 'source user does not exist ';
        exit;
    }
    if($target_id==-1){
        //target_user does not exist
        echo 'ERROR: user "'.$target_user.'" not found';
        exit;
        
    }
    //source and target users should both exist for this code to execute.
    if($source_id !=-1 && $target_id != -1){
    //insert challenge into message tables of both users:
    $_POST['msg_code']=0;//a "sent" challenge is inserted for the source_user
    insert_new_challenge($_POST,$source_user);
    $_POST['msg_code']=1;//a "recieved" challenge is inserted for the target_user
    insert_new_challenge($_POST,$target_user);
    }
    
}
else{
    //input parameters were not initialized
    if(debugging()) echo 'ERROR: input parameters not initialized ';
}

//go back to index
//insert_into_test_table();
header('Location: index.php');
?>
