<?php
$transfer=$conn->query("SELECT * FROM transfers WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($transfer);
?>
<fieldset><legend>Visszamondta:</legend>
<form action='new_transfer.php' method='post'>
<input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
Visszautalás elindítva:
<select name="tstart">
<option><?php print $sor['tstart'] ?></option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select><br>
Visszautalás összege:
<input name="tamount" type="text" id="tamount" maxlength="6" size="6" value="<?php print $sor['tamount'] ?>" />
<select name="tcurr">
<option><?php print $sor['tcurr'] ?></option>
<option>USD</option>   
<option>EUR</option> 
</select>
Visszautalás dátuma:
<select name="tbday">
<option>
<?php 
$tbdate  = $sor['tbdate'];
$pieces = explode("-", $tbdate);
echo $pieces[2]; // piece0
?></option>
<?php include 'days.php';?>
</select>
   
<select name="tbmonth">
<option>
<?php 
$tbdate  = $sor['tbdate'];
$pieces = explode("-", $tbdate);
echo $pieces[1]; // piece1
?></option>
<?php include 'months.php';?>
</select>
    
<select name="tbyear">
<option>
<?php
$tbdate  = $sor['tbdate']; //tömbbe pakolja a visszautalási dátum év, nap, hónap részeit
$pieces = explode("-", $tbdate);
echo $pieces[0]; // piece2
?>
</option>
	<?php
		$y=date('Y');
		for($i=$y; $i>1990; $i--) {
		?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>   
		<?php
 		}
		?> 
</select>
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type='submit' name='submit' value='Visszautalás rögzítése'>
</form>
</fieldset> 