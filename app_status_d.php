<?php
$pageLanguage = 'german';
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

	$regdocs=$conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
	$rd_sor=mysqli_fetch_array($regdocs); //REGDOCS sor - Az angollal ellentétben itt a regdocs táblából kérdez le.

	
	
	
//Sets interface for displaying uploaded files
$interface = 'applicantUI';	
		
div_open();
?>
	<fieldset class="text">
		<legend class="text">Status</legend>

		
			<fieldset class="text2">
				<legend class="text2">Bisher eingereichte ärztliche Unterlagen</legend>

				Gesundheitsattest: <?php print $ad_sor['med_cert'];?> <br />
				<?php 
						$type_of_doc = 'med_cert'; 
						docUploadForm(); ?>
						<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				Dyslexie: <?php print $ad_sor['dyslexia'];?> <br />
				<br />
				<b>Weitere eingereichte Unterlagen:</b><br />
				Ausgedrucktes und unterschriebenes
				Bewerbungsformular: <?php print $ad_sor['app_form'];?> <br />
				Beglaubigte Kopie des Abiturzeugnisses: <?php print $ad_sor['school_cert'];?> <br />
				Tabellarischer Lebenslauf: <?php print $ad_sor['cv'];?> <br />
				Einzahlungsbeleg über die Bewerbungsgebühren: <?php print $ad_sor['app_fee'];?> <br />
				Kopie des Personalausweises/Reisepasses: <?php print $ad_sor['passport'];?> <br />
				<br />
				Ihre Bewerbung ist vollständig: <?php print $ad_sor['comp'];?><br />
		
			</fieldset>
				
			<fieldset class="text2">
				<legend class="text2">Nach der Zulassung</legend>
				
				<b>Nach der Zulassung eingereichte ärztliche Unterlagen:</b><br />
				
				Hepatitis-B-Test oder Kopie des Impfpasses: <?php print $ad_sor['HB_test'];?><br /> 
					<?php 
					$type_of_doc = 'HB_test'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
						
						
				Hepatitis-C-Test: <?php print $ad_sor['HC_test'];?><br /> 
					<?php 
					$type_of_doc = 'HC_test'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				HIV-Test: <?php print $ad_sor['hiv_test'];?> <br />
					<?php 
					$type_of_doc = 'hiv_test'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				Befund über die Röntgenaufnahme des Brustraumes: <?php print $ad_sor['xray'];?><br /> 
					<?php 
					$type_of_doc = 'xray'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				

				<?php /*Kopie des Impfpasses: <?php print $ad_sor['HB_vacc'];?><br /> 
				A windpockent beilleszteni adatbázába*/ ?>

				Erklärung über Windpocken und Röteln: <?php print $rd_sor['var_rub'];?><br /> 
					<?php 
					$type_of_doc = 'var_rub'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
					
			</fieldset>
			
			<fieldset class="text2">
				<legend class="text2">Weitere eingereichte Unterlagen</legend>

				beglaubigte Kopie der Geburtsurkunde: <?php print $ad_sor['birthcert'];?><br /> 
					<?php 
					$type_of_doc = 'birthcert'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				Rückmeldeformular: <?php print $rd_sor['proof'];?><br /> 
					<?php 
					$type_of_doc = 'proof'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				2 Studienvereinbarungen: <?php print $rd_sor['study_a'];?><br /> 
					<?php 
					$type_of_doc = 'study_a'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				Einzahlungsbeleg über die Studiengebühren: <?php print $rd_sor['fee_dec'];?><br /> 
					<?php 
					$type_of_doc = 'fee_dec'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
					
				Laborergebnisse: <?php print $rd_sor['labreport'];?><br /> 
					<?php 
					$type_of_doc = 'labreport'; 
					docUploadForm(); ?>
					<p class="uploadedDocs"><? include 'shwUDocs.php';?></p>
				
				
				<br />
				Die zur Einschreibung benötigten Dokumente sind eingereicht worden: <?php print $rd_sor['rd_subm'];?><br />
			
			</fieldset>
			
			
			
			<fieldset class="text2">
				<legend class="text2">Bewerbung für das Programm/die Programme</legend>
			
				<?php
					}
					else
					{
					?><p class="text2">You have not submitted your application yet.</p><?php
					exit;
					}

				$applications=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id'");

				while($sor=mysqli_fetch_array($applications))
					{ 
					   include 'programs_d.php';
					}
				?>
			
			</fieldset>
				
				
				
			<fieldset class="text2">
				<legend class="text2">Entscheidung</legend>
				<?php
				//Ha talál döntést, akkor kiírja azt	
				$decisions=$conn->query("SELECT * FROM decisions WHERE jel_id='$jel_id'");
				if ($decisions->num_rows>0)
					{
					while($sor=mysqli_fetch_array($decisions))
						{ 
						?>
						Programm: <?php include 'programs_dec.php';?>
						Entscheidung: <?php include 'decisions_deutsch.php';?>
						Rückmeldefrist: <?php print $sor['dfdate'];?><br /><br />
						<?php
						}
					}
				else
					{
					?>Zur Zeit noch keine Entscheidung<br /> <?php
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
					<legend class="text2">Botschaften</legend>
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
							*/
						}
					}
					/*
					//Ha nincs üzenet:
					else {
						echo 'You have no message yet.';
					}
					*/
				?>
				</fieldset>	
				<?

				//Ha talál 'Felvéve' döntést, akkor kiírja a beiratkozási dokumentumokat
				$accepted=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id' AND decision='F'");
				if ($accepted->num_rows>0) 
					{
					$regdocs= $conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
					$sor=mysqli_fetch_array($regdocs);	
					?> 
					
					<fieldset class="text2">
						<legend class="text2">Documents for registration</legend>		
							Proof of enrollment: <?php print $sor['proof'];?> <br />
							Study agreement:  <?php print $sor['study_a'];?> 
					</fieldset>			
							
					<?php
					}
				
?>
	</fieldset>
<?
div_close();
do_html_footer();
?>