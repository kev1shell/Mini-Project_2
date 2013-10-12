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

function get_challenges(){
    $dbcon = connectToDatabase();
    
    $sql = "SELECT * FROM message_table_01";
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
	$table[$r][2] = $row['Time'];
	$table[$r][3] = $row['DATE'];
        $table[$r][4] = $row['Place'];
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
