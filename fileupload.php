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

function addFiles() {
    //global $fileman, $user_id;

	echo 'valami';
	
    $error = "";
    
    $file_num = count($_FILES['uploaded_files']['name']);

    for ($i = 0; $i < $file_num; $i++) {
        if ($_FILES['uploaded_files']['error'][$i] > 0) {
            $error = getErrorString($_FILES['uploaded_files']['error'][$i]);
        } else {
            // check file types
            $alltime_blocked_types = array('php', 'php3', 'php4', 'php5', 'cgi', 'pl');
            $type_temp = explode(".", $_FILES['uploaded_files']['name'][$i]);
            $type = strtolower($type_temp[(count($type_temp) - 1)]);

            // if file not allowed, break
            if (in_array($type, $alltime_blocked_types)) {
                break;
            }

            // get filename
            //$file_name = $fileman->generateUniqueName($_FILES['uploaded_files']['name'][$i]);
			$file_name = $_FILES['uploaded_files']['name'][$i];
			
			$path="/public_html/aas/maintest/upload/";
			
            // upload file
            move_uploaded_file($_FILES['uploaded_files']['tmp_name'][$i], $path.$file_name);

            // add file to database
            //$fileman->addUploadedFile($file_name, $fileman->m_upload_folder, DB_PREFIX . "sitedoc", 1, $user_id, $_FILES['uploaded_files']['name'][$i], $category, $category_id);
			
        }

        if (strlen($error) > 0) {
            $errors[] = $error;
        } else {
            $errors = "";
        }
    }
}
?>