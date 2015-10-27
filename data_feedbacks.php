<fieldset><legend>Visszajelzések</legend>
Visszajelzés dátuma:<br />

<?php
$feedbacks=$conn->query("SELECT * FROM feedbacks WHERE jel_id='$jel_id'");
//$sor=mysqli_fetch_array($feedbacks);

while($sor=mysqli_fetch_array($feedbacks))
	{
	?>
	<form action='del_feedback.php' method='post'>
    <input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
    <input name="fb_id" type="hidden" value="<?php print $sor['id'] ?>" />
	<?php print $sor['date'];?>
	<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
    <input type='submit' name='submit' value='Töröl'>
	</form>
	<?php 
	}
?>
Új visszajelzés:
<form action='new_feedback.php' method='post'>
<input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
<select name="fbyear">
	<?php
		$y=date('Y');
		for($i=$y; $i>1990; $i--) {
		?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>   
		<?php
 		}
		?> 
</select>
              
<select name="fbmonth">
<?php include 'months.php';?>
</select>
    
<select name="fbday">
<?php include 'days.php';?>
</select>
<p>
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type='submit' name='submit' value='Visszajelzés rögzítése'>
</p>
</form>
</fieldset>