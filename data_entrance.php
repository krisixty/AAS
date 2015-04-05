<fieldset><legend>Felvételi vizsga</legend>

<fieldset><legend>1. Vizsga</legend>
<?php
$entrance_exam=$conn->query("SELECT * FROM entrance_exam WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($entrance_exam);
?>
1. Vizsga helyszíne:
<input name="e_place" type="text" value="<?php print $sor['e_place'] ?>" maxlength="100" size="100"/><br />

1. Vizsga időpontja: 
<select name="e_year">
<option>
<?php
$e_date  = $sor['e_date']; //tömbbe pakolja a születési dátum én, nap, hónap részeit
$pieces = explode("-", $e_date);
echo $pieces[0]; // piece2
?></option>
<?php
$y=date('Y');
?>
			<option><?php echo $y; ?></option> 
<?php $y++ ?>			
			<option><?php echo $y; ?></option>  			

		</select>
		
<select name="e_month">
<option>
<?php 
$e_date  = $sor['e_date'];
$pieces = explode("-", $e_date);
echo $pieces[1]; // piece1
?></option>
<?php include 'months.php';?>
</select>
		
<select name="e_day">
<option>
<?php 
$e_date  = $sor['e_date'];
$pieces = explode("-", $e_date);
echo $pieces[2]; // piece0
?></option>
<?php include 'days.php';?>
</select>
<br />
<table>
<tr><td></td><td>Biológia</td><td></td><td>Kémia</td><td></td><td>Angol</td><td>Fizika</td><td></td></tr>
<tr>
<td>Írásbeli</td>
<td><input name="bio_wr" type="text" value="<?php print $sor['bio_wr'] ?>" maxlength="2" size="2"/></td>
<td></td>
<td><input name="chem_wr" type="text" value="<?php print $sor['chem_wr'] ?>" maxlength="2" size="2"/></td>
<td></td>
<td><input name="eng_wr" type="text" value="<?php print $sor['eng_wr'] ?>" maxlength="2" size="2"/></td>
<td><input name="phys_wr" type="text" value="<?php print $sor['phys_wr'] ?>" maxlength="2" size="2"/></td>
<td></td>
</tr>
<td>Szóbeli (1., 2.)</td>
<td><input name="bio_or" type="text" value="<?php print $sor['bio_or'] ?>" maxlength="2" size="2"/></td>
<td><input name="bio_or2" type="text" value="<?php print $sor['bio_or2'] ?>" maxlength="2" size="2"/></td>
<td><input name="chem_or" type="text" value="<?php print $sor['chem_or'] ?>" maxlength="2" size="2"/></td>
<td><input name="chem_or2" type="text" value="<?php print $sor['chem_or2'] ?>" maxlength="2" size="2"/></td>
<td><input name="eng_or" type="text" value="<?php print $sor['eng_or'] ?>" maxlength="2" size="2"/></td>
<td><input name="phys_or" type="text" value="<?php print $sor['phys_or'] ?>" maxlength="2" size="2"/></td>
<td><input name="phys_or2" type="text" value="<?php print $sor['phys_or2'] ?>" maxlength="2" size="2"/></td>
</tr>
</table>
<br />
Vizsgáztató:
<input name="examiner" type="text" value="<?php print $sor['examiner'] ?>" maxlength="100" size="100"/><br />
Javaslat:<br />
<textarea name="suggestion" cols="100" rows="5" ><?php print $sor['suggestion'] ?></textarea>
</fieldset>




<?php //2. Felvételi vizsga. Az előző klónja ?>

<fieldset><legend>2. Vizsga</legend>
<?php
$entrance_exam_2=$conn->query("SELECT * FROM entrance_exam_2 WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($entrance_exam_2);
?>
2. Vizsga helyszíne:
<input name="e_place_2" type="text" value="<?php print $sor['e_place_2'] ?>" maxlength="100" size="100"/><br />

2. Vizsga időpontja: 
<select name="e_year_2">
<option>
<?php
$e_date_2  = $sor['e_date_2']; //tömbbe pakolja a születési dátum én, nap, hónap részeit
$pieces = explode("-", $e_date_2);
echo $pieces[0]; // piece2
?></option>
<?php
$y=date('Y');
?>
			<option><?php echo $y; ?></option> 
<?php $y++ ?>			
			<option><?php echo $y; ?></option>  			

		</select>
		
<select name="e_month_2">
<option>
<?php 
$e_date_2  = $sor['e_date_2'];
$pieces = explode("-", $e_date_2);
echo $pieces[1]; // piece1
?></option>
<?php include 'months.php';?>
</select>
		
<select name="e_day_2">
<option>
<?php 
$e_date_2  = $sor['e_date_2'];
$pieces = explode("-", $e_date_2);
echo $pieces[2]; // piece0
?></option>
<?php include 'days.php';?>
</select>
<br />
<table>
<tr><td></td><td>Biológia</td><td></td><td>Kémia</td><td></td><td>Angol</td><td>Fizika</td><td></td></tr>
<tr>
<td>Írásbeli</td>
<td><input name="bio_wr_2" type="text" value="<?php print $sor['bio_wr_2'] ?>" maxlength="2" size="2"/></td>
<td></td>
<td><input name="chem_wr_2" type="text" value="<?php print $sor['chem_wr_2'] ?>" maxlength="2" size="2"/></td>
<td></td>
<td><input name="eng_wr_2" type="text" value="<?php print $sor['eng_wr_2'] ?>" maxlength="2" size="2"/></td>
<td><input name="phys_wr_2" type="text" value="<?php print $sor['phys_wr_2'] ?>" maxlength="2" size="2"/></td>
<td></td>
</tr>
<td>Szóbeli (1., 2.)</td>
<td><input name="bio_or_2" type="text" value="<?php print $sor['bio_or_2'] ?>" maxlength="2" size="2"/></td>
<td><input name="bio_or2_2" type="text" value="<?php print $sor['bio_or2_2'] ?>" maxlength="2" size="2"/></td>
<td><input name="chem_or_2" type="text" value="<?php print $sor['chem_or_2'] ?>" maxlength="2" size="2"/></td>
<td><input name="chem_or2_2" type="text" value="<?php print $sor['chem_or2_2'] ?>" maxlength="2" size="2"/></td>
<td><input name="eng_or_2" type="text" value="<?php print $sor['eng_or_2'] ?>" maxlength="2" size="2"/></td>
<td><input name="phys_or_2" type="text" value="<?php print $sor['phys_or_2'] ?>" maxlength="2" size="2"/></td>
<td><input name="phys_or2_2" type="text" value="<?php print $sor['phys_or2_2'] ?>" maxlength="2" size="2"/></td>
</tr>
</table>
<br />
Vizsgáztató:
<input name="examiner_2" type="text" value="<?php print $sor['examiner_2'] ?>" maxlength="100" size="100"/><br />
Javaslat:<br />
<textarea name="suggestion_2" cols="100" rows="5" ><?php print $sor['suggestion_2'] ?></textarea>
</fieldset>




</fieldset>