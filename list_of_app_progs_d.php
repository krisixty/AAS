<?php
$result=$conn->query("SELECT * FROM progapply");
$row=mysqli_fetch_array($result);

$G1 = $row['G1'];
$M1 = $row['M1'];
$V = $row['V'];
$F = $row['F'];
?>


<label for="medizin">Humanmedizin in deutscher Sprache:</label>
	<select id="medizin" name="medizin">
	<? if ($G1 == 1) { ?><option value="G1">Ja</option><? }?>
	<? if ($G1 !== 1) { ?><option value="">Nein</option><? }?>
     </select>
     
	Parallele Bewerbung für:<br>
	<label for="medicine">den englischsprachigen Studiengang:</label>
	<select id="medicine" name="medicine">
		<option value="">-- select one --</option>
	<? if ($M1 == 1) { ?><option value="M1">Ja</option><? }?>
		<option value="">Nein</option>
     </select>
      
	<label for="vorbjahr">das deutschsprachige Vorbereitungsjahr:</label>
	<select id="vorbjahr" name="vorbjahr">
		<option value="">-- select one --</option>
	<? if ($V == 1) { ?><option value="V">Ja</option><? }?>
		<option value="">Nein</option>
     </select>

	<label for="prep">das englischsprachige Vorbereitungsjahr:</label>
	<select id="prep" name="prep">
		<option value="">-- select one --</option>
	<? if ($F == 1) { ?><option value=F">Ja</option><? }?>
		<option value="">Nein</option>
     </select>


	   
