<?php   
require_once('aas_includes.php');
session_start();
do_html_header('');
?>
<p class="printcimer"><img src="../style/images/cimer_ff_s.png" /></p>
<p class="printheader">
	University of Szeged<br />
	Application Form for English Language Programs <br />
	2013/2014</p>
<?php
check_valid_user();
display_user_menu();
//do_html_footer();

$username=$_SESSION['valid_user'];
$conn = db_connect();
$result = $conn->query("SELECT * FROM applicants WHERE username='$username'");

if ($result->num_rows>0) //vizsgálja, hogy adott-e már be jelentkezést
	{
	require_once ('adatok.php');
	include 'appform_print.php';
	exit; 
	} 
?>

<form action="apply.php" method="post" id="form1" target="_blank">
<table class="table_appform">
<tr><td><b>Application Form for</b></td></tr>
<tr><td><b>English Language Programs 2013/2014</b></td></tr>
<tr><td><br /></td></tr>
<tr><td><u>Hereby, I apply to:</u></td></tr>
<?php include 'list_of_app_progs.php'; //a választható angol programok listája?> 
       
<tr><td><br /></td></tr>
<tr><td>Family name:</td></tr>
<tr><td><input class="input_app" name="fname" type="text" id="fname" size="40" maxlength="100"></td></tr>

<tr><td>Given name:</td></tr>
<tr><td><input class="input_app" name="gname" type="text" id="gname" size="40" maxlength="100"></td></tr>

<tr><td>Gender:</td></tr>
<tr><td><select class="selectone" name="gender" id="gender">
      <option value="">-- select one --</option>
        <option value="F">Male</option>
        <option value="N">Female</option>
      </select></td></tr>

<tr><td><br /></td></tr> 
<tr><td><u>Place of Birth</u></td></tr>
<tr><td>Country:</td></tr>
<tr><td><select class="selectone" name="pob_country" id="pob_country">
		<?php include 'countries.php';?>
	</select></td></tr>

<tr><td>City:</td></tr>
<tr><td><input class="input_app" name="pob_city" type="text" id="pob_city" size="40" maxlength="50"></td></tr>

<tr><td>Date of Birth:</td></tr>
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
<tr><td>Citizenship:</td></tr>
<tr><td><select class="selectone" select name="citizen" id="citizen">
    	<?php include 'nationalities.php';?>  
		</select></td></tr>
		
<tr><td>Citizenship 2:</td></tr>
<tr><td><select class="selectone" select name="citizen2" id="citizen2">
    	<?php include 'nationalities.php';?>  
		</select></td></tr>		

<tr><td><u>Mother's maiden name:</u></td></tr>      
<tr><td>Family name:</td></tr>
<tr><td><input class="input_app" name="mfname" type="text" id="mfname" size="40" maxlength="100"></td></tr>
<tr><td>Given name:</td></tr>
<tr><td><input class="input_app" name="mgname" type="text" id="mgname" size="40" maxlength="100"></td></tr>

<tr><td><br /></td></tr>  
<tr><td><u>Permanent Address:</u></td></tr>
<tr><td>St.No\St.Name\PO.Box.</td></tr>
<tr><td><input class="input_app" name="permadd" type="text" id="permadd" size="40" maxlength="100"></td></tr>

<tr><td>Postal Code:</td></tr>
<tr><td>(If you don't have postal code write '-')</td></tr>
<tr><td><input class="input_app" name="add_pc" type="text" id="add_pc" size="40" maxlength="20"></td></tr>

<tr><td>City:</td></tr>
<tr><td><input class="input_app" name="add_city" type="text" id="add_city" size="40" maxlength="50"></td></tr>
    
<tr><td>Country:</td></tr>
<tr><td><select class="selectone" name="add_country" id="add_country">
 		<?php include 'countries.php';?>
    </select></td></tr>
    
<tr><td>Phone number:</td></tr>
<tr><td><input class="input_app" name="phone" type="text" id="phone" size="40" maxlength="20"></td></tr>

<tr><td><br /></td></tr>  
<tr><td>Proof of Identification:</td></tr>
<tr><td><select class="selectone" name="proof_type" id="proof_type">
      <option value="">-- select one --</option>
        <option value="P">Passport</option>
        <option value="I">ID Card</option>
      </select></td></tr>
      
<tr><td>Number:</td></tr>
<tr><td><input class="input_app" name="proof_num" type="text" id="proof_num" size="40" maxlength="20"></td></tr>

<tr><td><br /></td></tr>  
<tr><td>Your first language:</td></tr>
<tr><td><input class="input_app" name="firstlang" type="text" id="firstlang" size="40" maxlength="20"></td></tr>

<tr><td><br /></td></tr>  
<tr><td><u>High school Leaving Examination</u></td></tr> 
<tr><td>Name of Institution:</td></tr>
<tr><td><input class="input_app" name="hs_name" type="text" id="hs_name" size="40" maxlength="50"></td></tr>

<tr><td>Year:</td></tr>
<tr><td><input class="input_app" name="hs_year" type="text" id="hs_year" size="40" maxlength="4"></td></tr>
    
<tr><td>Country:</td></tr>
<tr><td><select class="selectone" name="hs_country" id="hs_country">
 <?php    include 'countries.php';
?>
    </select></td></tr>
    
<tr><td>City:</td></tr>
<tr><td><input class="input_app" name="hs_city" type="text" id="hs_city" size="40" maxlength="50"></td></tr>

<tr><td><br /></td></tr>
<tr><td>Studies following high school graduation(if any):</td></tr>
<tr><td><input class="input_app" name="studs" type="text" id="studs" size="40" maxlength="250"></td></tr>

<tr><td><br /></td></tr>  
<tr><td>I am sending my application package to the:</td></tr>
<tr><td><select class="selectone" name="pack" id="pack">
    <option value="">-- select one --</option>
        <option value="U">University of Szeged, Hungary (by postal service)</option>
        <option value="R">Local representative of Study Hungary</option>
    </select></td></tr>
    
<tr><td><br /></td></tr>  
<tr><td>Name of the local representative (if any):</td></tr>
<tr><td><input class="input_app" name="rep_name" type="text" id="rep_name" size="40"></td></tr>

<tr><td>I first learnt about the programs offered by the University of Szeged:</td></tr>
<tr><td><select class="selectone" name="about" id="about">
    <option value="">-- select one --</option>
        <option value="S">from a Szeged student</option>
        <option value="N">from the Internet</option>
        <option value="R">from the local representative</option>
        <option value="E">at an education fare/seminar</option>
        <option value="M">from the media</option>
    </select></td></tr>

<tr><td><br /></td></tr>     
<tr><td><input type="submit" name="Submit" id="Submit" value="Submit Application" /></td></tr>
<tr><td></td></tr>
</table>
</form>


</body>
</html>
