<?php

//display_challenges.php
//
//Author: Kevin Shell
//Date  : 10/11/2013
//

if(debugging())echo 'Aquiring challenges... ';
$table = get_challenges();
if($table < 0){
    if(debugging())echo 'FAILED TO AQUIRE CHALLENGES! ';
    exit;
}
?>
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
    
        <td>
            <form action="edit-employee.php" method="post">
                <input type="hidden" name='id' value='<?php echo $table[$r][4] ?>'>
                <input name="submit" type="submit" value="Accept"/>
            </form>
        </td>
        <td>
            <form action="delete-employee.php" method="post">
                <input type="hidden" name='id' value='<?php echo $table[$r][4] ?>'>
                <input name="submit" type="submit" value="Decline"/>
            </form>
        </td>
        <td>
            <form action="delete-employee.php" method="post">
                <input type="hidden" name='id' value='<?php echo $table[$r][4] ?>'>
                <input name="submit" type="submit" value="Reschedule"/>
            </form>
        </td>
    </tr>
<?php }?>
</table>
