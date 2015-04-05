<table class="table_applicants">
<tr>
    	<td>Jel ID</td>
        <td>Vezetéknév</td>
        <td>Keresztnév</td>
        <td>Program</td>
        <td>Részletek</td>
</tr>       	
<?php
while($sor=mysqli_fetch_array($apps))
	{
	?>
        <tr>
    	<td><?php print $sor['jel_id'];?></td>
        <td><?php print $sor['fname'];?></td>
        <td><?php print $sor['gname'];?></td>
        <td><?php include 'programs.php'; ?></td>
        <td>
<form action="applicant.php" method="post" id="form1">
<input name="username" type="hidden" value="<?php print $sor['username']?>" />
<input name="jel_id" type="hidden" value="<?php print $sor['jel_id']?>" />
<input name="app_year" type="hidden" value="<?php print $app_year?>" />
<input type="submit" name="Submit" id="Submit" value="Részletek" />
</form></td>
       </tr>
	<?php
	}
?>
</table>