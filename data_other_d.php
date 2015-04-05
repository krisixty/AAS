<?php
$other_data=$conn->query("SELECT * FROM other WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($other_data);
?>
<fieldset><legend>Egyéb:</legend>
Pünkösd:
<select name="punk">
<option>
<?php 
if ($sor['punk']=='I') 
	{
	print 'Igen'; ?> <br /> <?php 
	} 
if ($sor['punk']=='N') 
	{
	print 'Nem'; ?> <br /> <?php 
	} 
?></option>
<option value="I">Igen</option>
<option value="N">Nem</option>
</select><br>
<!--
<br>
Más magyar egyetemre jelentkezett-e?<br> //KIKAPCSOLVA, MERT NEM KELL NEKIK 2014.07.14.
Pote:
<select name="pote">
<option>
<?php/* 
if ($sor['pote']=='N') 
	{
	print 'Nem'; ?> <br /> <?php 
	} 
if ($sor['pote']=='J') 
	{
	print 'Jelentkezett'; ?> <br /> <?php 
	} 
if ($sor['pote']=='F') 
	{
	print 'Felvett'; ?> <br /> <?php 
	} 
if ($sor['pote']=='T') 
	{
	print 'Tandíjat befizette'; ?> <br /> <?php 
	} */		
?>
</option>
<option value="N">Nem</option>
<option value="J">Jelentkezett</option>
<option value="F">Felvett</option>
<option value="T">Tandíjat befizette</option>
</select><br>
Sote:
<select name="sote">
<option>
<?php 
/*if ($sor['sote']=='N') 
	{
	 print 'Nem'; ?> <br /> <?php 
	} 
if ($sor['sote']=='J') 
	{
	print 'Jelentkezett'; ?> <br /> <?php 
	} 
if ($sor['sote']=='F') 
	{
	print 'Felvett'; ?> <br /> <?php 
	} 
if ($sor['sote']=='T') 
	{
	print 'Tandíjat befizette'; ?> <br /> <?php 
	} */		
?>
</option>
<option value="N">Nem</option>
<option value="J">Jelentkezett</option>
<option value="F">Felvett</option>
<option value="T">Tandíjat befizette</option>
</select><br>
<br>
-->
Jön-e:
<select name="jon">
<option>
<?php 
if ($sor['jon']=='I') 
	{
	print 'Igen'; ?> <br /> <?php 
	} 
if ($sor['jon']=='N') 
	{
	print 'Nem'; ?> <br /> <?php 
	} 
?></option>
<option value="I">Igen</option>
<option value="N">Nem</option>
</select><br>
</fieldset> 