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

function insert_new_challenge($data){
    $dbCon = connectToDatabase();
        
    $From = $data['From'];
    $To = $data['To'];
    $TIME = $data['TIME'];
    $DATE = $data['DATE'];
    $Place=$data['Place'];
        
    $sql = "INSERT INTO message_table_00 (From, To, TIME, DATE, Place)
            VALUES ('$From', '$To', '$TIME', '$DATE', '$Place')";
    $dbCon->query($sql);
       
    if($dbCon->connect_errno > 0) echo "Connection error";
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
    
    $sql = "SELECT * FROM message_table_00";
    $result = $dbcon->query($sql);
    
    if(!$result){
        if(debugging())echo 'QUERY FAILED! ';
        return -1;
    }
    else if(debugging())echo 'Query successful... ';
    
    $r=0;
    $table=array(array());
    while ($row = $result->fetch_assoc()) {
    	$table[$r][0] = $row['From'];
    	$table[$r][1] = $row['To'];
	$table[$r][2] = $row['TIME'];
	$table[$r][3] = $row['DATE'];
        $table[$r][4] = $row['Place'];
        $table[$r][5] = $row['msg_code'];
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
