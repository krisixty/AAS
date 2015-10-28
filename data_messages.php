<?php
$messages=$conn->query("SELECT * FROM messages WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($messages);
?>
<fieldset><legend>Üzenetek:</legend>

<form action='message_update.php' method='post'>
	<input name="jel_id" type="hidden" value="<?php echo $jel_id ?>" />
	<input name="app_year" type="hidden" value="<?php print $app_year; ?>" />
	<textarea name="message" cols="100" rows="10" ><?php print $sor['message'] ?></textarea><br><br>
	<input type='submit' name='submit' value='Új üzenet rögzítése'>
</form>
<br><br>
<?
	//$type_of_doc = 'acceptance_letter';
	$notification_type = 'message_d';
	//docUploadFormOfficerUI(); ?>
	<? //<p class="uploadedDocs"><? include 'shwUDocs.php';?><?//</p>?><?
	sendMailForm($notification_type);?>

</fieldset>