<?php

//login_user.php
//
//Author: Kevin Shell
//Date  : Today's Date
//

//includes
include './function_library.php';

echo 'attempting to log in user... ';

if(isset($_POST['user_name'])==false){
    echo 'An error occured, please try again later';
    echo 'ERROR: User_name not set';
    exit;
}
$user_name=$_POST['user_name'];

if(debugging())    echo 'getting user id... ';
$user_id=  get_user_id($user_name);
if(debugging())    echo 'user id obtained ';

if($user_id ==-1){
    echo 'user name "'.$user_name.'" not found';
    exit;
}
else{
    session_start();
    $_SESSION['user_name']=$user_name;
    $_SESSION['user_id']=$user_id;
    $_POST['user_name']=$user_name;
    $_POST['user_id']=$user_id;
    if(debugging()) echo ' successfuly logged in user name: "'.$user_name.'" with user_id: '.$user_id.' ';
    if(debugging()) echo '$_SESSION[user_name]= '.$_SESSION['user_name'].' ';
    if(debugging()) echo '$_SESSION[user_id]= '.$_SESSION['user_id'].' ';
    header('Location: index.php');
    
}

if(debugging())    echo 'done. ';
?>
