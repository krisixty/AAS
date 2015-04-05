<fieldset><legend>Érettségi / féléves eredmények</legend>
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
<?php
$abitur=$conn->query("SELECT * FROM abitur WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($abitur);
?>

Típus:
<select name="ab_typ">
<option value="<?php print $sor['ab_typ'] ?>">
<?php
if ($sor['ab_typ']=='0') 
	   			{
	   			print 'Nincs rögzítve'; 
				}
if ($sor['ab_typ']=='H') 
	   			{
	   			print 'Hagyományos'; 
				}
if ($sor['ab_typ']=='U') 
	   			{
	   			print 'Új'; 
				}
if ($sor['ab_typ']=='N') 
	   			{
	   			print 'Nem németországi'; 
				}
?>
</option>
<option value="H">Hagyományos</option>
<option value="U">Új</option>
<option value="N">Nem németországi</option>
<option value="0">Nincs rögzítve</option>
</select>
Átlag:
<?php
$avg=$sor['ab_avg'];
$avg2= number_format($avg, 2);
?>

<input name="ab_avg" type="text" value="<?php print $avg2 ?> " /><br />
<br />

<?php include 'data_abitur.php'; ?>
</fieldset>
