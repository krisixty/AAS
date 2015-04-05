<?php
$other_data=$conn->query("SELECT * FROM other WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($other_data);
?>
<fieldset><legend>Egyéb:</legend>
Pünkösd:
<select name="punk">
<option><?php print $sor['punk']; ?></option>
<option>No</option>
<option>Yes</option>
</select><br>
<br>
Más magyar egyetemre jelentkezett-e?<br>
Pote:
<select name="pote">
<option>
<?php /*
if ($sor['pote']=='N') 
	{
	print 'Nem'; ?> <br /> <?php 
	} 
if ($sor['pote']=='J') 
	{
	print 'Jelentkezett'; ?> <br /> <?php 
	} 
if ($sor['pote']=='A') 
	{
	print 'Felvett'; ?> <br /> <?php 
	} 
if ($sor['pote']=='F') 
	{
	print 'Fizetett'; ?> <br /> <?php 
	} 		
*/?>
</option>
<option value="N">Nem</option>
<option value="J">Jelentkezett</option>
<option value="A">Felvett</option>
<option value="F">Fizetett</option>
</select><br>
Sote:
<select name="sote">
<option><?php print $sor['sote']; ?></option>
<option value="N">Nem</option>
<option value="J">Jelentkezett</option>
<option value="A">Felvett</option>
<option value="F">Fizetett</option>
</select><br>
Jön-e:
<select name="jon">
<option><?php print $sor['jon']; ?></option>
<option>No</option>
<option>Yes</option>
</select><br>
</fieldset> 