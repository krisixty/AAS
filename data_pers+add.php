<fieldset><legend>Személyes adatok:</legend>
Jel ID: <?php print $sor['jel_id'] ?> <br />
Vezetéknév:
<input name="fname" type="text" id="fname" maxlength="100" value="<?php print $sor['fname'] ?>" />
Keresztnév:
<input name="gname" type="text" id="gname" maxlength="100" value="<?php print $sor['gname'] ?>" /><br />
Nem:
<select name="gender">
<option>
<?php 
	if($sor['gender']=='F')	
		{
		print 'Férfi';
		}
	if($sor['gender']=='N')
		{
		print 'Nő';	
		}
?> 
</option>
<option value="F">Férfi</option>
<option value="N">Nő</option>
</select><br>
Születési idő:
<select name="day">
<option>
<?php 
$dob  = $sor['dob'];
$pieces = explode("-", $dob);
echo $pieces[2]; // piece0
?></option>
<?php include 'days.php';?>
</select>
   
<select name="month">
<option>
<?php 
$dob  = $sor['dob'];
$pieces = explode("-", $dob);
echo $pieces[1]; // piece1
?></option>
<?php include 'months.php';?>
</select>
    
<select name="year">
<option>
<?php
$dob  = $sor['dob']; //tömbbe pakolja a születési dátum én, nap, hónap részeit
$pieces = explode("-", $dob);
echo $pieces[0]; // piece2
?></option>
<?php
	  $y=date('Y');
	  for($i=$y-18; $i>1899; $i--) 
	     	{?>
			<option><?php echo $i; ?></option>   
<?php 		} ?>
		</select>

<br />

Születési hely: ország:
<select name="pob_country">
<option><?php print $sor['pob_country'] ?></option>
<?php include 'countries.php';?>
</select>
város:
<input name="pob_city" type="text" value="<?php print $sor['pob_city'] ?>" maxlength="50" /><br />
Állampolgárság 1.:
<select name="citizen">
<option><?php print $sor['citizen'] ?></option>
<?php include 'nationalities.php';?>
</select><br />

<?php
//kettős állampolgárság  
$citizen2=$conn->query("SELECT * FROM citizen2 WHERE jel_id='$jel_id'");
$citsor=mysqli_fetch_array($citizen2);
?>
Állampolgárság 2.:
<select name="citizen2">
<option><?php print $citsor['citizen2'] ?></option>
<?php include 'nationalities.php';?>
</select><br />

Anyja születési neve:
Vezetéknév:
<input name="mfname" type="text" value="<?php print $sor['mfname'] ?>" maxlength="100" />
Keresztnév:
<input name="mgname" type="text" value="<?php print $sor['mgname'] ?>" maxlength="100" /><br />
Anyanyelv:
<input name="firstlang" type="text" value="<?php print $sor['firstlang'] ?>" /><br />
Személyazonosító:
<select name="proof_type">
<option>
<?php 
if($sor['proof_type']=='I')	
		{
		print 'ID Card';
		}
	if($sor['proof_type']=='P')
		{
		print 'Passport';	
		}
?>
</option>
<option value="P">Passport</option>
<option value="I">ID Card</option>
</select>
Szám:
<input name="proof_num" type="text" value="<?php print $sor['proof_num'] ?>" /><br />
</fieldset>

<fieldset><legend>Elérhetőségek:</legend>
Állandó lakcím:<br />
Utca/Házszám/Postafiók:
<input name="permadd" type="text" value="<?php print $sor['permadd'] ?>" size="100" maxlength="100" /><br />
Irányítószám:
<input name="add_pc" size="30" type="text" value="<?php print $sor['add_pc'] ?>" /><br />
Város:
<input name="add_city" size="50" type="text" value="<?php print $sor['add_city'] ?>" /><br />
Ország:
<select name="add_country">
<option><?php print $sor['add_country'] ?></option>
<?php include 'countries.php';?>
</select>
Telefonszám:
<input name="phone" type="text" value="<?php print $sor['phone'] ?>" /><br />
E-mail: 

<?php 
$applicant = $conn->query("SELECT username FROM applicants WHERE jel_id='$jel_id'");
$row=mysqli_fetch_array($applicant);
$app_name=$row['username'];
$email= $conn->query("SELECT email FROM user WHERE username='$app_name'");
$row=mysqli_fetch_array($email); ?>
<input name="email" size="50" type="text" value="<?php print $row['email'] ?>"/><br />
</fieldset>

	<fieldset> 
	
		<legend>In case of Emergency please notify:</legend>
	   
			<label for="er_fname">Family name:</label>
			<input type="text" name="er_fname" id="er_fname" size="40" maxlength="100" value="<?php print $sor['er_fname'];?>"><br>
			
			<label for="er_gname">First name:</label>
			<input type="text" name="er_gname" id="er_gname" size="40" maxlength="100" value="<?php print $sor['er_gname'];?>"><br>
			
			<label for="er_relation">Relationship:</label>
			<input type="text" name="er_relation" id="er_relation" size="40" maxlength="100" value="<?php print $sor['er_relation'];?>"><br>
			
			<label for="er_phone">Phone number:</label>
			<input type="text" name="er_phone" id="er_phone" size="40" maxlength="20" value="<?php print $sor['er_phone'];?>"><br>

			<label for="er_email">Email address:</label>
			<input type='email' id="er_email" name='er_email' maxlength="100" value="<?php print $sor['er_email'];?>"><br>
			
			Permanent Address:
			<label for="er_permadd">Street No\Street Name\PO.Box.</label>
			<input type="text" name="er_permadd" id="er_permadd" size="40" maxlength="100" value="<?php print $sor['er_permadd'];?>"><br>

			<label for="er_add_pc">Postal Code:</label>
			<input type="text" name="er_add_pc" id="er_add_pc" size="40" maxlength="20" value="<?php print $sor['er_add_pc'];?>"><br>

			<label for="er_add_city">City:</label>
			<input type="text" name="er_add_city" id="er_add_city" size="40" maxlength="50" value="<?php print $sor['er_add_city'];?>"><br>
				
			<label for="er_add_country">Country:</label>
			<select name="er_add_country" id="er_add_country">
					<option><?php print $sor['er_add_country'];?></option>
					<?php include 'countries.php';?>
			</select>
	
	</fieldset>	












