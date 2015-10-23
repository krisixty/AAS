<?php
//$docsPath="upload/docs/";

		$docResult = $conn->query("SELECT * FROM updocs WHERE jel_id = '$jel_id' AND type_of_doc = '$type_of_doc'");
		while($row=mysqli_fetch_array($docResult))
			{
				$doc_filename = $row['doc_filename'];
				$ghostname = $row['ghostname'];
				$type_of_doc = $row['type_of_doc'];

				//Interfacetől függően jeleníti meg a feltöltött fileokat, kivéve az acc lettert mert azt linkkel kell
				if(($interface == 'applicantUI') && ($type_of_doc !== 'acceptance_letter')) {
					print $ghostname.'<br>';
				}
				if(($interface == 'officerUI') || ($type_of_doc == 'acceptance_letter')) {
					$showFile = $docsPath.$doc_filename;
					?><a href="<?print $showFile;?>" target="_blank" download="<? print $ghostname; ?>"><? print $ghostname; ?></a><br><?
				}
			
			}
?>