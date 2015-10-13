<?php
		$docResult = $conn->query("SELECT * FROM updocs WHERE jel_id = '$jel_id' AND type_of_doc = '$type_of_doc'");
		while($row=mysqli_fetch_array($docResult))
			{
			print $row['doc_filename'].'<br>';
			}
?>