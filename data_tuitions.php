<fieldset><legend>Befizetések Deposit/Tuition:</legend>
<br />
<?php
$tuitions=$conn->query("SELECT * FROM tuitions WHERE jel_id='$jel_id'");

while($sor=mysqli_fetch_array($tuitions))
	{
	?>
	<form action='del_tuition.php' method='post'>
    <input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
    <input name="tui_id" type="hidden" value="<?php print $sor['tui_id'] ?>" />
	 <br />
	 Fizetett ide: <?php print $sor['paid_prg'] ?><br />
	 Döntés dátuma: <?php print $sor['tdate'] ?><br />
     Befizetés összege: <?php print $sor['amount'].' '; print $sor['curr']?><br />
	 IS-hez/Szegedre fizetett: <?php print $sor['paid_org'];?><br />
	<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
    <input type='submit' name='submit' value='Töröl'>
	</form>
	<br /><?php 
	}
	
$t_sum=$conn->query("SELECT SUM(amount) FROM tuitions WHERE jel_id='$jel_id';");
while($row=mysqli_fetch_array($t_sum))
	{
	//echo "Összes befizetés: ".$row['SUM(amount)']." USD/EUR";
	$sum=$row['SUM(amount)'];
	echo "Összes befizetés: ".number_format($sum, 2, '.', '')." USD/EUR";
	}

?>
<br />
<br /><fieldset><legend>Új befizetés:</legend><br />

<form action='new_tuition.php' method='post'>
Fizetett ide:
<select name="paid_prg">
<option>ÁOK-A</option>  
<option>ÁOK-N</option>  
<option>FOK</option>  
<option>GYTK</option>  
<option>Prep</option>
<option>VBJ</option>
</select>
<br />

Dátum:
<input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
<select name="tyear">
	<?php
		$y=date('Y');
		for($i=$y; $i>1990; $i--) {
		?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>   
		<?php
 		}
		?> 
</select>
              
<select name="tmonth">
<?php include 'months.php';?>
</select>
    
<select name="tday">
<?php include 'days.php';?>
</select>
<br />

Befizetés összege:
<input name="amount" type="text" id="amount" maxlength="10" size="10" value="<?php print $sor['amount'] ?>" />
<select name="curr">
<option>USD</option>   
<option>EUR</option> 
</select>
<br />
IS-hez/Szegedre fizetett:
<select name="paid_org">
<option>IS</option>  
<option>Szeged</option> 
</select>
<p>
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type='submit' name='submit' value='Új befizetés rögzítése'>
</p>
</form>
</fieldset>