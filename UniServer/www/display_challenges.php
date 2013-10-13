<?php

//display_challenges.php
//
//Author: Kevin Shell
//Date  : 10/11/2013
//

//load session:
session_start();

if(debugging())echo 'Aquiring challenges... ';
$table = get_challenges();
if($table < 0){
    if(debugging())echo 'FAILED TO AQUIRE CHALLENGES! ';
    exit;
}
if(count($table[0])==0){
    if(debugging())echo 'table is empty ';
    echo 'No challenges';
}
else{
?>
<?php if(debugging())echo 'count($table[0])= '.  count($table[0])." ";?> 
<?php if(debugging())echo 'creating table... ';?>
<table border="1">
<tr>
<th>From</th>
<th>To</th>
<th>Time</th>
<th>Date</th>
<th>Location</th>
<th>Actions:</th>
</tr>
<?php for($r=0;$r<count($table);$r++){?>
    <tr>
        <td><?php echo $table[$r][0] ?></td>
        <td><?php echo $table[$r][1] ?></td>
        <td><?php echo $table[$r][2] ?></td>
        <td><?php echo $table[$r][3] ?></td>
        <td><?php echo $table[$r][4] ?></td>
    
        <?php if($table[$r][5]==3){?>
        <td>
            <form action="accept_challenge.php" method="post">
                <input name="submit" type="submit" value="Accepted" disabled/>
            </form>
        </td>
        <?php }?>
            
        <?php if($table[$r][5]!=0 && $table[$r][5]!=3){?>
        <td>
            <form action="accept_challenge.php" method="post">
                <input type="hidden" name='source_user' value='<?php echo $table[$r][0] ?>'>
                <input type="hidden" name='target_user' value='<?php echo $table[$r][1] ?>'>
                <input type="hidden" name='msg_code' value='<?php echo $table[$r][5] ?>'>
                <input type="hidden" name='msg_id' value='<?php echo $table[$r][6] ?>'>
                <input name="submit" type="submit" value="Accept"/>
            </form>
        </td>
        <?php }?>
        <?php if($table[$r][5]!=0 && $table[$r][5]!=3){?>
        <td>
            <form action="decline_challenge.php" method="post">
                <input type="hidden" name='source_user' value='<?php echo $table[$r][0] ?>'>
                <input type="hidden" name='target_user' value='<?php echo $table[$r][1] ?>'>
                <input type="hidden" name='msg_id' value='<?php echo $table[$r][6] ?>'>
                <input name="submit" type="submit" value="Decline"/>
            </form>
        </td>
        <?php }?>
        <?php if($table[$r][5]==1){?>
        <td>
            <form action="reschedule_challenge.php" method="post">
                <input type="hidden" name='source_user' value='<?php echo $table[$r][0] ?>'>
                <input type="hidden" name='target_user' value='<?php echo $table[$r][1] ?>'>
                <input type="hidden" name='TIME' value='<?php echo $table[$r][2] ?>'>
                <input type="hidden" name='DATE' value='<?php echo $table[$r][3] ?>'>
                <input type="hidden" name='Place' value='<?php echo $table[$r][4] ?>'>
                <input type="hidden" name='msg_code' value='<?php echo $table[$r][5] ?>'>
                <input type="hidden" name='msg_id' value='<?php echo $table[$r][6] ?>'>
                <input name="submit" type="submit" value="Reschedule"/>
            </form>
        </td>
        <?php }?>
    </tr>
<?php }?>
</table>
<?php }?>
