<?php
$result=$conn->query("SELECT * FROM progapply");
$row=mysqli_fetch_array($result);

$M1 = $row['M1'];
$M1e = $row['M1e'];
$A = $row['A'];
$M2 = $row['M2'];
$M3 = $row['M3'];
$D1 = $row['D1'];
$D1e = $row['D1e'];
$D2 = $row['D2'];
$D3 = $row['D3'];
$P1 = $row['P1'];
$P1e = $row['P1e'];
$P2 = $row['P2'];
$P3 = $row['P3'];
$F = $row['F'];
$G1 = $row['G1'];
$V = $row['V'];
?>


<label for="medicine">Doctor of Medicine:</label>
	<select id="medicine" name="medicine">
		<option value="">-- select one --</option>
	<? if ($M1 == 1) { ?><option value="M1">Entrance examination for year 1</option><? }?>
	<? if ($M1e == 1) { ?><option value="M1e">Exemption from the entrance examination for year 1</option><? }?>
	<? if ($A == 1) { ?><option value="A">Anatomy Summer Course + Transfer to year 2</option><? }?>
	<? if ($M2 == 1) { ?><option value="M2">Transfer to 2nd year</option><? }?>
    <? if ($M3 == 1) { ?><option value="M3">Transfer to 3rd year</option><? }?>
      </select>
     
<label for="dentistry">Doctor of Dentistry:</label>
	<select id="dentistry" name="dentistry">
		<option value="">-- select one --</option>
	<? if ($D1 == 1) { ?><option value="D1">Entrance examination for year 1</option><? }?>
	<? if ($D1e == 1) { ?><option value="D1e">Exemption from the entrance examination for year 1</option><? }?>
    <? if ($D2 == 1) { ?><option value="D2">Transfer to 2nd year</option><? }?>
    <? if ($D3 == 1) { ?><option value="D3">Transfer to 3rd year</option><? }?>
      </select>
      
<label for="pharmacy">Doctor of Pharmacy:</label>
	<select id="pharmacy" name="pharmacy">
      <option value="">-- select one --</option>
    <? if ($P1 == 1) { ?><option value="P1">Entrance examination for year 1</option><? }?>
	<? if ($P1e == 1) { ?><option value="P1e">Exemption from the entrance examination for year 1</option><? }?>
    <? if ($P2 == 1) { ?><option value="P2">Transfer to 2nd year</option><? }?>
    <? if ($P3 == 1) { ?><option value="P3">Transfer to 3rd year</option><? }?>
      </select>
   
<label for="prep">Foundation year (Preparatory course):</label>
	<select id="prep" name="prep"><option value="">-- select one --</option>
	<? if ($F == 1) { ?><option value="F">Foundation Year</option><? }?>
       </select>