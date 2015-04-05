<fieldset><legend>Felvételi döntés:</legend>
<br />
<?php
$decisions=$conn->query("SELECT * FROM decisions WHERE jel_id='$jel_id'");

while($sor=mysqli_fetch_array($decisions))
	{
	?>
	<form action='del_decision.php' method='post'>
    <input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
    <input name="dec_id" type="hidden" value="<?php print $sor['id'] ?>" />
	 <br />Döntés dátuma:<?php print $sor['date'].': '; ?><br />
     Döntés: <?php include 'decisions.php';?>
	 Program: <?php include 'programs_dec.php';?>
	 Döntés alapja: <?php print $sor['basis'];?><br />
   	 Visszajelzési határidő: <?php print $sor['dfdate'];?><br />
	
	<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
    <input type='submit' name='submit' value='Töröl'>
	</form>
	<?php 
	}
?>
<br /><fieldset><legend>Döntés:</legend><br />
<form action='new_decision.php' method='post'>
Dátum:
<input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
<select name="dyear">
<?php $y=date('Y'); ?>
<option><?php echo $y; $y--;?></option>   
<option><?php echo $y; $y--;?></option>   
<option><?php echo $y; $y--;?></option>   
<option><?php echo $y; $y--;?></option>
</select>
              
<select name="dmonth">
<?php include 'months.php';?>
</select>
    
<select name="dday">
<?php include 'days.php';?>
</select>
<br />
Program:
<select class="selectone" name="prog" id="prog">
<option value="">-- select a program --</option>
<option value="G1">
Medizin - 1. Studienjahr</option>
<option value="V">
Vorbereitungsjahr</option>
<option value="M1">
Medicine - year 1</option>
<option value="F">
Foundation Year</option>
</select>
<br />

Döntés:
<select class="selectone" name="decision" id="decision">
<option value="">-- select one --</option>
<option value="N">Még nincs döntés</option><br />  
<option value="F">Felvéve</option><br />  
<option value="W">Várólista + garantált német előkészítő évfolyam</option><br />
<option value="L">Elutasítva + jelentkezési lehetőség német ill. angol előkészítőre</option><br />
<option value="E">Elutasítva</option><br />  
    	</select><br />
</select>
Döntés alapja:
<input name="basis" type="text" id="basis" size="40" maxlength="100"  value="<?php print $sor['basis'];?>"><br />

Visszajelzési határidő: 
<select name="dfyear">
	<option>
	<?php
	  $y=date('Y');
	  echo $y; 
	?>
	</option>
</select>
              
<select name="dfmonth">
<?php include 'months.php';?>
</select>
   
<select name="dfday">
<?php include 'days.php';?>
</select>
<p>
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type='submit' name='submit' value='Új döntés rögzítése'>
</p>


</form>
</fieldset>
<?php include 'data_remarks_dec.php';?>
</fieldset>