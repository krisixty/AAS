<?php
require_once('aas_includes.php');
//require_once('aas_includes.php'); 
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';
//include 'mimereader.class.php';

$flat_id=$_POST['flat_id'];

echo 'Adatbázis: '.$app_year;

//query select all from flats + all rows to variables
	include 'flatvars.php';
	
?>
<fieldset>	
	<legend><?php print $formParagraphLng;?></legend>	
	<?
		display_flatForm();
		?><br><?
		delFlat();
	?>
</fieldset>	

<p>Uploaded files:<br><?php
$picsPath="upload/";

$flatpics=$conn->query("SELECT * FROM flatpics WHERE flat_id='$flat_id'");	
	
	while($row=mysqli_fetch_array($flatpics))
			{
			$pic_filename = $row['pic_filename'];
			$file = $picsPath.$pic_filename;
			
			?><img class="flat_pics_officers" src="<?php print $file;?>"><br><br><?php

			echo $pic_filename . ': ' . filesize($file) . ' bytes<br>';
			//print "delete pic with pic_id: ".$row['pic_id'].'<br>';
			?>
			<form action="delete_flatpic.php" method="post" onsubmit="return confirm('Do you really want to delete <?php print $pic_filename;?>?');">
				<input name="pic_filename" type="hidden" value="<?php print $pic_filename;?>" />
				<input name="flat_id" type="hidden" value="<?php print $flat_id;?>" />
				<input name="pic_id" type="hidden" value="<?php print $row['pic_id'];?>" />
				<!--<input name="app_year" type="hidden" value="<?php print $app_year;?>" />-->
				<input type="submit" name="Submit" id="Submit" value="Delete Picture" />
			</form><br><br>
			<?php
			}
?></p><?php			

do_html_footer();
?>