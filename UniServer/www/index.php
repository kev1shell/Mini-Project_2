<?php
//Mini-Project2
//
//Author: Kevin Shell
//Date  : 10/11/2013
//

//includes
include './function_library.php';

//session stuff
session_start();
// store session data

if(isset($_SESSION['user_name'])==FALSE){ 
    if(debugging()) echo 'user_name uninitialized ';
    $_SESSION['user_name']="";
    
}
else{
    if(debugging()) echo 'user_name is already initialized ';
    if(debugging()) echo '$_SESSION[user_name]= '.$_SESSION['user_name'].' ';
}
if(isset($_SESSION['user_id'])==FALSE){
    if(debugging()) echo 'user_id uninitialized ';
    $_SESSION['user_id']=0;
    
}
else{ 
    if(debugging()) echo 'user_id is already initialized ';
    if(debugging()) echo '$_SESSION[user_id]= '.$_SESSION['user_id'].' ';
}

if(isset($_POST['user_name']) && isset($_POST['user_id'])){
    if(debugging()) echo 'user_name found in POST ';
}

//header
include './header.php';

//commands
if($_SESSION['user_name']!=""){
    if(debugging())echo 'displaying challenges... ';
    display_challenges();
}
else if(debugging())echo 'not logged in, cannot display challenges';
//footer
include './footer.php';

?>
