<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
$username=$_SESSION['valid_user'];

isPaidandEngOrGer();
if ($pageLanguage == 'german') {
	include 'flatformLangGer.php';
}

$flat_id=$_POST['flat_id'];

$conn = db_connect();
//query select all from flats + all rows to variables
	include 'flatvars.php';
	
div_open();
?>
<fieldset class="text">
	<legend class="text"><?print $formParagraphLng;?></legend>


	
	<?include 'flatlabels.php';?>
		
		<ul class="property-gallery">
		
		<?php
				//$picsPath="../maintest/upload/";
				//$thisFlatID = $flat_id;
				//select the highest pic_id for the goven flat
				$flatpics_result=$conn->query("SELECT * FROM flatpics WHERE flat_id='$flat_id' ORDER BY pic_id ASC");
				
					if ($flatpics_result->num_rows>0) //checks image existance
						{
							while($row=mysqli_fetch_array($flatpics_result))	{
								$pic_filename = $row['pic_filename'];
								$file = $picsPath.$pic_filename;
								//echo $file;
								?>
								<li>
									<img class="flatgallery" src='<? print $file;?>'></img>
								</li>
								<?
							}
						} 
		?>
		</ul>
</fieldset>
<?php
div_close();
do_html_footer();
?>