<?php
$username=$_SESSION['valid_user'];
$conn = db_connect();
$applicant= $conn->query("SELECT jel_id FROM applicants WHERE username='$username'");
$sor=mysqli_fetch_array($applicant);
$jel_id=$sor['jel_id'];
$programs= $conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id'");

academicYearer();

div_open();
?>
<fieldset class="text">
	<legend class="text">University of Szeged Application Form <?echo $academicYear;?></legend>
		<fieldset class="text2">
			<legend class="text2">Applied program(s)</legend>
				
				<?php while($sor=mysqli_fetch_array($programs)) {
							include 'programs.php';
					} ?>
		</fieldset>	
			
		<fieldset class="text2">
			<legend class="text2">Personal data</legend>
				
				<?php
				$data= $conn->query("SELECT * FROM applicants WHERE username='$username'");
				$sor=mysqli_fetch_array($data);
				?>
				AAS ID: <?php print $sor['jel_id'];?><br />
				Family Name:<b> <?php print $sor['fname'];?> </b><br />
				Given Name:<b> <?php print $sor['gname'];?> </b><br />
				Gender: 
					<?php 	if($sor['gender']=='F')	{
								print 'Male';
								}
							if($sor['gender']=='N') {
								print 'Female';	
								} ?>  <br />
					
				Place of Birth: <?php print $sor['pob_country'];?>, <?php print $sor['pob_city'];?> <br />    
				Date of Birth: 
					<?php $dob  = $sor['dob']; //tömbbe pakolja a születési dátum én, nap, hónap részeit
					$pieces = explode("-", $dob);
					echo $pieces[2].'-'.$pieces[1].'-'.$pieces[0];
					?> 
					<br />
				Citizenship: <?php print $sor['citizen'];?> <br />
					<?php 
					$cit2=$conn->query("SELECT * FROM citizen2 WHERE jel_id='$jel_id'"); 
					if($cit2->num_rows>0)
						{
						$sor=mysqli_fetch_array($cit2);
						?>Citizenship 2: <?php print $sor['citizen2'].'<br />';  
						}
					?>

				<?php
				$data= $conn->query("SELECT * FROM applicants WHERE username='$username'");
				$sor=mysqli_fetch_array($data)
				?>
				Mother's maiden name: <?php print $sor['mfname'].', '.print $sor['mgname'];?> <br />
				Proof of Identification: 
				<?php 	if($sor['proof_type']=='I')	{
							print 'ID Card';
							}
						if($sor['proof_type']=='P') {
							print 'Passport';	
							} ?>
				, No.:<?php print $sor['proof_num'];?><br />
				First language: <?php print $sor['firstlang'];?>
		
		</fieldset>

		<fieldset class="text2">
			<legend class="text2">Contacts</legend>				
				Permanent Address: <?php print $sor['permadd'];?> <br />
				Postal Code: <?php print $sor['add_pc'];?> <br />
				City: <?php print $sor['add_city'];?> <br />
				Country: <?php print $sor['add_country'];?> <br />
				Phone number: <?php print $sor['phone'];?> <br />
				E-mail: 
				<?php $email= $conn->query("SELECT email FROM user WHERE username='$username'");
				$row=mysqli_fetch_array($email);
				print $row['email'];
				?>
		</fieldset>	

		<fieldset class="text2">
			<legend class="text2">Studies</legend>	
				High school Leaving Examination:<br />
				<?php print $sor['hs_name'];?>, <?php print $sor['hs_year'];?> <br />
				<?php print $sor['hs_city'];?>, <?php print $sor['hs_country'];?> <br />
				Certificate number: <?php print $sor['hs_certnum'];?><br />
	
			<?php	//vizsgálja, hogy van-e érettségi utáni tanulmány
					$stud=$conn->query("SELECT * FROM studs WHERE jel_id='$jel_id'");

					if($stud->num_rows>0)
						{
						while($stud_sor=mysqli_fetch_array($stud))
							{
							?><br />Studies following high school graduation:<br /><?php	
							print $stud_sor['studs'];
							}
						} ?>	
		</fieldset>	
		
		<fieldset class="text2">
			<legend class="text2">In case of Emergency please notify:</legend>	
				Family name: <?php print $sor['er_fname'];?> <br />
				First name: <?php print $sor['er_gname'];?> <br />
				Relationship: <?php print $sor['er_relation'];?> <br />
				Phone number: <?php print $sor['er_phone'];?> <br />
				E-mail: <?php print $sor['er_email'];?> <br />
				Permanent Address: <?php print $sor['er_permadd'];?> <br />
				Postal Code: <?php print $sor['er_add_pc'];?> <br />
				City: <?php print $sor['er_add_city'];?> <br />
				Country: <?php print $sor['er_add_country'];?> <br />
		</fieldset>		
		
							
		<?php	//vizsgálja, hogy van-e képviselő neve
		$rep=$conn->query("SELECT * FROM reps WHERE jel_id='$jel_id'");
		if($rep->num_rows>0)
			{
			while($sor=mysqli_fetch_array($rep))
				{
				?>
				<fieldset class="text2">
					<legend class="text2">Other</legend>
						Name of the local representative:<br><?php print $sor['rep_name'];?>
				</fieldset>			
				<?php
				}
			}	
	include 'appform_print.php';			
?>
</fieldset>
	
<?php
div_close();
?>