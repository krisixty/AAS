<fieldset><legend>Felvételi döntés:</legend>
<br />
<?php
$decisions=$conn->query("SELECT * FROM decisions WHERE jel_id='$jel_id'");
$i = 1;
while($sor=mysqli_fetch_array($decisions))
	{
	$dec_id = $sor['id'];
	$notifmail = $sor['notifmail'];
	?>
	<fieldset><legend>Döntés <? echo $i; ?>.</legend>
	 Döntés dátuma: <?php print $sor['date']; ?><br />
     Döntés: <?php include 'decisions_english.php';?>
	 Program: <?php include 'programs_dec.php';?>
	 Döntés alapja: <?php print $sor['basis'];?><br />
   	 Visszajelzési határidő: <?php print $sor['dfdate'];?><br />
	 Letter sent via e-mail: <?php print $sor['emaildate'];?><br />
     Letter sent to:
		<?php 
			if($sor['tocas']=='C')	
				{
				print 'College International';
				}
			if($sor['tocas']=='A')	
				{
				print 'Avicenna';
				}
			if($sor['tocas']=='S')	
				{
				print 'Student';
				}
		?>
	Dátum: <?php print $sor['letterdate'];?><br /><br />
	<?
	//ha nincs még értesítő email küldve, akkor megjeleníti a törlés és az e-mail küldő gombot
	if($notifmail == 0) {
			delDecision();
			$notification_type = "decision";
			sendMailForm($notification_type);
		}
		else {
		?>
			E-mail küldés dátuma: <?php print $notifmail; ?><br>
		<?
		}
	$i++;
	?></fieldset><?
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
<option value="M1">
Medicine - Year 1</option>
<!--
<option value="M1e">
Medicine - Exemption from the entrance examination for year 1</option>
-->
<!-- Nem kell nekik 2014-re
<option value="A">
Anatomy Summer Course + Transfer to year 2</option>
-->
<option value="M2">
Medicine - Year 2</option>
<option value="M3">
Medicine - Year 3</option>
<option value="D1">
Dentistry - Year 1</option>
<!--
<option value="D1e">
Dentistry - Exemption from the entrance examination for year 1</option>
-->
<option value="D2">
Dentistry - Year 2</option>
<option value="D3">
Dentistry - Year 3</option>
<option value="P1">
Pharmacy - Year 1</option>
<!--
<option value="P1e">
Pharmacy - Exemption from the entrance examination for year 1</option>
-->
<option value="P2">
Pharmacy - Year 2</option>
<option value="P3">
Pharmacy - Year 3</option>
<option value="F">
Foundation Year</option>
</select>
<br />

Döntés:
<select class="selectone" name="decision" id="decision">
<option value="">-- select one --</option>
		<option value="N">No decision yet</option><br />  
		<option value="F">Accepted</option><br />  
        <option value="X">Entrance Examination Required</option><br />
		<!--
        <option value="P">Accepted to Foundation Year</option><br />
        <option value="R">Entrance Examination Repeat</option><br />
		-->
		<option value="T">Retake entrance examination</option><br />
        <option value="I">Accepted to Foundation Year/Retake Entrance Examination</option><br />
		<option value="L">Evaluation Examination Required</option><br />
		<option value="E">Rejected</option><br />  
		<option value="V">Waiting list</option><br /> 
		<option value="H">Postponement</option><br />
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
<br />

Letter sent via e-mail: 
<select name="emailyear">
	<option>
	<?php
	  $y=date('Y');
	  echo $y; 
	?>
	</option>
</select>
              
<select name="emailmonth">
<?php include 'months.php';?>
</select>
   
<select name="emailday">
<?php include 'days.php';?>
</select>
<br />


Letter sent to:
<select name="tocas">
<option value="C">College International</option>
<option value="A">Avicenna</option>
<option value="S">Student</option>
</select>

Dátum:
<select name="letteryear">
	<option>
	<?php
	  $y=date('Y');
	  echo $y; 
	?>
	</option>
</select>
              
<select name="lettermonth">
<?php include 'months.php';?>
</select>
   
<select name="letterday">
<?php include 'days.php';?>
</select>
<br />

<p>
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type='submit' name='submit' value='Új döntés rögzítése'>
</p>

</form>

<p>Felvételi levelek:<br>
<?
	$type_of_doc = 'acceptance_letter';
	docUploadFormOfficerUI(); ?>
	<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
</p>

</fieldset>
<?php include 'data_remarks_dec.php';?>
</fieldset>