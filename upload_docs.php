<?php


	function getErrorString($error) {

			if ($error == 1) {
				$string = "max_upload_size_exceeded";
			}
			if ($error == 2) {
				$string = "max_upload_size_exceeded";
			}
			if ($error == 3) {
				$string = "file_not_uploaded_full";
			}
			if ($error == 4) {
				$string = "no_file_to_upload";
			}
			if ($error == 6) {
				$string = "missing_temp_folder";
			}
			if ($error == 7) {
				$string = "failed_to_write_to_disk";
			}
			if ($error == 8) {
				$string = "upload_stopped_by_extensions";
			}

			return $string;
		}
	
	$error = "";
 
    $file_num = count($_FILES['uploaded_files']['name']);

    for ($i = 0; $i < $file_num; $i++) {
        if ($_FILES['uploaded_files']['error'][$i] > 0) {
            $error = getErrorString($_FILES['uploaded_files']['error'][$i]);
        } else {
            // check file types
            $alltime_blocked_types = array('php', 'php3', 'php4', 'php5', 'cgi', 'pl', 'exe', 'bat', 'com', 'so');
            $type_temp = explode(".", $_FILES['uploaded_files']['name'][$i]);
            $type = strtolower($type_temp[(count($type_temp) - 1)]);
			
            // if file not allowed, break
            if (in_array($type, $alltime_blocked_types)) {
                break;
            }

			// get file's mime type
			$file = $_FILES['uploaded_files']['tmp_name'][$i];
			$mime = new MimeReader($file);
			$mime_type_string = $mime->get_type(); 
			
			// if mime type not allowed, break
			if ($mime_type_string !== 'application/pdf') {
				echo 'Wrong file type!';
				break;
			}
			
			//echo filesize($file).' bytes <br>';
			//check filesize
			if (filesize($file) > 5242880) {
				echo 'Filesize exceeds the limit!';
				break;
			}
			
            // get filename
            //$file_name = $fileman->generateUniqueName($_FILES['uploaded_files']['name'][$i]);
			$file_name = $_FILES['uploaded_files']['name'][$i];
		
			
			
			//add date and time, type_of_dos, extension to the filename
			$dateAndTime = date("Y-m-d-H-i-s");
			$ext='.pdf';
			$ghostname = $type_of_doc.'_ID'.$jel_id.'_'.$dateAndTime.$ext;
			
			$dynamic_salt = mt_rand();
			$static_salt = '123456789987654321';
			
			$hash = sha1($dynamic_salt . $ghostname . $static_salt);
			
			$file_name = $type_of_doc.'_'.$hash.$ext;
			
			
			$path = $docsPath;
			//$path="/home/aassdhu1/public_html/aas/maintest/upload/docs/";
			//chmod($path, 0777);
	
            // upload file
            move_uploaded_file($_FILES['uploaded_files']['tmp_name'][$i], $path.$file_name);

            // add file to database
            //$fileman->addUploadedFile($file_name, $fileman->m_upload_folder, DB_PREFIX . "sitedoc", 1, $user_id, $_FILES['uploaded_files']['name'][$i], $category, $category_id);
			
			echo $_FILES['uploaded_files']['name'][$i].'<br>';
			echo $type_of_doc;
			
			$insert_docs=$conn->query("INSERT INTO updocs (jel_id, ghostname, doc_filename, type_of_doc) VALUES ('$jel_id', '$ghostname', '$file_name', '$type_of_doc')");	
			
        }

        if (strlen($error) > 0) {
            $errors[] = $error;
        } else {
            $errors = "";
        }
    }


?>