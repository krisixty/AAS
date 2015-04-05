<?php   
require_once('aas_includes.php');
session_start();
do_html_header('');
?>
<p class="printcimer"><img src="../style/images/cimer_ff_s.png" /></p>
<p class="printheader">
	Universität Szeged<br />
	Bewerbungsformular für das Studium der<br />
	Humanmedizin in deutscher Sprache 2013/2014</p>
	

<?php   
check_valid_user();
display_user_menu_d();
//do_html_footer();

$username=$_SESSION['valid_user'];
$conn = db_connect();
$result = $conn->query("SELECT * FROM applicants WHERE username='$username'");

if ($result->num_rows>0) //vizsgálja, hogy adott-e már be jelentkezést
	{
	require_once ('adatok_d.php');
	include 'bewform_print.php';
	exit; 
	}
?>

<form action="apply.php" method="post" id="form1" target="_blank">
<table class="table_appform">
<tr><td><b>Bewerbungsformular für das Studium der</b></td></tr>
<tr><td><b>Humanmedizin in deutscher Sprache</b></td></tr>
<tr><td><b>2013/2014</b></td></tr>
<tr><td><br /></td></tr>
<tr><td><u>Hiermit bewerbe ich mich:</u></td></tr>
<tr><td>Humanmedizin in deutscher Sprache:</td></tr>
<tr><td><select class="selectone" name="medizin" id="medizin">
		<option value="">Nein</option>
			<option value="G1">
				Ja</option>
      </select></td></tr>
      
<tr><td>Parallele Bewerbung für:</td></tr> 
<tr><td>den englischsprachigen Studiengang:</td></tr>
<tr><td><select class="selectone" name="medicine" id="medicine">
      <option value="">Nein</option>
        	<option value="M1">
        		Ja</option>
      </select></td></tr>
      
<tr><td>das deutschessprachige Vorbereitungsjahr:</td></tr>
<tr><td><select class="selectone" name="vorbjahr" id="vorbjahr">
      <option value="">Nein</option>
        	<option value="V">
        		Ja</option>
		</select></td></tr>
   
<tr><td>das englischsprachige Vorbereitungsjahr:</td></tr>
<tr><td><select class="selectone" name="prep" id="prep">
      <option value="">Nein</option>
       <option value="F">
        		Ja</option>
		</select></td></tr>
       </select></td></tr>
       
<tr><td><br /></td></tr>
<tr><td>Nachname:</td></tr>
<tr><td><input class="input_app" name="fname" type="text" id="fname" size="40" maxlength="100"></td></tr>

<tr><td>Vorname:</td></tr>
<tr><td><input class="input_app" name="gname" type="text" id="gname" size="40" maxlength="100"></td></tr>

<tr><td>Geschlecht:</td></tr>
<tr><td><select class="selectone" name="gender" id="gender">
      <option value="">-- select one --</option>
        <option value="N">Weiblich</option>
        <option value="F">Männlich</option>
      </select></td></tr>

<tr><td><br /></td></tr>
<tr><td><u>Geburtsort</u></td></tr>
<tr><td>Land:</td></tr>
<tr><td><select class="selectone" name="pob_country" id="pob_country">
		<?php include 'countries.php';?>
	</select>
</td></tr>

<tr><td>Stadt:</td></tr>
<tr><td><input class="input_app" name="pob_city" type="text" id="pob_city" size="40" maxlength="50"></td></tr>

<tr><td>Geburtsdatum:</td></tr>
<tr><td><select class="selectwo" name="day" id="day">
      	<?php include 'days.php';?>  
		</select>

		<select class="selectwo" name="month" id="month">
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
        
		<select class="selectwo" name="year" id="year">
		<option value="">-- year --</option>
<?php
	  $y=date('Y');
	  for($i=$y-18; $i>1899; $i--) 
	     	{?>
			<option><?php echo $i; ?></option>   
<?php 		} ?>
		</select>
</td></tr>

<tr><td>Staatsbürgerschaft:</td></tr>
<tr><td><select class="selectone" select name="citizen" id="citizen">
     	<?php include 'nationalities.php';?>  
		</select></td></tr>

<tr><td><u>Mädchenname der Mutter:</u></td></tr>      
<tr><td>Nachname:</td></tr>
<tr><td><input class="input_app" name="mfname" type="text" id="mfname" size="40" maxlength="100"></td></tr>
<tr><td>Vorname:</td></tr>
<tr><td><input class="input_app" name="mgname" type="text" id="mgname" size="40" maxlength="100"></td></tr>

<tr><td><br /></td></tr>
<tr><td><u>Wohnadresse</u></td></tr>
<tr><td>Str./HausNr</td></tr>
<tr><td><input class="input_app" name="permadd" type="text" id="permadd" size="40"  maxlength="100"></td></tr>

<tr><td>Postleitzahl:</td></tr>
<tr><td><input class="input_app" name="add_pc" type="text" id="add_pc" size="40" maxlength="20"></td></tr>

<tr><td>Stadt:</td></tr>
<tr><td><input class="input_app" name="add_city" type="text" id="add_city" size="40" maxlength="50"></td></tr>

<tr><td>Land:</td></tr>
<tr><td><select class="selectone" name="add_country" id="add_country">
	 <?php include 'countries.php';?>
    </select></td></tr>
 
<tr><td>Tel:</td></tr>
<tr><td><input class="input_app" name="phone" type="text" id="phone" size="40" maxlength="20"></td></tr>
<tr><td><br /></td></tr>
<tr><td>Personalausweis oder Reisepass:</td></tr>
<tr><td><select class="selectone" name="proof_type" id="proof_type">
      <option value="">-- select one --</option>
        <option value="I">Personalausweis</option>
        <option value="P">Reisepass</option>
      </select></td></tr>
      
<tr><td>Nummer:</td></tr>
<tr><td><input class="input_app" name="proof_num" type="text" id="proof_num" size="40" maxlength="20"></td></tr>

<tr><td><br /></td></tr>
<tr><td>Muttersprache:</td></tr>
<tr><td><input class="input_app" name="firstlang" type="text" id="firstlang" size="40" maxlength="20"></td></tr>

<tr><td><br /></td></tr>
<tr><td><u>Abiturprüfung</u> </td></tr>
<tr><td>Name der Schule:</td></tr>
<tr><td><input class="input_app" name="hs_name" type="text" id="hs_name" size="40" maxlength="50"></td></tr>


<tr><td>Jahr:</td></tr>
<tr><td>(Insofern Sie Ihr Abitur dieses Jahr machen,</td></tr>
<tr><td>geben Sie bitte „2013“ an.)</td></tr>
<tr><td><input class="input_app" name="hs_year" type="text" id="hs_year" size="40" maxlength="4"></td></tr>
    
<tr><td>Land:</td></tr>
<tr><td><select class="selectone" name="hs_country" id="hs_country">
 		<?php include 'countries.php';?>
    </select></td></tr>
    
<tr><td>Stadt:</td></tr>    
<tr><td><input class="input_app" name="hs_city" type="text" id="hs_city" size="40" maxlength="50"></td></tr>

<tr><td><br /></td></tr>
<tr><td>Studium nach der Abiturprüfung</td></tr>
<tr><td>(Es ist keine Vorraussetzung der Bewerbung):</td></tr>
<tr><td><input class="input_app" name="studs" type="text" id="studs" size="40" maxlength="250"></td></tr>

<tr><td><br /></td></tr>
<tr><td>Woher haben Sie die Information, dass an unserer</td></tr>
<tr><td>Universität die Möglichkeit eines</td></tr>
<tr><td>deutschsprachigen Studiums besteht?</td></tr>
<tr><td><select class="selectone" name="about" id="about">
    <option value="">-- select one --</option>
        <option value="B">von Bekannten</option>
        <option value="N">Internet</option>
        <option value="D">vom DAAD</option>
        <option value="P">aus der Presse</option>
        <option value="G">von Ihrem Gymnasium (Plakat)</option>
        <option value="A">vom Arbeitsamt (Berufsberatung)</option>

    </select></td></tr>

<input name="pack" type="hidden" value="U" />   

<tr><td><input type="submit" name="Submit" id="Submit" value="Submit Application" /></td></tr>
<tr><td><br /></td></tr>
</table>
</form>

</body>
</html>
