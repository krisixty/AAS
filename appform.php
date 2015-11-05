<?php   
require_once('aas_includes.php');
session_start();
do_html_header('');

check_valid_user();

$username=$_SESSION['valid_user'];
$conn = db_connect();
$result = $conn->query("SELECT * FROM applicants WHERE username='$username'");

if ($result->num_rows>0) //vizsgálja, hogy adott-e már be jelentkezést
	{
	require_once ('adatok.php');
	do_html_footer();
	exit; 
	} 

display_application_info();
?>

<form action="apply.php" method="post" id="form1" target="_blank">

<h3>Application Form for English Language Programs 2015/2016</h3>

Hereby, I apply to:<br><br>


	
	<?php include 'list_of_app_progs2.php'; //a választható angol programok listája?> 
   

	<label for="fname">Family name:</label>
	<input type="text" name="fname" id="fname" size="40" maxlength="50">

	<label for="gname">First name:</label>
	<input type="text" name="gname" id="gname" size="40" maxlength="50">

	<label for="gender">Gender:</label>
	<select name="gender" id="gender">
		<option value="">-- select one --</option>
		<option value="F">Male</option>
		<option value="N">Female</option>
	</select>


	Place of Birth
	<label for="pob_country">Country:</label>
	<select name="pob_country" id="pob_country">
			<?php include 'countries.php';?>
	</select>

	<label for="pob_city">City:</label>
	<input type="text" name="pob_city" id="pob_city" size="40" maxlength="30">

	<label for="day">Date of Birth:</label>
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

	<label for="citizen">Citizenship:</label>
	<select select name="citizen" id="citizen">
			<?php include 'nationalities.php';?>  
	</select>
			
	<label for="citizen2">Citizenship 2 (if any):</label>
	<select select name="citizen2" id="citizen2">
			<?php include 'nationalities.php';?>  
	</select>	

	Mother's maiden name:     
	<label for="mfname">Family name:</label>
	<input type="text" name="mfname" id="mfname" size="40" maxlength="50">
	<label for="mgname">First name:</label>
	<input type="text" name="mgname" id="mgname" size="40" maxlength="50">

	Permanent Address:
	<label for="permadd">Street No\Street Name\PO.Box.</label>
	<input type="text" name="permadd" id="permadd" size="40" maxlength="50">

	<label for="add_pc">Postal Code: (If you don't have postal code write '-')</label>
	<input type="text" name="add_pc" id="add_pc" size="40" maxlength="20">

	<label for="add_city">City:</label>
	<input type="text" name="add_city" id="add_city" size="40" maxlength="30">
		
	<label for="add_country">Country:</label>
	<select name="add_country" id="add_country">
			<?php include 'countries.php';?>
	</select>
		
	<label for="phone">Phone number:</label>
	<input type="text" name="phone" id="phone" size="40" maxlength="20">


	<label for="proof_type">Proof of Identification:</label>
	<select name="proof_type" id="proof_type">
		<option value="">-- select one --</option>
		<option value="P">Passport</option>
		<option value="I">ID Card</option>
	</select>
		  
	<label for="proof_num">Number:</label>
	<input type="text" name="proof_num" id="proof_num" size="40" maxlength="20">


	<label for="firstlang">Your first language:</label>
	<input type="text" name="firstlang" id="firstlang" size="40" maxlength="20">


	High school Leaving Examination
	<label for="hs_name">Name of Institution:</label>
	<input type="text" name="hs_name" id="hs_name" size="40" maxlength="50">


	<label for="hs_year">Year of graduation:</label>
	<select name="hs_year" id="hs_year">
			<option value="">-- year --</option>
	<?php
		  $y=date('Y');
		  for($i=$y; $i>1950; $i--) 
				{?>
				<option><?php echo $i; ?></option>   
	<?php 		} ?>
	</select>

	<label for="hs_day">If you have already graduated write the day and month of graduation:</label>
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
	 
	<label for="hs_certnum">Certificate number:</label>
	<input type="text" name="hs_certnum" id="hs_certnum" size="40" maxlength="30">
		
	<label for="hs_country">Country:</label>
	<select name="hs_country" id="hs_country">
	 <?php    include 'countries.php';?>
	</select>
		
	<label for="hs_city">City:</label>
	<input type="text" name="hs_city" id="hs_city" size="40" maxlength="30">

	<label for="studs">Studies following high school graduation(if any):</label>
	<input type="text" name="studs" id="studs" size="40" maxlength="50">

	
	<fieldset> 
	
		<legend>In case of Emergency please notify:</legend>
	   
			<label for="er_fname">Family name:</label>
			<input type="text" name="er_fname" id="er_fname" size="40" maxlength="50">
			
			<label for="er_gname">First name:</label>
			<input type="text" name="er_gname" id="er_gname" size="40" maxlength="50">
			
			<label for="er_relation">Relationship:</label>
			<input type="text" name="er_relation" id="er_relation" size="40" maxlength="50">
			
			<label for="er_phone">Phone number:</label>
			<input type="text" name="er_phone" id="er_phone" size="40" maxlength="20">

			<label for="er_email">Email address:</label>
			<input type='email' id="er_email" name='er_email' maxlength="50">
			
			Permanent Address:
			<label for="er_permadd">Street No\Street Name\PO.Box.</label>
			<input type="text" name="er_permadd" id="er_permadd" size="40" maxlength="50">

			<label for="er_add_pc">Postal Code: <br>(If the person doesn't have postal code write '-')</label>
			<input type="text" name="er_add_pc" id="er_add_pc" size="40" maxlength="20">

			<label for="er_add_city">City:</label>
			<input type="text" name="er_add_city" id="er_add_city" size="40" maxlength="30">
				
			<label for="er_add_country">Country:</label>
			<select name="er_add_country" id="er_add_country">
					<?php include 'countries.php';?>
			</select>
	
	</fieldset>	

	
	<label for="pack">I am sending my application package to the:</label>
	<select name="pack" id="pack">
		<option value="">-- select one --</option>
			<option value="U">University of Szeged directly</option>
			<option value="R">Local representative of Study Hungary</option>
	</select>
		

	<label for="rep_name">Name of the local representative (if any):</label>
	<input type="text" name="rep_name" id="rep_name" size="40">

	<label for="about">I first learnt about the programs offered by the University of Szeged from:</label>
	<select name="about" id="about">
		<option value="">-- select one --</option>
		<option value="W">www.szegedmed.hu</option>
		<option value="R">local representative</option>
		<option value="H">www.studyhungary.hu</option>
		<option value="S">a Szeged student</option>
		<option value="E">at an education fare</option>
		<option value="X">advertisement</option>
		<option value="I">my high school</option>
		<option value="F">friend/relative</option>
		<option value="O">other</option>
	</select>
		
    <button type="submit">Submit</button>

</form>
<?php
do_html_footer();
?>
