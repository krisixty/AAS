<?php
include('posts.php');
?>
<h3>Applied program(s) on <?php echo date('d.m.Y').':'; ?> <br/></h3>

		<p><?php include 'programs_ch.php';?></p>

<?php
	if(($medizin)||($vorbjahr))
		{
		require_once('apptable_variables_d.php');
		}
	else
		{
		require_once('apptable_variables.php');
		}
		
	if((!$medicine)&&(!$dentistry)&&(!$pharmacy)&&(!$prep)&&(!$medizin)&&(!$vorbjahr))
		{
		$trainingChosen = false;		
		}
		else 
		{
		$trainingChosen = true;		
		}


	if (!$fname)
		{
		echo $familyNameLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $familyNameLabel.$fname.'<br>';
		}
		

	if (!$gname)
		{
		echo $firstNameLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $firstNameLabel.$gname.'<br>';
		}
	
	
	if (!$gender)
		{
		echo $genderLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		if ($gender=='F')
			{
			echo $genderLabel.'Male'.'<br>';
			}
		if ($gender=='N')
			{
			echo $genderLabel.'Female'.'<br>';
			}
		}

	if (!$pob_country)
		{
		echo $placeOfBirthCountryLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $placeOfBirthCountryLabel.$pob_country.'<br>';
		}

	if (!$pob_city)
		{
		echo $placeOfBirthCityLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $placeOfBirthCityLabel.$pob_city.'<br>';
		}

	if ((!$year)||(!$month)||(!$day))
		{
		echo $dateOfBirthLabel.'Invalid date.'.'<br>';	
		}
	else
		{
		echo $dateOfBirthLabel;
		include 'daycheck.php';
		}

	if (!$citizen)
		{
		echo $citizenshipLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $citizenshipLabel.$citizen.'<br>';
		}

	if ($citizen2)
		{
		echo $citizenship2Label.$citizen2.'<br>';	
		}

	if (!$mfname)
		{
		echo $motherFamilyNameLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $motherFamilyNameLabel.$mfname.'<br>';
		}

	if (!$mgname)
		{
		echo $motherFirstNameLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $motherFirstNameLabel.$mgname.'<br>';
		}

	if (!$permadd)
		{
		echo $permanentAddressLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $permanentAddressLabel.$permadd.'<br>';
		}

	if (!$add_pc)
		{
		echo $postalCodeLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $postalCodeLabel.$add_pc.'<br>';
		}

	if (!$add_city)
		{
		echo $addressCityLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $addressCityLabel.$add_city.'<br>';
		}

	if (!$add_country)
		{
		echo $addressCountryLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $addressCountryLabel.$add_country.'<br>';
		}

	if (!$phone)
		{
		echo $phoneNumberLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $phoneNumberLabel.$phone.'<br>';
		}

	if (!$proof_type)
		{
		echo $proofTypeLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		if ($proof_type=='P')
			{
			echo $proofTypeLabel.'Passport'.'<br>';
			}
		if ($proof_type=='I')
			{
			echo $proofTypeLabel.'ID Card'.'<br>';
			}
		}

	if (!$proof_num)
		{
		echo $proofNumberLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $proofNumberLabel.$proof_num.'<br>';
		}

	if (!$firstlang)
		{
		echo $firsLanguageLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $firsLanguageLabel.$firstlang.'<br>';
		}

	if (!$hs_name)
		{
		echo $highSchoolLeavingExamLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $highSchoolLeavingExamLabel.$hs_name.'<br>';
		}

	if (!$hs_year)
		{
		echo $highSchoolLeavingYearLabel.$fieldIsRequired.'<br>';	
		}
	else if ($hs_year>date('Y'))
		{
		echo $highSchoolLeavingYearLabel.'Invalid year'.'<br>';
		}
	else
		{
		echo $highSchoolLeavingYearLabel.$hs_year.'<br>';
		}
	 
	if (($hs_day)&&($hs_month))
		{
		echo $graduationDateLabel.$hs_day.'-'.$hs_month.'<br>';	
		$hs_date=$hs_year.$hs_month.$hs_day;
		//echo $hs_date;
		}
	else
		{
		$hs_date=$hs_year.'-00-00'; //ez nem túl szép, de így nem ad ismeretlen változó hibát
		}
		

	if ($hs_certnum)
		{
		echo $graduationCertificateNumberLabel.$hs_certnum.'<br>';	
		}

	if (!$hs_country)
		{
		echo $graduationCountryLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $graduationCountryLabel.$hs_country.'<br>';
		}

	if (!$hs_city)
		{
		echo $graduationCityLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		echo $graduationCityLabel.$hs_city.'<br>';
		}

	if ($studs)
		{
		echo $studiesFollowingLabel.$studs.'<br>';	
		}

	if (!$er_fname)
			{
			echo $emergencyFamilyNameLabel.$fieldIsRequired.'<br>';	
			}
		else
			{
			echo $emergencyFamilyNameLabel.$er_fname.'<br>';
			}	
		
	if (!$er_gname)
			{
			echo $emergencyFirstNameLabel.$fieldIsRequired.'<br>';	
			}
		else
			{
			echo $emergencyFirstNameLabel.$er_gname.'<br>';
			}		
	
	if (!$er_relation)
			{
			echo $emergencyRelationLabel.$fieldIsRequired.'<br>';	
			}
		else
			{
			echo $emergencyRelationLabel.$er_relation.'<br>';
			}

	if (!$er_phone)
			{
			echo $emergencyPhoneNumberLabel.$fieldIsRequired.'<br>';	
			}
		else
			{
			echo $emergencyPhoneNumberLabel.$er_phone.'<br>';
			}
			
	if (!$er_email)
			{
			echo $emergencyEmailLabel.$fieldIsRequired.'<br>';	
			}
		else
			{
			echo $emergencyEmailLabel.$er_email.'<br>';
			}		
			
	if (!$er_permadd)
			{
			echo $emergencyPermanentAddressLabel.$fieldIsRequired.'<br>';	
			}
		else
			{
			echo $emergencyPermanentAddressLabel.$er_permadd.'<br>';
			}	

	if (!$er_add_pc)
			{
			echo $emergencyPostalCodeLabel.$fieldIsRequired.'<br>';	
			}
		else
			{
			echo $emergencyPostalCodeLabel.$er_add_pc.'<br>';
			}
			
	if (!$er_add_city)
			{
			echo $emergencyAddressCityLabel.$fieldIsRequired.'<br>';	
			}
		else
			{
			echo $emergencyAddressCityLabel.$er_add_city.'<br>';
			}
	
	if (!$er_add_country)
			{
			echo $emergencyAddressCountryLabel.$fieldIsRequired.'<br>';	
			}
		else
			{
			echo $emergencyAddressCountryLabel.$er_add_country.'<br>';
			}			
		
	if (!$pack)
		{
		echo $applicationSendToLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		if ($pack == 'U')
			{
			if (($medizin)||($vorbjahr))
				{
				echo $applicationSendToLabel.'Universität Szeged, Ungarn (per Post)'.'<br>';
				}
			else
				{
				echo $applicationSendToLabel.'University of Szeged directly'.'<br>';
				}
			}						
		if ($pack=='R')
			{
			echo $applicationSendToLabel.'Local representative of Study Hungary'.'<br>';
			}	
		}

	if ($rep_name)
		{
		echo $localRepresentativeLabel.$rep_name.'<br>';	
		}

	if (!$about)
		{
		echo $firstLearntLabel.$fieldIsRequired.'<br>';	
		}
	else
		{
		if ($about=='S')
			{
			echo $firstLearntLabel.'a Szeged student'.'<br>';
			}
		if ($about=='N')
			{
			echo $firstLearntLabel.'Internet'.'<br>';
			}
		if ($about=='R')
			{
			echo $firstLearntLabel.'local representative'.'<br>';
			}	
		if ($about=='E')
			{
			echo $firstLearntLabel.'at an education fare'.'<br>';
			}
		if ($about=='M')
			{
			echo $firstLearntLabel.'from the media'.'<br>';
			}
		if ($about=='B')
			{
			echo $firstLearntLabel.'von Bekannten'.'<br>';
			}
		if ($about=='D')
			{
			echo $firstLearntLabel.'vom DAAD'.'<br>';
			}
		if ($about=='P')
			{
			echo $firstLearntLabel.'aus der Presse'.'<br>';
			}
		if ($about=='G')
			{
			echo $firstLearntLabel.'von Ihrem Gymnasium (Plakat)'.'<br>';
			}
		if ($about=='A')
			{
			echo $firstLearntLabel.'vom Arbeitsamt (Berufsberatung)'.'<br>';
			}
			
		if ($about=='W')
			{
			echo $firstLearntLabel.'www.szegedmed.hu'.'<br>';
			}	
		if ($about=='H')
			{
			echo $firstLearntLabel.'www.studyhungary.hu'.'<br>';
			}	
		if ($about=='X')
			{
			echo $firstLearntLabel.'advertisement'.'<br>';
			}
		if ($about=='I')
			{
			echo $firstLearntLabel.'my high school'.'<br>';
			}			
		if ($about=='F')
			{
			echo $firstLearntLabel.'friend/relative'.'<br>';
			}	
		if ($about=='O')
			{
			echo $firstLearntLabel.'other'.'<br>';
			}		
			
		}
	
		
	if ((!$trainingChosen) || (!$fname) || (!$gname) || (!$gender) || (!$pob_country) || (!$pob_city) || 
		(!$birthdate) || (!$citizen) || (!$mfname) || (!$mgname) || (!$permadd) || 
		(!$add_pc) || (!$add_city) || (!$add_country) || (!$phone) || (!$proof_type) || 
		(!$proof_num) || (!$firstlang) || (!$hs_name) || (!$hs_year) || 
		(!$hs_country) || (!$hs_city) || (!$pack) || (!$er_fname) || (!$er_gname) || 
		(!$er_relation) || (!$er_phone) || (!$er_email) || (!$er_permadd) || (!$er_add_pc) || 
		(!$er_add_city) || (!$er_add_country) || (!$about))
		{
			
		echo '<h3>';
		
		if (!$trainingChosen) {
		echo 'You must choose a training program.'.'<br>'.'<br>';
		}
		
		echo 'Registration failed. Please go back and try again.'.'</h3>';
		
		do_html_footer();
		exit;
		}
	else
		{
		display_confirmation();
		}	
?>

