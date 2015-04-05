<table class="table_applicants">
<tr>
    	
		<td>No.</td>
		<td>Jel. ID</td>
        <td>Vezetéknév</td>
        <td>Keresztnév</td>
        <td>Program</td>
		<td>Döntés</td>
		<td>Határidő</td>
        <td>Részletek</td>
</tr>       	
<?php
$i=1;
while($sor=mysqli_fetch_array($apps))
	{
	?>
        <tr>
		<td><?php print $i;?></td>
    	<td><?php print $sor['jel_id'];?></td>
        <td><?php print $sor['fname'];?></td>
        <td><?php print $sor['gname'];?></td>
		<td><?php include 'programs.php'; ?></td>
		<td><?php include 'decisions_deutsch.php'; ?></td>
        <td><?php print $sor['dfdate']; ?></td>
        <td>
<form action="applicant.php" method="post" id="form1">
<input name="username" type="hidden" value="<?php print $sor['username']?>" />
<input name="jel_id" type="hidden" value="<?php print $sor['jel_id']?>" />
<input name="app_year" type="hidden" value="<?php print $app_year?>" />
<input type="submit" name="Submit" id="Submit" value="Részletek" />
</form></td>
       </tr>
	<?php
	$i++;
	}
?>
</table>