<?php
$other_data=$conn->query("SELECT * FROM other WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($other_data);
?>
<fieldset><legend>Egyéb:</legend>
<!--
Más magyar egyetemre jelentkezett-e?<br> //KIKAPCSOLVA, MERT NEM KELL NEKIK 2014.07.14.
<br>
Pote:
<select name="pote">
<option>
<?php 
//include 'pote.php';	
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
//include 'sote.php';		
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
include 'jon.php';	
?></option>
<option value="I">Igen</option>
<option value="N">Nem</option>
</select><br>
</fieldset> 