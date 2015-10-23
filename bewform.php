<?php 
$pageLanguage = 'german';  
require_once('aas_includes.php');
session_start();
do_html_header('');
?>
<!--
<p class="printcimer"><img src="../style/images/cimer_ff_s.png" /></p>
<p class="printheader">
	Universität Szeged<br />
	Bewerbungsformular für das Studium der<br />
	Humanmedizin in deutscher Sprache 2014/2015</p>
-->	
<?php   
check_valid_user();

$username=$_SESSION['valid_user'];
$conn = db_connect();
$result = $conn->query("SELECT * FROM applicants WHERE username='$username'");

if ($result->num_rows>0) //vizsgálja, hogy adott-e már be jelentkezést
	{
	require_once ('adatok_d.php');
	include 'bewform_print.php';
	do_html_footer();
	exit; 
	}
	
display_application_info_d();	
?>

<form action="apply.php" method="post" id="form1" target="_blank">

<h3>Bewerbungsformular für das Studium der Humanmedizin in deutscher Sprache 2015/2016</h3>

Hiermit bewerbe ich mich für das Studium der<br><br>

	<?php //include 'list_of_app_progs_d2.php'; //a választható német programok listája _d: összes, _d2: vorb és paralell english?> 
       

	<label for="fname">Nachname:</label>
	<input type="text" name="fname" id="fname" size="40" maxlength="50">

	<label for="gname">Vorname:</label>
	<input type="text" name="gname" id="gname" size="40" maxlength="50">

	<label for="gender">Geschlecht:</label>
		<select name="gender" id="gender">
			<option value="">-- select one --</option>
			<option value="N">Weiblich</option>
			<option value="F">Männlich</option>
      </select>


	Geburtsort
	<label for="pob_country">Land:</label>
	<select name="pob_country" id="pob_country">
			<?php include 'countries.php';?>
	</select>

	<label for="pob_city">Stadt:</label>
	<input type="text" name="pob_city" id="pob_city" size="40" maxlength="30">

	<label for="day">Geburtsdatum:</label>
	<select name="day" id="day">
			<?php include 'days.php';?>  
	</select>

	<select name="month" id="month">
      	<option value="">-- month --</option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	</select>
        
	<select name="year" id="year">
		<option value="">-- year --</option>
	<?php
		  $y=date('Y');
		  for($i=$y-18; $i>1899; $i--) 
				{?>
				<option><?php echo $i; ?></option>   
	<?php 		} ?>
	</select>


	<label for="citizen">Staatsbürgerschaft:</label>
	<select select name="citizen" id="citizen">
			<?php include 'nationalities.php';?>  
	</select>
		
	<label for="citizen2">Staatsbürgerschaft 2:</label>
	<select select name="citizen2" id="citizen2">
			<?php include 'nationalities.php';?>  
	</select>	

	Mädchenname der Mutter: 
	<label for="mfname">Nachname:</label>
	<input type="text" name="mfname" id="mfname" size="40" maxlength="50">
	<label for="mgname">Vorname:</label>
	<input type="text" name="mgname" id="mgname" size="40" maxlength="50">

	Wohnadresse
	<label for="permadd">Str./Haus-Nr</label>
	<input type="text" name="permadd" id="permadd" size="40" maxlength="50">

	<label for="add_pc">Postleitzahl:</label>
	<input type="text" name="add_pc" id="add_pc" size="40" maxlength="20">

	<label for="add_city">Stadt:</label>
	<input type="text" name="add_city" id="add_city" size="40" maxlength="30">

	<label for="add_country">Land:</label>
	<select name="add_country" id="add_country">
			<?php include 'countries.php';?>
	</select>
 
	<label for="phone">Tel:</label>
	<input type="text" name="phone" id="phone" size="40" maxlength="20">

	<label for="proof_type">Personalausweis oder Reisepass:</label>
	<select name="proof_type" id="proof_type">
		<option value="">-- select one --</option>
        <option value="I">Personalausweis</option>
        <option value="P">Reisepass</option>
    </select>
      
	<label for="proof_num">Nummer:</label>
	<input type="text" name="proof_num" id="proof_num" size="40" maxlength="20">


	<label for="firstlang">Muttersprache:</label>
	<input type="text" name="firstlang" id="firstlang" size="40" maxlength="20">

	
	Abiturprüfung
	<label for="hs_name">Name der Schule:</label>
	<input type="text" name="hs_name" id="hs_name" size="40" maxlength="50">

	<label for="hs_year">Jahr:</label>
	(Insofern Sie Ihr Abitur dieses Jahr machen, geben Sie bitte "2015" an.)

	<select name="hs_year" id="hs_year">
			<option value="">-- year --</option>
	<?php
		  $y=date('Y');
		  for($i=$y; $i>1950; $i--) 
				{?>
				<option><?php echo $i; ?></option>   
	<?php 		} ?>
	</select>

	<label for="hs_day">Falls Sie Ihre Abiturprüfung schon abgelegt haben, geben Sie bitte Monat und Tag der Ausstellung des Zeugnisses an.</label>
	<select name="hs_day" id="hs_day">
      	<?php include 'days.php';?>  
	</select>

	<select name="hs_month" id="hs_month">
	<option value="">-- month --</option>
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
	</select>

	<label for="hs_certnum">Nummer des Zeugnisses (Insofern das Zeugnis keine Nummer hat, geben Sie bitte ein „-„ an.)</label>
	<input type="text" name="hs_certnum" id="hs_certnum" size="40" maxlength="30">
    
	<label for="hs_country">Land:</label>
	<select name="hs_country" id="hs_country">
	 <?php    include 'countries.php';?>
	</select>
    
	<label for="hs_city">Stadt:</label>    
	<input type="text" name="hs_city" id="hs_city" size="40" maxlength="30">

	<label for="studs">Studium nach der Abiturprüfung (Es ist keine Vorraussetzung der Bewerbung):</label>
	<input type="text" name="studs" id="studs" size="40" maxlength="50">
	
	<fieldset> 
	
		<legend>Im Notfall zu verständigen:</legend>
	   
			<label for="er_fname">Nachname:</label>
			<input type="text" name="er_fname" id="er_fname" size="40" maxlength="50">
			
			<label for="er_gname">Vorname:</label>
			<input type="text" name="er_gname" id="er_gname" size="40" maxlength="50">
			
			<label for="er_relation">Angehörige:</label>
			<input type="text" name="er_relation" id="er_relation" size="40" maxlength="50">
			
			<label for="er_phone">Tel:</label>
			<input type="text" name="er_phone" id="er_phone" size="40" maxlength="20">

			<label for="er_email">E-Mail:</label>
			<input type='email' id="er_email" name='er_email' maxlength="50">
			
			Permanent Address:
			<label for="er_permadd">Wohnadresse: Str./HausNr:.</label>
			<input type="text" name="er_permadd" id="er_permadd" size="40" maxlength="50">

			<label for="er_add_pc">Postleitzahl:</label>
			<input type="text" name="er_add_pc" id="er_add_pc" size="40" maxlength="20">

			<label for="er_add_city">Stadt:</label>
			<input type="text" name="er_add_city" id="er_add_city" size="40" maxlength="30">
				
			<label for="er_add_country">Land:</label>
			<select name="er_add_country" id="er_add_country">
					<?php include 'countries.php';?>
			</select>
	
	</fieldset>	

	<label for="about">Woher haben Sie die Information, dass an unserer Universität die Möglichkeit eines deutschsprachigen Studiums besteht?</label>
	<select name="about" id="about">
    <option value="">-- select one --</option>
        <option value="B">von Bekannten</option>
        <option value="N">Internet</option>
        <option value="D">vom DAAD</option>
        <option value="P">aus der Presse</option>
        <option value="G">von Ihrem Gymnasium (Plakat)</option>
        <option value="A">vom Arbeitsamt (Berufsberatung)</option>
    </select>

	<input name="pack" type="hidden" value="U" />   

	<button type="submit">Abschicken</button>
</form>
<?php
do_html_footer();
?>