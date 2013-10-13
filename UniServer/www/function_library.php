<?php
//function_library.php
//
//Author: Kevin Shell
//Date  : 10/11/2013
//


//debug flag
function debugging(){return FALSE;}//set this to true if debugging, false otherwise.


//functions
function connectToDatabase(){
	
	$dbCon = new mysqli('localhost','root','russell09','Mini-Project_2');
        
	if($dbCon->connect_errno > 0){
            if(debugging()) echo "connection error";
            return $dbCon;
        }
        else{ 
            if(debugging())echo "connection successful";
            return $dbCon;
        }
}

function insert_new_challenge($data,$target_user){
    //inserts a new challenge stored in $data to the message table for $target_user
    //if $target_user does not exist. function returns -1.
    $user_id = get_user_id($target_user);
    
    if($user_id == -1){
        if(debugging()) echo '$target user does not exist';
        return -1;
    }
    
    $dbCon = connectToDatabase();
        
    $source_user = $data['source_user'];
    $target_user = $data['target_user'];
    $TIME = $data['TIME'];
    $DATE = $data['DATE'];
    $Place=$data['Place'];
    $msg_code=$data['msg_code'];
    
        
    $sql = "INSERT INTO message_table_" . $user_id . " (source_user, target_user, TIME, DATE, Place, msg_code)
            VALUES ('$source_user', '$target_user', '$TIME', '$DATE', '$Place', '$msg_code')";
    $dbCon->query($sql);
       
    if($dbCon->connect_errno > 0) echo "Connection error";
    if(debugging()) echo 'Challenge inserted. ';
}

function get_users_table(){
    
    $dbcon = connectToDatabase();
    
    $sql = "SELECT * FROM users";
    $result = $dbcon->query($sql);
    
    if(!$result){
        if(debugging())echo 'QUERY FAILED! ';
        return -1;
    }
    else if(debugging())echo 'Query successful... ';
    
    $r=0;
    $table=array(array());
    while ($row = $result->fetch_assoc()) {
    	$table[$r][0] = $row['user_name'];
    	$table[$r][1] = $row['user_id'];
        $r++;
    }
    $result->close(); 
    $dbcon->close();
    
    return $table;
    
}

function get_user_id($user_name){
    //returns id of user, if user does not exist returns -1
    $table =  get_users_table();
    
    if($table==-1){
        if(debugging())echo 'FAILED TO GET TABLE! ';
        return -1;
        
    }
    
    $i=0;
    while(($user_name != $table[$i][0]) && ($i < count($table))) $i++;
    
    if($i < count($table)) return $table[$i][1];
    else return -1;
    
}

function get_challenges(){
    $dbcon = connectToDatabase();
    
    session_start();
    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT * FROM message_table_".$user_id;
    $result = $dbcon->query($sql);
    
    if(!$result){
        if(debugging())echo 'QUERY FAILED! ';
        return -1;
    }
    else if(debugging())echo 'Query successful... ';
    
    $r=0;
    $table=array(array());
    while ($row = $result->fetch_assoc()) {
    	$table[$r][0] = $row['source_user'];
    	$table[$r][1] = $row['target_user'];
	$table[$r][2] = $row['TIME'];
	$table[$r][3] = $row['DATE'];
        $table[$r][4] = $row['Place'];
        $table[$r][5] = $row['msg_code'];
        $table[$r][6] = $row['id'];
        $r++;
    }
    $result->close(); 
    $dbcon->close();
    
    return $table;
}

function display_challenges(){
    if(debugging())echo 'includeing display_challenges.php ... ';
    
    include './display_challenges.php';
    
    if(debugging())echo 'included display_challenges.php ... ';
}

?>
