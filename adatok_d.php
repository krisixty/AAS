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
	<legend class="text">Bewerbung für das Studienjahr <?echo $academicYear;?></legend>
		<fieldset class="text2">
			<legend class="text2">Bewerbung für das Programm/die Programme</legend>

				<?php while($sor=mysqli_fetch_array($programs)) {
							include 'programs.php';
					} ?>
		</fieldset>			
		
		<fieldset class="text2">
			<legend class="text2">Persönliche Daten</legend>		
	
				<?
				$data= $conn->query("SELECT * FROM applicants WHERE username='$username'");
				$sor=mysqli_fetch_array($data)
				?>

				AAS ID: <?php print $sor['jel_id'];?><br />
				Nachname: <b> <?php print $sor['fname'];?> </b><br />
				Vorname: <b> <?php print $sor['gname'];?> </b><br />
				Geschlecht: 
				<?php 
					if($sor['gender']=='F')	
						{
						print 'Männlich';
						}
					if($sor['gender']=='N')
						{
						print 'Weiblich';	
						}
				?> 
				<br />
				Geburtsort: <?php print $sor['pob_country'];?>, <?php print $sor['pob_city'];?> <br />     
				Geburtsdatum: 
				<?php $dob  = $sor['dob']; //tömbbe pakolja a születési dátum én, nap, hónap részeit
				$pieces = explode("-", $dob);
				echo $pieces[2].'-'.$pieces[1].'-'.$pieces[0];
				?> 
				<br />
				Staatsbürgerschaft: <?php print $sor['citizen'];?> <br />
				<?php 
				$cit2=$conn->query("SELECT * FROM citizen2 WHERE jel_id='$jel_id'"); 
				if($cit2->num_rows>0)
					{
					$sor=mysqli_fetch_array($cit2);
					?>Staatsbürgerschaft 2: <?php print $sor['citizen2'].'<br />';  
					}
				?>

				<?php
				$data= $conn->query("SELECT * FROM applicants WHERE username='$username'");
				$sor=mysqli_fetch_array($data)
				?>
				Mädchenname der Mutter: <?php print $sor['mfname']?>, <?php print $sor['mgname'];?> <br />
				<br />
				
				Nummer des 
				<?php 	if($sor['proof_type']=='I')	{
							print 'Personalausweises: ';
							}
						if($sor['proof_type']=='P') {
							print 'Reisepasses: ';	
						}
						print $sor['proof_num'];?><br />
				Muttersprache: <?php print $sor['firstlang'];?>
				
		</fieldset>

		<fieldset class="text2">
			<legend class="text2">Kontaktdaten</legend>		
				
				Wohnadresse:<br />
				Str./HausNr: <?php print $sor['permadd'];?> <br />
				Postleitzahl: <?php print $sor['add_pc'];?> <br />
				Stadt: <?php print $sor['add_city'];?> <br />
				Land: <?php print $sor['add_country'];?> <br />
				Tel: <?php print $sor['phone'];?> <br />
				E-Mail: 
				<?php $email= $conn->query("SELECT email FROM user WHERE username='$username'");
				$row=mysqli_fetch_array($email);
				print $row['email'];
				?>
		</fieldset>		
				
		<fieldset class="text2">
			<legend class="text2">Studium</legend>			
				Abiturprüfung:<br />
				<?php print $sor['hs_name'];?>, <?php print $sor['hs_year'];?> <br />
				<?php print $sor['hs_city'];?>, <?php print $sor['hs_country'];?> <br />
				Nummer des Zeugnisses: <?php print $sor['hs_certnum'];?>

			<?php //vizsgálja, hogy van-e érettségi utáni tanulmány
					$stud=$conn->query("SELECT * FROM studs WHERE jel_id='$jel_id'");

					if($stud->num_rows>0)
						{
						while($stud_sor=mysqli_fetch_array($stud))
							{
							?><br />weiteres Studium nach der Abiturprüfung:<br /><?php	
							print $stud_sor['studs'];
							}
						}
			?>
		</fieldset>
		
		<fieldset class="text2">
			<legend class="text2">Im Notfall zu verständigen:</legend>	
				Nachname: <?php print $sor['er_fname'];?> <br />
				Vorname: <?php print $sor['er_gname'];?> <br />
				Angehörige: <?php print $sor['er_relation'];?> <br />
				Tel: <?php print $sor['er_phone'];?> <br />
				E-Mail: <?php print $sor['er_email'];?> <br />
				Wohnadresse: <br />
				Str./HausNr: <?php print $sor['er_permadd'];?> <br />
				Postleitzahl: <?php print $sor['er_add_pc'];?> <br />
				Stadt: <?php print $sor['er_add_city'];?> <br />
				Land: <?php print $sor['er_add_country'];?> <br />
		</fieldset>
</fieldset>
				
<?php
div_close();
?>




