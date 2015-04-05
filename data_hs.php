<fieldset><legend>Érettségi</legend>
Iskola neve:
<input name="hs_name" type="text" value="<?php print $sor['hs_name'] ?>" maxlength="50" /><br />
Bizonyítvány megszerzésének dátuma:
<select name="hs_year">
<option>
<?php
/*$hs_year  = $sor['hs_date']; //tömbbe pakolja a születési dátum én, nap, hónap részeit
$pieces = explode("-", $hs_date);
echo $pieces[0]; // piece2*/
print $sor['hs_year']; //külön van év és dátum is az érettségihez, mert vki nem érettségizett a jelentkezés időpontjában, csak az évet tudja
?></option>
<?php
	  $y=date('Y');
	  for($i=$y; $i>1950; $i--) 
	     	{?>
			<option><?php echo $i; ?></option>   
<?php 		} ?>
		</select>

<select name="hs_month">
<option>
<?php 
$hs_date  = $sor['hs_date'];
$pieces = explode("-", $hs_date);
echo $pieces[1]; // piece1
?></option>
<?php include 'months.php';?>
</select>

<select name="hs_day">
<option>
<?php 
$hs_date  = $sor['hs_date'];
$pieces = explode("-", $hs_date);
echo $pieces[2]; // piece0
?></option>
<?php include 'days.php';?>
</select>
   
Bizonyítvány sorszáma:
<input name="hs_certnum" type="text" value="<?php print $sor['hs_certnum'] ?>" maxlength="25" /><br />
Ország:
<select name="hs_country">
<option><?php print $sor['hs_country'] ?></option><br />
<?php include 'countries.php';?>
</select>
Város:
<input name="hs_city" type="text" value="<?php print $sor['hs_city'] ?>" maxlength="50" /><br />
</fieldset>