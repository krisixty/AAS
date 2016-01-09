<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();

$username=$_SESSION['valid_user'];

$conn = db_connect();

	$jel_id= $conn->query("SELECT jel_id FROM applicants WHERE username='$username'");
	if ($jel_id->num_rows>0) //vizsgálja, hogy adott-e már be jelentkezést
		{
		$sor=mysqli_fetch_array($jel_id);

	$jel_id=$sor['jel_id'];
	
	$appdocs= $conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
	$ad_sor=mysqli_fetch_array($appdocs);	//APPDOCS sor

	$engdocs=$conn->query("SELECT * FROM engdocs WHERE jel_id='$jel_id'");
	$ed_sor=mysqli_fetch_array($engdocs); //ENGDOCS sorr

	$regdocs=$conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
	$rd_sor=mysqli_fetch_array($regdocs); //REGDOCS sor 


//Sets interface for displaying uploaded files
$interface = 'applicantUI';	
	
div_open();
?>
	<fieldset class="text">
		<legend class="text">Application Status</legend>


			<p>
				The information you provide on this form will be used for the purpose of recording, processing and acknowledging your document(s). It will be held in accordance with the provisions of the Data Protection Act no CXII of 2011 and it will not be passed on to any third parties without your permission.<br />
				<br />
				<b>Is my application package complete? - <?php print $ad_sor['comp'];?> </b><br />
				<br />
				<i>Submitted documents will be registered in the system after the applicant's application package has arrived to the Foreign Students' Secretariat.</i><br />
				<br />
				<b>Uploadable file format: maximum 5MB PDF!</b>
				<br />
				<i>See the checklist below:</i><br />
			</p>
				
		<fieldset class="text2">
			<legend class="text2">After Application</legend>	
				
				<br />
				Printed and signed Application Form: <?php print $ad_sor['app_form'];?> <br />
				Application Fee: <?php print $ad_sor['app_fee'];?> <br />
				<?/*Appl. Fee paid to Agent: <?php print $ed_sor['appfee'];?> <br />*/?>
				Certified photocopy of School Leaving Certificate: <?php print $ad_sor['school_cert'];?> <br />
				High school transcript: <?php print $ad_sor['hs_trscrpt'];?> <br />
				<br />
				Additional documents for transfer students:<br />
				Transcript(s): <?php print $ed_sor['trscrpt'];?> <br />
				Course Description(s): <?php print $ed_sor['crsdsc'];?> <br />
				Diploma: <?php print $ed_sor['diploma'];?> <br />
				<br />
				Curriculum vitae: <?php print $ad_sor['cv'];?> <br />
				3 recent photos (passport size): <?php print $ad_sor['photo'];?> <br />
				Photocopy of your valid passport or ID: <?php print $ad_sor['passport'];?> <br />
				English proficiency test results: <?php print $ad_sor['toefl'];?> <br />
				Dyslexia declaration: <?php print $ad_sor['dyslexia'];?> <br />
						<?php 
						$type_of_doc = 'dyslexia'; 
						docUploadForm(); ?>
						<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				<br />
				In case of having the entrance examination in Szeged.<br>
				Registration form for Szeged: <?php print $ed_sor['regform'];?> <br />
				Entrance exam fee for Szeged (300 USD): <?php print $ed_sor['entfee'];?> <br />
				<br />
				Application package arrival date: <?php print $ad_sor['date'];?> <br />
				<br />
				<br />
				General Medical Certificate: <?php print $ad_sor['med_cert'];?> <br />
					<?php 
					$type_of_doc = 'med_cert'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
		
		</fieldset>	
				
		<fieldset class="text2">
			<legend class="text2">After Acceptance</legend>
		
				<i>After acceptance the following documents have to be submitted:</i><br />
				<br />
				Hepatitis B test: <?php print $ad_sor['HB_test'];?> <br />
					<?php 
					$type_of_doc = 'HB_test'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				Hepatitis B vaccination: <?php print $ad_sor['HB_vacc'];?> <br />
					<?php 
					$type_of_doc = 'HB_vacc'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
					
				
				Hepatitis C test: <?php print $ad_sor['HC_test'];?> <br />
					<?php 
					$type_of_doc = 'HC_test'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
					
				
				HIV test: <?php print $ad_sor['hiv_test'];?> <br />
					<?php 
					$type_of_doc = 'hiv_test'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				Chest X-Ray: <?php print $ad_sor['xray'];?> <br />
					<?php 
					$type_of_doc = 'xray'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				Vaccination Card/Immunization Records: <?php print $rd_sor['imm_vacc'];?><br /> 
					<?php 
					$type_of_doc = 'imm_vacc'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				Varicella and Rubeola Declaration: <?php print $rd_sor['var_rub'];?><br /> 
					<?php 
					$type_of_doc = 'var_rub'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>

					
				Certified copy of your Birth Certificate: <?php print $ad_sor['birthcert'];?> <br />
					<?php 
					$type_of_doc = 'birthcert'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				<? /* KIVETETTÉK 2016.01.05-KOR
				Lab report: <?php print $ad_sor['labreport'];?> <br />
					<?php 
					$type_of_doc = 'labreport'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
					*/
				?>
				
		</fieldset>	
		
		<fieldset class="text2">
			<legend class="text2">Applied program(s)</legend>

			<?php
				}
				else
				{
				?><</fieldset><p class="text2">You have not submitted your application yet.</p><?php
				exit;
				}
				
		$applications= $conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id'");

		while($sor=mysqli_fetch_array($applications))
			{ 
			   include 'programs.php';
			}
		?>
		</fieldset>
		
		
		<fieldset class="text2">
			<legend class="text2">Decision(s)</legend>
				<?php
				//Ha talál döntést, akkor megvizsgálja, hogy arról ment-e értesítés e-mailben. Ha igen, akkor azt megjeleníti a jelentkező felületén.	
				$decisions=$conn->query("SELECT * FROM decisions WHERE jel_id='$jel_id' ORDER BY date");
				if ($decisions->num_rows>0)
					{
						while($sor=mysqli_fetch_array($decisions)){ 
						
							$notifmail = $sor['notifmail'];
							$decisionDate = $sor['date'];
						
							if($notifmail != 0) {
									?><p><?
									print $decisionDate.'<br >';
									?>
									Program: <?php include 'programs_dec.php';?>
									Decision: <?php include 'decisions_english.php';?>
									Deadline: <?php print $sor['dfdate'];?>
									</p>
									<?
								}
								
								/*
								//Ha van döntés, de nincs kiküldve:
								else {
									echo 'No decision yet.';
								}
							}
						}
						//Ha nincs döntés:
						else {
							echo 'No decision yet.';
							*/
						}
					}
						
					?>
			</fieldset>			
		
		
		
			
		<?php
			//Ha talál levelet, akkor kiírja azt	
			$updocs=$conn->query("SELECT * FROM updocs WHERE jel_id='$jel_id'");
			if ($updocs->num_rows>0)
				{
					$type_of_doc = 'acceptance_letter'; 
					?>
					<p class="uploadedDocs">
					<fieldset class="text2">
						<legend class="text2">Letters</legend>
							<? include 'shwUDocs.php';?></p>
					</fieldset>	<?
						}
				?>

			
			<fieldset class="text2">
					<legend class="text2">Messages</legend>
				<?	
				//Ha talál üzenetet, akkor megvizsgálja, hogy arról ment-e értesítés e-mailben. Ha igen, akkor azt megjeleníti a jelentkező felületén.
				$messages=$conn->query("SELECT * FROM messages WHERE jel_id='$jel_id'");
				if ($messages->num_rows>0) 
					{
						while($sor=mysqli_fetch_array($messages)){	

							$email_dt = $sor['email_dt'];
							
							if($email_dt != 0) {
								?><p><?
								print $email_dt.'<br >';
								print $sor['message']; 
								?></p><?
							}
							/*
							//Ha van üzenet, de nincs kiküldve:
							else {
								echo 'You have no message yet.';
							}
						}
					}
					//Ha nincs üzenet:
					else {
						echo 'You have no message yet.';
						*/
						}
					}
					
				?>
				</fieldset>	
				<?


			//Ha talál 'Felvéve' döntést, akkor kiírja a beiratkozási dokumentumokat
			$accepted=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id' AND decision='F'");
			if ($accepted->num_rows>0) 
				{
				$regdocs= $conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
				$sor=mysqli_fetch_array($regdocs); ?> 
				<fieldset class="text2">
					<legend class="text2">Documents for registration:</legend>
					Proof of enrollment: <?php print $sor['proof'];?> <br />
						<?php 
						$type_of_doc = 'proof'; 
						docUploadForm(); ?>
						<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
						
					
					Study agreement:  <?php print $sor['study_a'];?> <br />
						<?php 
						$type_of_doc = 'study_a'; 
						docUploadForm(); ?>
						<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
					
					
					Tuition fee receipt: <?php print $sor['fee_dec'] ?>
						<?php 
						$type_of_doc = 'fee_dec'; 
						docUploadForm(); ?>
						<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
					
				</fieldset>
				<?php
				}	
			?>
	</fieldset>
<?php
div_close();
do_html_footer();
?>